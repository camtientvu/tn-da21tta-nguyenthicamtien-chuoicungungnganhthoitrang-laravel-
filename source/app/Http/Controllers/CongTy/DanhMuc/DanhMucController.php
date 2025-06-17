<?php

namespace App\Http\Controllers\CongTy\DanhMuc;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all();
        return view('congty.danhmuc.index', ['title' => 'Danh sách danh mục'], compact('danhMucs'));
    }

    public function create()
    {
        return view('congty.danhmuc.create', ['title' => 'Thêm danh mục']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|boolean',
        ]);

        DanhMuc::create($request->all());

        return redirect()->route('congty.danhmuc.index')->with('success', 'Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $danhMuc = DanhMuc::findOrFail($id);
        return view('congty.danhmuc.edit', ['title' => 'Sửa danh mục'], compact('danhMuc'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|boolean',
        ]);

        $danhMuc = DanhMuc::findOrFail($id);
        $danhMuc->update($request->all());

        return redirect()->route('congty.danhmuc.index')->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy($id)
    {
        $danhMuc = DanhMuc::findOrFail($id);
        $danhMuc->delete();

        return redirect()->route('congty.danhmuc.index')->with('success', 'Xóa danh mục thành công');
    }
}
