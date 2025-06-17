<?php

namespace App\Http\Controllers\NhaCungCap;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVienNhaCungCap;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\DonGiaoHang;
use App\Models\DonHang;
use App\Models\PhanCongGiaoHang;
use App\Models\LoTrinhDon;

use Carbon\Carbon;

class CungCapController extends Controller
{
    public function nhanvien()
    {
        $user = Auth::user();
        $nvNCC = $user->nhanVienNhaCungCap;

        if (!$nvNCC || $nvNCC->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc nhà cung cấp mới được phép truy cập.');
        }

        // Lấy danh sách nhân viên thuộc cùng nhà cung cấp
        $nhanViens = NhanVienNhaCungCap::with(['user', 'nhaCungCap'])
            ->where('id_nha_cung_cap', $nvNCC->id_nha_cung_cap)
            ->get();

        return view('nhacungcap.nguoidung.index', [
            'title' => 'Danh sách nhân viên'
        ], compact('nhanViens'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->nhanVienNhaCungCap->vai_tro !== 'giam_doc') {
            abort(403, 'Chỉ giám đốc mới được chỉnh sửa.');
        }

        $nhanVien = NhanVienNhaCungCap::with('user')->findOrFail($id);
        return view('nhacungcap.nguoidung.edit', compact('nhanVien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vai_tro' => ['required', Rule::in(['thuc_thi', 'giam_doc'])],
        ]);

        $nhanVien = NhanVienNhaCungCap::findOrFail($id);
        $nhanVien->update(['vai_tro' => $request->vai_tro]);

        return redirect()->route('nhacungcap.nguoidung.index')->with('success', 'Cập nhật thành công');
    }
}
