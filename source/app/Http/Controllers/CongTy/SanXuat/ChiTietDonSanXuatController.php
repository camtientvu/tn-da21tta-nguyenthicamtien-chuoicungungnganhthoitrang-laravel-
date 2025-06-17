<?php

namespace App\Http\Controllers\CongTy\SanXuat;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonSanXuat;
use App\Models\ChiTietSanPham;
use App\Models\DonSanXuat;
use Illuminate\Http\Request;

class ChiTietDonSanXuatController extends Controller
{
    public function create($id)
    {
        $don = DonSanXuat::findOrFail($id);

        if ($don->trang_thai !== 'Chờ duyệt') {
            return redirect()->route('congty.don-san-xuat.show', $id)
                ->with('error', 'Chỉ có thể thêm sản phẩm khi đơn đang ở trạng thái chờ duyệt.');
        }
        $chiTietSanPhams = ChiTietSanPham::with('sanPham')->where('id_san_pham', $don->id_san_pham)->get();


        return view('congty.sanxuat.chitiet.create', compact('don', 'chiTietSanPhams'));
    }

    public function store(Request $request, $id)
    {
        $don = DonSanXuat::findOrFail($id);

        if ($don->trang_thai !== 'Chờ duyệt') {
            return redirect()->route('congty.don-san-xuat.show', $id)
                ->with('error', 'Chỉ có thể thêm khi đơn ở trạng thái chờ duyệt.');
        }

        $validated = $request->validate([
            'id_chi_tiet_san_pham' => 'required|exists:chi_tiet_san_pham,id',
            'so_luong' => 'required|integer|min:1'
        ]);

        // Kiểm tra xem đã có chi tiết này trong đơn chưa
        $chiTiet = \App\Models\ChiTietDonSanXuat::where('id_don_san_xuat', $id)
            ->where('id_chi_tiet_san_pham', $validated['id_chi_tiet_san_pham'])
            ->first();

        if ($chiTiet) {
            // Nếu có thì cộng dồn
            $chiTiet->increment('so_luong', $validated['so_luong']);
        } else {
            // Nếu chưa có thì tạo mới
            \App\Models\ChiTietDonSanXuat::create([
                'id_don_san_xuat' => $id,
                'id_chi_tiet_san_pham' => $validated['id_chi_tiet_san_pham'],
                'so_luong' => $validated['so_luong']
            ]);
        }

        return redirect()->route('congty.don-san-xuat.show', $id)
            ->with('success', 'Thêm hoặc cập nhật chi tiết sản xuất thành công!');
    }


    public function destroy($id, $chitiet_id)
    {
        $chiTiet = ChiTietDonSanXuat::where('id_don_san_xuat', $id)
            ->where('id', $chitiet_id)
            ->firstOrFail();
        $don = $chiTiet->donSanXuat;

        if ($don->trang_thai !== 'Chờ duyệt') {
            return redirect()->route('congty.don-san-xuat.show', $don->id)
                ->with('error', 'Chỉ được xóa khi đơn đang ở trạng thái chờ duyệt.');
        }
        $chiTiet->delete();

        return redirect()->route('congty.don-san-xuat.show', $id)
            ->with('success', 'Đã xóa chi tiết sản phẩm.');
    }
}
