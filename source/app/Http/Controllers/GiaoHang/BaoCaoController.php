<?php

namespace App\Http\Controllers\GiaoHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DonGiaoHang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BaoCaoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $nvGH = $user->nhanVienGiaoHang;

        if (!$nvGH) {
            abort(403, 'Không xác định được nhân viên giao hàng');
        }

        $idCongTy = $nvGH->id_cong_ty_giao_hang;

        $tuNgay = $request->input('tu_ngay', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $denNgay = $request->input('den_ngay', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $donGiao = $this->getDonGiao($idCongTy, $tuNgay, $denNgay);
        $tongDon = $donGiao->count();
        $tongDoanhThu = $this->tinhTongDoanhThu($donGiao);

        $trangThai = $this->getTrangThaiThongKe($idCongTy, $tuNgay, $denNgay);

        return view('giaohang.baocao.index', compact(
            'tuNgay',
            'denNgay',
            'tongDon',
            'tongDoanhThu',
            'trangThai'
        ));
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $nvGH = $user->nhanVienGiaoHang;

        if (!$nvGH) {
            return response()->json(['error' => 'Không xác định được nhân viên giao hàng'], 403);
        }

        $idCongTy = $nvGH->id_cong_ty_giao_hang;
        $tuNgay = $request->input('from');
        $denNgay = $request->input('to');
        $trangThaiLoc = $request->input('trang_thai');

        $donGiao = $this->getDonGiao($idCongTy, $tuNgay, $denNgay, $trangThaiLoc);
        $tongDon = $donGiao->count();
        $tongDoanhThu = $this->tinhTongDoanhThu($donGiao);

        $trangThai = $this->getTrangThaiThongKe($idCongTy, $tuNgay, $denNgay);

        return response()->json([
            'tongDon' => $tongDon,
            'tongDoanhThu' => $tongDoanhThu,
            'trangThai' => $trangThai,
        ]);
    }

    public function exportPDF(Request $request)
    {
        $user = Auth::user();
        $nvGH = $user->nhanVienGiaoHang;

        if (!$nvGH) {
            abort(403, 'Không xác định được nhân viên giao hàng');
        }

        $idCongTy = $nvGH->id_cong_ty_giao_hang;

        $tuNgay = $request->input('tu_ngay', now()->startOfMonth()->format('Y-m-d'));
        $denNgay = $request->input('den_ngay', now()->endOfMonth()->format('Y-m-d'));
        $trangThaiLoc = $request->input('trang_thai');

        $donGiao = $this->getDonGiao($idCongTy, $tuNgay, $denNgay, $trangThaiLoc);
        $tongDon = $donGiao->count();
        $tongDoanhThu = $this->tinhTongDoanhThu($donGiao);

        $trangThai = $this->getTrangThaiThongKe($idCongTy, $tuNgay, $denNgay);

        $pdf = PDF::loadView('giaohang.baocao.pdf', compact(
            'tuNgay',
            'denNgay',
            'donGiao',
            'tongDon',
            'tongDoanhThu',
            'trangThai'
        ));

        return $pdf->download("BaoCaoGiaoHang_{$tuNgay}_den_{$denNgay}.pdf");
    }

    // ------------------------------
    // HÀM DÙNG CHUNG
    // ------------------------------

    private function getDonGiao($idCongTy, $tuNgay, $denNgay, $trangThai = null)
    {
        $query = DonGiaoHang::with('donHang.chiTietDonHangs')
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay]);

        if ($trangThai) {
            $query->where('trang_thai', $trangThai);
        }

        return $query->get();
    }

    private function tinhTongDoanhThu($donGiaoCollection)
    {
        return $donGiaoCollection->filter(fn($d) => $d->trang_thai === 'Đã giao')
            ->sum(fn($d) => optional($d->donHang)->getTongTien() ?? 0);
    }

    private function getTrangThaiThongKe($idCongTy, $tuNgay, $denNgay)
    {
        return DonGiaoHang::select('trang_thai', DB::raw('count(*) as so_luong'))
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay])
            ->groupBy('trang_thai')
            ->get();
    }
}