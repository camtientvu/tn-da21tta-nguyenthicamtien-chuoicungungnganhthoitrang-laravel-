<?php

namespace App\Http\Controllers\CongTy\NguyenLieu;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\NguyenLieuNhaCungCap;
use Illuminate\Http\Request;

class NguyenLieuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nv = $user->nhanVienNhaCungCap;

        if (!$nv) {
            abort(403, 'Bạn không thuộc công ty nhà cung cấp nào.');
        }

        $nguyenLieus = NguyenLieuNhaCungCap::where('id_nha_cung_cap', $nv->id_nha_cung_cap)->get();

        return view('nhacungcap.nguyenlieu.index', [
            'title' => 'Danh sách nguyên liệu công ty bạn',
            'nguyenLieus' => $nguyenLieus
        ]);
    }

    public function create()
    {
        
        return view('nhacungcap.nguyenlieu.create', ['title' => 'Thêm nguyên liệu']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'loai_nguyen_lieu' => 'required|string|max:255',
            'xuat_xu' => 'nullable|string',
            'don_vi_tinh' => 'required|string|max:50',

            'gia' => 'required|numeric|min:0',
        ]);


        $user = Auth::user();

        // Lấy id nhà cung cấp từ nhân viên đang đăng nhập
        $idNhaCungCap = $user->nhanVienNhaCungCap->id_nha_cung_cap ?? null;

        if (!$idNhaCungCap) {
            return back()->with('error', 'Không xác định được nhà cung cấp của nhân viên.');
        }

        // Tạo nguyên liệu gắn với nhà cung cấp
        NguyenLieuNhaCungCap::create([
            'ten' => $request->ten,
            'loai_nguyen_lieu' => $request->loai_nguyen_lieu,
            'xuat_xu' => $request->xuat_xu,
            'don_vi_tinh' => $request->don_vi_tinh,

            'gia' => $request->gia,
            'id_nha_cung_cap' => $idNhaCungCap,
        ]);

        return redirect()->route('nhacungcap.nguyenlieu.index')->with('success', 'Thêm nguyên liệu thành công');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $nv = $user->nhanVienNhaCungCap;

        $nguyenLieu = NguyenLieuNhaCungCap::findOrFail($id);

        if (!$nv || $nguyenLieu->id_nha_cung_cap !== $nv->id_nha_cung_cap) {
            abort(403, 'Bạn không có quyền sửa nguyên liệu này.');
        }

        return view('nhacungcap.nguyenlieu.edit', ['title' => 'Sửa nguyên liệu'], compact('nguyenLieu'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $nv = $user->nhanVienNhaCungCap;

        $nguyenLieu = NguyenLieuNhaCungCap::findOrFail($id);

        if (!$nv || $nguyenLieu->id_nha_cung_cap !== $nv->id_nha_cung_cap) {
            abort(403, 'Bạn không có quyền cập nhật nguyên liệu này.');
        }

        $request->validate([
            'ten' => 'required|string|max:255',
            'loai_nguyen_lieu' => 'required|string|max:255',
            'xuat_xu' => 'nullable|string',
            'don_vi_tinh' => 'required|string|max:50',

            'gia' => 'required|numeric|min:0',
        ]);

        $nguyenLieu->update([
            'ten' => $request->ten,
            'loai_nguyen_lieu' => $request->loai_nguyen_lieu,
            'xuat_xu' => $request->xuat_xu,
            'don_vi_tinh' => $request->don_vi_tinh,

            'gia' => $request->gia
        ]);

        return redirect()->route('nhacungcap.nguyenlieu.index')->with('success', 'Cập nhật nguyên liệu thành công');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $nv = $user->nhanVienNhaCungCap;

        $nguyenLieu = NguyenLieuNhaCungCap::findOrFail($id);

        if (!$nv || $nguyenLieu->id_nha_cung_cap !== $nv->id_nha_cung_cap) {
            abort(403, 'Bạn không có quyền xóa nguyên liệu này.');
        }

        $nguyenLieu->delete();

        return redirect()->route('nhacungcap.nguyenlieu.index')->with('success', 'Xóa nguyên liệu thành công');
    }
}