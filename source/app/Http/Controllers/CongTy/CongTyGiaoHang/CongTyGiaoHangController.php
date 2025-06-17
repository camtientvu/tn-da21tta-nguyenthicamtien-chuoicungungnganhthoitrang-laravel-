<?php

namespace App\Http\Controllers\CongTy\CongTyGiaoHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CongTyGiaoHang;

class CongTyGiaoHangController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $dsCongTyGiaoHang = CongTyGiaoHang::all();
        return view('congty.congtygiaohang.index', [
            'title' => 'Danh sách công ty giao hàng',
            'congtygiaohangs' => $dsCongTyGiaoHang
        ]);
    }

    // Form thêm mới
    public function create()
    {
        return view('congty.congtygiaohang.create', ['title' => 'Thêm công ty giao hàng']);
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

        CongTyGiaoHang::create($request->all());

        return redirect()->route('congty.congtygiaohang.index')
            ->with('success', 'Thêm công ty giao hàng thành công!');
    }

    // Form sửa
    public function edit($id)
    {
        $congTyGiaoHang = CongTyGiaoHang::findOrFail($id);
        return view('congty.congtygiaohang.edit', ['title' => 'Sửa công ty giao hàng'], compact('congTyGiaoHang'));
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

        $congTyGiaoHang = CongTyGiaoHang::findOrFail($id);
        $congTyGiaoHang->update($request->all());

        return redirect()->route('congty.congtygiaohang.index')
            ->with('success', 'Cập nhật thành công!');
    }

    // Xóa
    public function destroy($id)
    {
        $congTyGiaoHang = CongTyGiaoHang::findOrFail($id);
        $congTyGiaoHang->delete();

        return redirect()->route('congty.congtygiaohang.index')
            ->with('success', 'Xóa thành công!');
    }
}
