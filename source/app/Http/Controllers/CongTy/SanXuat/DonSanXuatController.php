<?php

namespace App\Http\Controllers\CongTy\SanXuat;

use App\Http\Controllers\Controller;
use App\Models\DonSanXuat;
use App\Models\SanPham;
use App\Models\ChiTietSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DonSanXuatController extends Controller
{
    public function index()
    {
        $donSanXuats = DonSanXuat::with('sanPham')->get(); // <-- Thêm with('sanPham')

        return view('congty.sanxuat.index', [
            'title' => 'Danh sách đơn sản xuất',
        ], compact('donSanXuats'));
    }


    public function create()
    {
        $sanPhams = SanPham::all();

        return view('congty.sanxuat.create', [
            'title' => 'Tạo đơn sản xuất mới',
            'sanPhams' => $sanPhams
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([

            'id_san_pham' => 'required|exists:san_pham,id', // ✅ validate
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);

        try {
            DonSanXuat::create([

                'id_san_pham' => $request->id_san_pham, // ✅ thêm
                'ngay_bat_dau' => $request->ngay_bat_dau,
                'ngay_ket_thuc' => $request->ngay_ket_thuc,
                'trang_thai' => 'Chờ duyệt',
            ]);
            return redirect()->route('congty.don-san-xuat.index')
                ->with('success', 'Tạo đơn sản xuất thành công');
        } catch (\Exception $e) {
            Log::error('Lỗi khi tạo đơn sản xuất: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Đã xảy ra lỗi khi tạo đơn.');
        }
    }


    public function edit($id)
    {
        $don = DonSanXuat::findOrFail($id);
        $sanPhams = SanPham::all();
        return view('congty.sanxuat.edit', [
            'title' => 'Sửa đơn sản xuất'
        ], compact('don', 'sanPhams'));
    }




    public function update(Request $request, $id)
    {
        $don = DonSanXuat::with(['chiTietDonSanXuats.chiTietSanPham', 'nguyenLieuDonSanXuats.loNguyenLieu'])->findOrFail($id);

        $request->validate([

            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date',
            'trang_thai' => 'required|in:Chờ duyệt,Đang sản xuất,Hoàn thành,Hủy',
            'id_san_pham' => 'required|exists:san_pham,id',

        ]);

        $oldStatus = $don->trang_thai;
        $newStatus = $request->trang_thai;

        // Chỉ cho phép tăng tiến trạng thái
        $validTransitions = [
            'Chờ duyệt' => ['Chờ duyệt', 'Đang sản xuất', 'Hủy'],
            'Đang sản xuất' => ['Đang sản xuất', 'Hoàn thành'],
            'Hoàn thành' => ['Hoàn thành', 'Hủy'],
            'Hủy' => ['Hủy'], // không thể chuyển tiếp từ "Hủy"
        ];

        if (!in_array($newStatus, $validTransitions[$oldStatus])) {
            return back()->withInput()->with('error', 'Không được phép chuyển trạng thái lùi hoặc không hợp lệ.');
        }

        try {
            DB::beginTransaction();

            $don->update($request->all());

            // Nếu chuyển từ trạng thái khác sang Hoàn thành → cộng vào số lượng sản phẩm
            if ($oldStatus !== 'Hoàn thành' && $newStatus === 'Hoàn thành') {
                foreach ($don->chiTietDonSanXuats as $ct) {
                    $chiTietSanPham = $ct->chiTietSanPham;
                    if ($chiTietSanPham) {
                        $chiTietSanPham->increment('so_luong', $ct->so_luong);
                    }

                      if ($chiTietSanPham->sanPham && $chiTietSanPham->sanPham->trang_thai != 1) {
                        $chiTietSanPham->sanPham->update(['trang_thai' => 1]);
                    }
                }
            }

            // Nếu chuyển sang "Hủy" → trả lại số lượng nguyên liệu
            if ($newStatus === 'Hủy') {
                foreach ($don->nguyenLieuDonSanXuats as $nl) {
                    $lo = $nl->loNguyenLieu;
                    if ($lo) {
                        $lo->decrement('so_luong_su_dung', $nl->so_luong);
                    }
                }
            }

            DB::commit();
            return redirect()->route('congty.don-san-xuat.index')->with('success', 'Cập nhật đơn sản xuất thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi cập nhật đơn sản xuất: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Có lỗi xảy ra khi cập nhật.');
        }
    }


    public function destroy($id)
    {
        $don = DonSanXuat::findOrFail($id);

        if ($don->trang_thai === 'Hoàn thành') {
            return redirect()->route('congty.don-san-xuat.index')  // sửa tên route cho đúng prefix
                ->with('error', 'Không thể xóa đơn sản xuất đã hoàn thành.');
        }

        $don->delete();

        return redirect()->route('congty.don-san-xuat.index')  // sửa tên route cho đúng prefix
            ->with('success', 'Xóa đơn sản xuất thành công');
    }

    public function show($id)
    {
        $don = DonSanXuat::with([
            'sanPham', // ✅ thêm dòng này
            'chiTietDonSanXuats.chiTietSanPham.sanPham',
            'nguyenLieuDonSanXuats.loNguyenLieu.nguyenLieuNCC'
        ])->findOrFail($id);


        return view('congty.sanxuat.show', [
            'title' => 'Chi tiết đơn sản xuất',
            'don' => $don
        ]);
    }
}