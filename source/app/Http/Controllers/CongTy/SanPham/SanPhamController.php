<?php

namespace App\Http\Controllers\CongTy\SanPham;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanPhams = SanPham::with('danhMuc')->get();
        return view('congty.sanpham.index', ['title' => 'Danh sách sản phẩm'], compact('sanPhams'));
    }

    public function create()
    {
        $danhMucs = DanhMuc::all();
        return view('congty.sanpham.create', ['title' => 'Thêm sản phẩm', 'danhMucs' => $danhMucs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_danh_muc' => 'required|exists:danh_muc,id',
            'ma' => 'required|string|max:50|unique:san_pham',
            'ten' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'gia' => 'required|numeric',
            'giamgia' => 'required|numeric',
            'trang_thai' => 'required|boolean',
        ]);

        SanPham::create($request->all());

        return redirect()->route('congty.sanpham.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $sanPham = SanPham::findOrFail($id);
        $danhMucs = DanhMuc::all();
        return view('congty.sanpham.edit', ['title' => 'Sửa sản phẩm'], compact('sanPham', 'danhMucs'));
    }

    public function update(Request $request, $id)
    {
        $sanPham = SanPham::findOrFail($id);

        $request->validate([
            'id_danh_muc' => 'required|exists:danh_muc,id',
            'ma' => 'required|string|max:50|unique:san_pham,ma,' . $id,
            'ten' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'gia' => 'required|numeric',
            'giamgia' => 'required|numeric',
            'trang_thai' => 'required|boolean',
        ]);

        $sanPham->update($request->all());

        return redirect()->route('congty.sanpham.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy($id)
    {
        $sanPham = SanPham::findOrFail($id);
        $sanPham->delete();

        return redirect()->route('congty.sanpham.index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function show($id)
    {
        $sanPham = SanPham::with(['danhMuc', 'chiTietSanPhams', 'hinhAnhSanPhams'])->findOrFail($id);
        return view('congty.sanpham.show', ['title' => 'Chi tiết sản phẩm'], compact('sanPham'));
    }
}
