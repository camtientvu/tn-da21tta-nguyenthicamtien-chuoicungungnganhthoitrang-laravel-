<?php

namespace App\Http\Controllers\CongTy\DonHang;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\CongTyGiaoHang;
use App\Models\DonGiaoHang;
use App\Models\LoTrinhDon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    public function index()
    {
         $user = Auth::user();
        $nv=$user->nhanVienCongTy;
         if (!$nv || $nv->vai_tro !== 'admin' || $nv->vai_tro !== 'phe_duyet_giao_hang') {
            abort(403, 'Không có quyền truy cập.');
        }
        $donHangs = DonHang::with('khachHang.user')
            ->orderByRaw("CASE WHEN trang_thai = 'Chờ duyệt' THEN 0 ELSE 1 END")
            ->orderByDesc('ngay_dat')
            ->get();

        return view('congty.donhang.index', ['title' => 'Tất cả đơn hàng (ưu tiên chờ duyệt)'], compact('donHangs'));
    }


    // 2. Hiển thị form duyệt và chọn công ty giao hàng
    public function edit($id)
    {
        $donHang = DonHang::with('chiTietDonHangs.chiTietSanPham.sanPham')->findOrFail($id);
        $congTyGiaoHangs = CongTyGiaoHang::all();

        return view('congty.donhang.edit', ['title' => 'Duyệt đơn hàng'], compact('donHang', 'congTyGiaoHangs'));
    }

    public function update(Request $request, $id)
    {
        $donHang = DonHang::findOrFail($id);

        // Kiểm tra nếu đơn không ở trạng thái chờ duyệt
        if ($donHang->trang_thai !== 'Chờ duyệt') {
            return redirect()->back()->with('error', 'Chỉ được duyệt đơn hàng ở trạng thái chờ duyệt.');
        }

        $request->validate([
            'id_cong_ty_giao_hang' => 'required|exists:cong_ty_giao_hang,id',
        ]);

        // Cập nhật trạng thái đơn hàng
        $donHang->update([
            'trang_thai' => 'Đã duyệt',
        ]);

        // Tạo đơn giao hàng
        $donGiaoHang = DonGiaoHang::create([
            'ma' => $donHang->ma,
            'id_don_hang' => $donHang->id,
            'id_cong_ty_giao_hang' => $request->id_cong_ty_giao_hang,
            'trang_thai' => 'Chờ duyệt',
            'ngay_giao' => Carbon::now(),
        ]);

        // Ghi nhận lộ trình đầu tiên
        LoTrinhDon::create([
            'id_don_giao_hang' => $donGiaoHang->id,
            'trang_thai' => 'Khởi tạo đơn',
            'mo_ta' => 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.',
            'thoi_gian' => Carbon::now()
        ]);

        return redirect()->route('congty.donhang.index')->with('success', 'Đơn hàng đã được duyệt và giao cho công ty vận chuyển.');
    }


    public function huyDon($id)
    {
        $donHang = DonHang::with('chiTietDonHangs')->findOrFail($id);

        // Kiểm tra nếu đơn không ở trạng thái chờ duyệt
        if (strtolower($donHang->trang_thai) !== 'chờ duyệt') {
            return redirect()->back()->with('error', 'Chỉ được hủy đơn hàng ở trạng thái chờ duyệt.');
        }

        try {
            // Cộng lại số lượng tồn kho
            foreach ($donHang->chiTietDonHangs as $chiTiet) {
                $ctSanPham = $chiTiet->chiTietSanPham;
                if ($ctSanPham) {
                    $ctSanPham->increment('so_luong', $chiTiet->so_luong);
                }
            }

            // Cập nhật trạng thái đơn hàng
            $donHang->update([
                'trang_thai' => 'Hủy',
            ]);

            return redirect()->route('congty.donhang.index')->with('success', 'Đơn hàng đã được hủy và số lượng tồn kho đã được cập nhật.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi hủy đơn hàng: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi hủy đơn hàng.');
        }
    }


    // 4. Xem chi tiết đơn hàng và lộ trình giao hàng
    public function show($id)
    {
        $donHang = DonHang::with([
            'chiTietDonHangs.chiTietSanPham.sanPham',
            'donGiaoHangs.congTyGiaoHang',
            'donGiaoHangs.loTrinhs'
        ])->findOrFail($id);

        return view('congty.donhang.show', ['title' => 'Chi tiết đơn hàng'], compact('donHang'));
    }


    public function exportPDF($id)
    {
        $donHang = DonHang::with([
            'chiTietDonHangs.chiTietSanPham.sanPham',
            'donGiaoHangs.congTyGiaoHang',
            'donGiaoHangs.loTrinhs'
        ])->findOrFail($id);

        $pdf = PDF::loadView('congty.donhang.export_pdf', compact('donHang'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('don_hang_' . $donHang->ma . '.pdf');
    }
}