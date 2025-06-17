<?php

namespace App\Http\Controllers\CongTy\SanXuat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonSanXuat;
use App\Models\LoNguyenLieu;
use App\Models\NguyenLieuDonSanXuat;

class NguyenLieuDonSanXuatController extends Controller
{
    // Hiển thị form thêm nguyên liệu
    public function create($id_don_san_xuat)
    {
        $don = DonSanXuat::findOrFail($id_don_san_xuat);

        if ($don->trang_thai !== 'Chờ duyệt') {
            return redirect()->route('congty.don-san-xuat.show', $id_don_san_xuat)
                ->with('error', 'Chỉ được phép thêm nguyên liệu khi đơn đang ở trạng thái "chờ duyệt".');
        }

        $loNguyenLieus = LoNguyenLieu::with(['nguyenLieuNCC', 'donNhap'])
            ->whereHas('donNhap', function ($query) {
                $query->where('trang_thai', 'Hoàn thành');
            })
            ->get();

        $nguyenLieus = \App\Models\NguyenLieuNhaCungCap::with('nhaCungCap')->get();

        return view('congty.sanxuat.nguyenlieu.create', compact('don', 'nguyenLieus', 'loNguyenLieus'));
    }

    // Lưu chi tiết nguyên liệu mới
    public function store(Request $request, $id_don_san_xuat)
    {
        $don = DonSanXuat::findOrFail($id_don_san_xuat);

        if ($don->trang_thai !== 'Chờ duyệt') {
            return redirect()->route('congty.don-san-xuat.show', $id_don_san_xuat)
                ->with('error', 'Không được phép thêm nguyên liệu khi đơn đã xử lý.');
        }

        $request->validate([
            'id_lo_nguyen_lieu' => 'required|exists:lo_nguyen_lieu,id',
            'so_luong' => 'required|numeric|min:1'
        ]);

        $lo = LoNguyenLieu::findOrFail($request->id_lo_nguyen_lieu);
        $soLuongConLai = $lo->so_luong_nhap - $lo->so_luong_da_su_dung;

        if ($request->so_luong > $soLuongConLai) {
            return back()->withInput()->with('error', 'Số lượng vượt quá số lượng còn lại trong lô.');
        }

        NguyenLieuDonSanXuat::create([
            'id_don_san_xuat' => $id_don_san_xuat,
            'id_lo_nguyen_lieu' => $request->id_lo_nguyen_lieu,
            'so_luong' => $request->so_luong
        ]);

        // Cập nhật số lượng đã sử dụng
        $lo->increment('so_luong_su_dung', $request->so_luong);

        return redirect()->route('congty.don-san-xuat.show', $id_don_san_xuat)
            ->with('success', 'Thêm nguyên liệu thành công');
    }

    // Xóa nguyên liệu khỏi đơn sản xuất
    public function destroy($id)
    {
        $chiTiet = NguyenLieuDonSanXuat::findOrFail($id);
        $don = $chiTiet->donSanXuat;

        if ($don->trang_thai !== 'Chờ duyệt') {
            return back()->with('error', 'Chỉ được xóa nguyên liệu khi đơn đang ở trạng thái "chờ duyệt".');
        }

        // Trả lại số lượng cho lô
        $chiTiet->loNguyenLieu->decrement('so_luong_su_dung', $chiTiet->so_luong);

        $chiTiet->delete();

        return back()->with('success', 'Xóa nguyên liệu thành công');
    }
}