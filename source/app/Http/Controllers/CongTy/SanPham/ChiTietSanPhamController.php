<?php

namespace App\Http\Controllers\CongTy\SanPham;

use App\Http\Controllers\Controller;
use App\Models\ChiTietSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ChiTietSanPhamController extends Controller
{
    public function create($id_san_pham)
    {
        $sanPham = SanPham::findOrFail($id_san_pham);
        return view('congty.sanpham.chitiet.create', compact('sanPham'));
    }

    public function store(Request $request, $id_san_pham)
    {
        $request->validate([
            'mau_sac' => 'required|string|max:100',
            'kich_co' => 'required|string|max:50',
            'so_luong' => 'required|integer|min:0',
        ]);

        ChiTietSanPham::create([
            'id_san_pham' => $id_san_pham,
            'mau_sac' => $request->mau_sac,
            'kich_co' => $request->kich_co,
            'so_luong' => $request->so_luong,
        ]);

        return redirect()->route('congty.sanpham.show', $id_san_pham)->with('success', 'Thêm chi tiết sản phẩm thành công');
    }


    public function edit($id)
    {
        $chiTiet = ChiTietSanPham::findOrFail($id);
        return view('congty.sanpham.chitiet.edit', compact('chiTiet'));
    }

    public function update(Request $request, $id)
    {
        $chiTiet = ChiTietSanPham::findOrFail($id);
        $request->validate([
            'mau_sac' => 'required',
            'kich_co' => 'required',
            'so_luong' => 'required|integer|min:0',
        ]);
        $chiTiet->update($request->only('mau_sac', 'kich_co', 'so_luong'));
        return redirect()->route('congty.sanpham.show', $chiTiet->id_san_pham)->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $chiTiet = ChiTietSanPham::findOrFail($id);
        $id_san_pham = $chiTiet->id_san_pham;
        $chiTiet->delete();
        return redirect()->route('congty.sanpham.show', $id_san_pham)->with('success', 'Đã xoá chi tiết sản phẩm');
    }
}
