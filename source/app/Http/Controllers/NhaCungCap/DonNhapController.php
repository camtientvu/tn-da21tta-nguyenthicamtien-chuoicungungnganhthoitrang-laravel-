<?php

namespace App\Http\Controllers\NhaCungCap;

use App\Http\Controllers\Controller;
use App\Models\DonNhapNguyenLieu;
use App\Models\ChiTietNhapNguyenLieu;
use App\Models\LoNguyenLieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonNhapController extends Controller
{
    // Hiển thị danh sách đơn nhập của công ty hiện tại
    public function index()
    {
        $user = Auth::user();
        $nv = $user->nhanVienNhaCungCap;

        if (!$nv) {
            abort(403, 'Bạn không thuộc nhà cung cấp nào.');
        }

        $donNhaps = DonNhapNguyenLieu::with([
            'chiTietNhapNguyenLieus.nguyenLieuNCC'
        ])
            ->where('id_nha_cung_cap', $nv->id_nha_cung_cap)
            ->orderByDesc('ngay_nhap')
            ->withCount('chiTietNhapNguyenLieus')
            ->get();


        return view('nhacungcap.donnhap.index', compact('donNhaps'));
    }

    // Cập nhật trạng thái đơn
    public function updateTrangThai(Request $request, $id)
    {
        $donNhap = DonNhapNguyenLieu::findOrFail($id);

        $request->validate([
            'trang_thai' => 'required|in:Chờ duyệt,Đã duyệt,Hoàn thành,Hủy',
        ]);

        // Không cho quay lùi trạng thái
        $trangThaiHienTai = $donNhap->trang_thai;
        $trangThaiMoi = $request->trang_thai;

        $thuTu = ['Chờ duyệt' => 1, 'Đã duyệt' => 2, 'Hoàn thành' => 3, 'Hủy' => 4];
        if ($thuTu[$trangThaiMoi] < $thuTu[$trangThaiHienTai]) {
            return back()->with('error', 'Không thể quay lại trạng thái trước đó.');
        }

        $donNhap->trang_thai = $trangThaiMoi;
        $donNhap->save();

        return back()->with('success', 'Cập nhật trạng thái thành công.');
    }

    // Xóa đơn nhập, kèm chi tiết và lô
    public function destroy($id)
    {
        $donNhap = DonNhapNguyenLieu::with(['chiTietNhapNguyenLieus', 'loNguyenLieus'])->findOrFail($id);

        if ($donNhap->trang_thai !== 'Chờ duyệt') {
            return back()->with('error', 'Chỉ được xóa đơn khi đang ở trạng thái "chờ duyệt".');
        }

        // Xóa chi tiết và lô
        $donNhap->chiTietNhapNguyenLieus()->delete();
        $donNhap->loNguyenLieus()->delete();

        $donNhap->delete();

        return redirect()->route('nhacungcap.donnhap.index')->with('success', 'Đã xóa đơn nhập và toàn bộ dữ liệu liên quan.');
    }
}
