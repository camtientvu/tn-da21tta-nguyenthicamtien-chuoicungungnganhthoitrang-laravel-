<?php

namespace App\Http\Controllers\GiaoHang;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVienGiaoHang;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\DonGiaoHang;
use App\Models\DonHang;
use App\Models\PhanCongGiaoHang;
use App\Models\LoTrinhDon;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class GiaoHangController extends Controller
{
    public function nhanvien()
    {
        $user = Auth::user();



        // Lấy ID công ty mà giám đốc đang thuộc về
        $idCongTy = $user->nhanVienGiaoHang->id_cong_ty_giao_hang;
        if (!$idCongTy || $user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc nhà cung cấp mới được phép truy cập.');
        }
        // Lấy danh sách nhân viên giao hàng thuộc cùng công ty
        $nhanViens = NhanVienGiaoHang::with(['user', 'congTyGiaoHang'])
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->get();

        return view('giaohang.nguoidung.index', [
            'title' => 'Danh sách nhân viên'
        ], compact('nhanViens'));
    }

    // Form sửa
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc mới được xem danh sách nhân viên giao hàng.');
        }
        $nhanVien = NhanVienGiaoHang::with('user')->findOrFail($id);


        return view('giaohang.nguoidung.edit', compact('nhanVien'));
    }

    // Xử lý cập nhật
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc mới được xem danh sách nhân viên giao hàng.');
        }
        $nhanVien = NhanVienGiaoHang::with('user')->findOrFail($id);

        $request->validate([

            'vai_tro' => ['required', Rule::in(['thuc_thi', 'giam_doc'])],

        ]);



        // Cập nhật thông tin nhân viên
        $nhanVien->update([
            'vai_tro' => $request->vai_tro,

        ]);

        return redirect()->route('giaohang.nguoidung.index')->with('success', 'Cập nhật thành công');
    }

    // Xoá nhân viên và user liên quan
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc mới được xem danh sách nhân viên giao hàng.');
        }
        $nhanVien = NhanVienGiaoHang::with('user')->findOrFail($id);

        $nhanVien->user->delete(); // xóa user liên kết
        $nhanVien->delete();       // xóa bản ghi nhân viên

        return redirect()->route('giaohang.nguoidung.index')->with('success', 'Đã xóa nhân viên');
    }




    public function danhSachDonGiao()
    {
        $user = Auth::user();
        if ($user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc mới được xem danh sách nhân viên giao hàng.');
        }
        $user = Auth::user();

        // Kiểm tra nhân viên giao hàng có công ty
        if (!$user->nhanVienGiaoHang) {
            abort(403, 'Bạn không thuộc công ty giao hàng nào.');
        }

        $idCongTy = $user->nhanVienGiaoHang->id_cong_ty_giao_hang;

        $donGiaoHangs = DonGiaoHang::with([
            'donHang',
            'loTrinhs',
            'phanCongs.nhanVienGiaoHang.user'
        ])
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->orderByDesc('ngay_giao')
            ->get();

        return view('giaohang.donhang.index', [
            'title' => 'Đơn hàng được giao cho công ty',
            'donGiaoHangs' => $donGiaoHangs
        ]);
    }



    public function createPC($idDonGiaoHang)
    {
        $user = Auth::user();
        if ($user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc mới được xem danh sách nhân viên giao hàng.');
        }
        $user = Auth::user();

        $donGiaoHang = DonGiaoHang::with('phanCongs')->findOrFail($idDonGiaoHang);



        $idCongTy = $user->nhanVienGiaoHang->id_cong_ty_giao_hang;

        // Lấy danh sách nhân viên giao hàng (khác giám đốc)
        $nhanViens = NhanVienGiaoHang::with('user')
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->where('vai_tro', 'thuc_thi')
            ->get();

        return view('giaohang.phancong.create', compact('donGiaoHang', 'nhanViens'));
    }

    public function storePC(Request $request, $idDonGiaoHang)
    {
        try {
            Log::info('🔄 Bắt đầu xử lý storePC');

            $user = Auth::user();
            if (!$user->nhanVienGiaoHang || $user->nhanVienGiaoHang->vai_tro !== 'giam_doc') {
                Log::warning('❌ Truy cập trái phép: Không phải giám đốc', ['user_id' => $user->id]);
                abort(403, 'Chỉ giám đốc mới được xem danh sách nhân viên giao hàng.');
            }
            Log::info('✅ Xác thực vai trò giám đốc thành công');

            $validated = $request->validate([
                'id_nhan_vien_giao_hang' => 'required|exists:nhan_vien_giao_hang,id',
                'ghi_chu' => 'nullable|string|max:255',
            ]);
            Log::info('✅ Dữ liệu hợp lệ', $validated);

            // Cập nhật trạng thái đơn giao hàng
            $don = DonGiaoHang::findOrFail($idDonGiaoHang);
            Log::info('✅ Tìm thấy đơn giao hàng', ['id' => $don->id]);

            // Tìm đơn hàng gốc dựa vào id_don_hang liên kết (nếu có quan hệ)
            $donh = DonHang::findOrFail($don->id_don_hang);
            Log::info('✅ Tìm thấy đơn hàng liên kết', ['id' => $donh->id]);

            $don->update(['trang_thai' => 'Đang giao']);
            Log::info('✅ Cập nhật trạng thái đơn giao hàng');

            $donh->update(['trang_thai' => 'Đang giao']);
            Log::info('✅ Cập nhật trạng thái đơn hàng');

            $phanCong = PhanCongGiaoHang::create([
                'id_don_giao_hang' => $idDonGiaoHang,
                'id_nhan_vien_giao_hang' => $request->id_nhan_vien_giao_hang,
                'ghi_chu' => $request->ghi_chu,
                'thoi_gian_phan_cong' => Carbon::now(),
            ]);
            Log::info('✅ Tạo phân công giao hàng', ['id' => $phanCong->id]);

            $loTrinh = LoTrinhDon::create([
                'id_don_giao_hang' => $idDonGiaoHang,
                'id_nhan_vien_giao_hang' => $request->id_nhan_vien_giao_hang,
                'trang_thai' => 'Đã phân công',
                'mo_ta' => 'Đơn đã được phân công cho nhân viên.',
                'thoi_gian' => Carbon::now(),
            ]);
            Log::info('✅ Tạo lộ trình đơn', ['id' => $loTrinh->id]);

            return redirect()->route('giaohang.donhang.index')->with('success', 'Phân công thành công');
        } catch (\Exception $e) {
            Log::error('❌ Lỗi trong quá trình phân công', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }


    public function loTrinh($idDonGiaoHang)
    {
        $user = Auth::user();
        $nvGiaoHang = $user->nhanVienGiaoHang;

        $don = DonGiaoHang::with(['loTrinhs.nhanVienGiaoHang.user', 'phanCongs'])
            ->findOrFail($idDonGiaoHang);

        // Chỉ cho phép nếu nhân viên được phân công
        $duocPhanCong = $don->phanCongs->contains('id_nhan_vien_giao_hang', $nvGiaoHang->id);

        if (!$duocPhanCong) {
            abort(403, 'Bạn không được phép xem đơn này.');
        }

        return view('giaohang.lotrinh.index', compact('don'));
    }

    public function loTrinhCuaToi()
    {
        $user = Auth::user();
        $nhanVien = $user->nhanVienGiaoHang;

        // Kiểm tra quyền
        if (!$nhanVien || $nhanVien->vai_tro !== 'thuc_thi') {
            abort(403, 'Chỉ nhân viên giao hàng (thực thi) mới được truy cập.');
        }

        // Lấy ID các đơn từng tham gia
        $donIds = LoTrinhDon::where('id_nhan_vien_giao_hang', $nhanVien->id)
            ->pluck('id_don_giao_hang')
            ->unique();

        // Lấy các đơn giao hàng và lọc lại theo quyền quản lý thực tế
        $donGiaoHangs = DonGiaoHang::with([
            'donHang',
            'loTrinhs' => fn($q) => $q->orderBy('created_at'),
            'phanCongs.nhanVienGiaoHang.user'
        ])
            ->whereIn('id', $donIds)
            ->get()
            ->filter(function ($don) use ($nhanVien) {
                $buocCuoi = $don->loTrinhs->sortByDesc('created_at')->first();
                return $buocCuoi && $buocCuoi->id_nhan_vien_giao_hang == $nhanVien->id;
            });

        return view('giaohang.lotrinh.cuatoi', [
            'title' => 'Các đơn tôi đang xử lý',
            'donGiaoHangs' => $donGiaoHangs,
            'nhanVien' => $nhanVien
        ]);
    }

    public function loTrinhTheoNhanVien()
    {
        $user = Auth::user();
        $nhanVien = $user->nhanVienGiaoHang;

        if (!$nhanVien || $nhanVien->vai_tro !== 'thuc_thi') {
            abort(403, 'Chỉ nhân viên giao hàng (thực thi) mới được truy cập.');
        }

        // Lấy tất cả các bước lộ trình do nhân viên này thực hiện
        $loTrinhs = LoTrinhDon::with('donGiaoHang.donHang')
            ->where('id_nhan_vien_giao_hang', $nhanVien->id)
            ->orderByDesc('thoi_gian')
            ->get();

        return view('giaohang.lotrinh.cuatoi', [
            'title' => 'Tất cả lộ trình tôi đã thực hiện',
            'loTrinhs' => $loTrinhs,
            'nhanVien' => $nhanVien
        ]);
    }

    public function xemLoTrinhTheoDon($idDonGiaoHang)
    {
        $user = Auth::user();
        $nv = $user->nhanVienGiaoHang;

        $don = DonGiaoHang::with([
            'donHang',
            'loTrinhs' => fn($q) => $q->orderBy('created_at'),
        ])->findOrFail($idDonGiaoHang);


        $buocCuoi = $don->loTrinhs->sortByDesc('id')->first();
        $coTheSua = $buocCuoi  && ($buocCuoi->id_nhan_vien_giao_hang) == $nv->id;




        return view('giaohang.lotrinh.chitiet', compact('don', 'nv', 'coTheSua'));
    }
    public function create($id)
    {
        $user = Auth::user();
        $nv = $user->nhanVienGiaoHang;

        $don = DonGiaoHang::with('donHang')->findOrFail($id);

        return view('giaohang.lotrinh.them', compact('don', 'nv'));
    }








    public function luuLoTrinh(Request $request, $id)
    {
        $user = Auth::user();
        $nv = $user->nhanVienGiaoHang;

        $request->validate([
            'trang_thai' => 'required|string|max:255',
            'mo_ta' => 'required|string|max:1000',
            'thoi_gian' => 'required|date',
        ]);

        // Log dữ liệu đầu vào
        Log::info('Yêu cầu thêm bước lộ trình:', $request->all());

        // Tạo bước lộ trình
        $loTrinh = LoTrinhDon::create([
            'id_don_giao_hang' => $id,
            'id_nhan_vien_giao_hang' => $nv->id,
            'trang_thai' => $request->trang_thai,
            'mo_ta' => $request->mo_ta,
            'thoi_gian' => $request->thoi_gian,
        ]);

        Log::info('Đã tạo bước lộ trình:', $loTrinh->toArray());

        // Chuẩn hoá trạng thái

        $trangThai = khong_dau($request->trang_thai);
        Log::info('Trạng thái không dấu:', ['trang_thai' => $trangThai]);



        // Lấy đơn giao hàng
        $donGiaoHang = DonGiaoHang::find($id);
        Log::info('Thông tin đơn giao hàng:', $donGiaoHang ? $donGiaoHang->toArray() : ['Không tìm thấy']);

        if ($donGiaoHang && $donGiaoHang->id_don_hang) {
            $donHang = DonHang::find($donGiaoHang->id_don_hang);
            Log::info('Thông tin đơn hàng:', $donHang ? $donHang->toArray() : ['Không tìm thấy']);

            if ($trangThai === 'da giao') {
                $donGiaoHang->trang_thai = 'Đã giao';
                $donGiaoHang->save();
                Log::info('✅ Cập nhật trạng thái giao hàng: Đã giao');

                $donHang->trang_thai = 'Hoàn thành';
                $donHang->save();
                Log::info('✅ Cập nhật trạng thái đơn hàng: Hoàn thành');
            } elseif ($trangThai === 'Huy') {
                $donGiaoHang->trang_thai = 'Hủy';
                $donGiaoHang->save();
                Log::info('✅ Cập nhật trạng thái giao hàng: Hủy');

                $donHang->trang_thai = 'Hủy';
                $donHang->save();
                Log::info('✅ Cập nhật trạng thái đơn hàng: Hủy');
            }
        } else {
            Log::warning('Không tìm thấy đơn giao hàng hoặc đơn hàng để cập nhật trạng thái.');
        }

        return redirect()->route('giaohang.lotrinh.show', $id)
            ->with('success', 'Thêm bước lộ trình thành công!');
    }



    public function formChuyenNhanVien($id)
    {
        $don = DonGiaoHang::with('donHang')->findOrFail($id);
        $user = Auth::user();
        $nv = $user->nhanVienGiaoHang;

        if (!$nv) {
            abort(403, 'Không có quyền thực hiện.');
        }

        // Lấy nhân viên cùng công ty (trừ chính mình)
        $danhSachNhanVien = \App\Models\NhanVienGiaoHang::where('vai_tro', 'thuc_thi')
            ->where('id_cong_ty_giao_hang', $nv->id_cong_ty_giao_hang)
            ->where('id', '!=', $nv->id)
            ->get();

        return view('giaohang.donhang.chuyen', compact('don', 'nv', 'danhSachNhanVien'));
    }

    public function xuLyChuyenNhanVien(Request $request, $id)
    {
        $request->validate([
            'id_nhan_vien_moi' => 'required|exists:nhan_vien_giao_hang,id',
        ]);

        $don = DonGiaoHang::findOrFail($id);

        // Thêm một bước lộ trình mới với nhân viên mới
        LoTrinhDon::create([
            'id_don_giao_hang' => $don->id,
            'id_nhan_vien_giao_hang' => $request->id_nhan_vien_moi,
            'trang_thai' => 'Đang chuyển',
            'mo_ta' => 'Chuyển giao cho nhân viên khác',
            'thoi_gian' => now(),
        ]);

        return redirect()->route('giaohang.lotrinh.show', $id)->with('success', 'Đơn đã được chuyển cho nhân viên mới qua lộ trình.');
    }
}
