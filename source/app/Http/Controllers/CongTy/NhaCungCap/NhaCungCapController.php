<?php

namespace App\Http\Controllers\CongTy\NhaCungCap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhaCungCap;

class NhaCungCapController extends Controller
{
    // Hiển thị danh sách nhà cung cấp
    public function index()
    {
        $dsNhaCungCap = NhaCungCap::all();
        return view('congty.nhacungcap.index', [
            'title' => 'Danh sách nhà cung cấp',
            'nhacungcaps' => $dsNhaCungCap
        ]);
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('congty.nhacungcap.create', ['title' => 'Thêm nhà cung cấp']);
    }

    // Xử lý thêm mới
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'nullable|email',
            'so_dien_thoai' => 'nullable|string|max:20',
            'dia_chi' => 'nullable|string|max:255',
        ]);

        NhaCungCap::create($request->all());

        return redirect()->route('congty.nhacungcap.index')
            ->with('success', 'Thêm nhà cung cấp thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $nhaCungCap = NhaCungCap::findOrFail($id);
        return view('congty.nhacungcap.edit', ['title' => 'Sửa nhà cung cấp'], compact('nhaCungCap'));
    }

    // Xử lý cập nhật
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'nullable|email',
            'so_dien_thoai' => 'nullable|string|max:20',
            'dia_chi' => 'nullable|string|max:255',
        ]);

        $nhaCungCap = NhaCungCap::findOrFail($id);
        $nhaCungCap->update($request->all());

        return redirect()->route('congty.nhacungcap.index')
            ->with('success', 'Cập nhật thành công!');
    }

    // Xử lý xóa
    public function destroy($id)
    {
        $nhaCungCap = NhaCungCap::findOrFail($id);
        $nhaCungCap->delete();

        return redirect()->route('congty.nhacungcap.index')
            ->with('success', 'Xóa thành công!');
    }
}
