<?php

namespace App\Http\Controllers\GiaoHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DonGiaoHang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;

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

        $donGiao = DonGiaoHang::where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay])
            ->get();

        $tongDon = $donGiao->count();
        $tongDoanhThu = $this->tinhTongDoanhThu($idCongTy, $tuNgay, $denNgay);


        $trangThai = DonGiaoHang::select('trang_thai', DB::raw('count(*) as so_luong'))
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay])
            ->groupBy('trang_thai')
            ->get();

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

        $query = DonGiaoHang::where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay]);

        if ($trangThaiLoc) {
            $query->where('trang_thai', $trangThaiLoc);
        }

        $donGiao = $query->get();

        $tongDon = $donGiao->count();
        $tongDoanhThu = $donGiao->where('trang_thai', 'da_giao')->sum('tong_tien');

        $trangThai = DonGiaoHang::select('trang_thai', DB::raw('count(*) as so_luong'))
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay])
            ->groupBy('trang_thai')
            ->get();

        return response()->json([
            'tongDon' => $tongDon,
            'tongDoanhThu' => $tongDoanhThu,
            'trangThai' => $trangThai,
        ]);
    }



    public function tinhTongDoanhThu($idCongTy, $tuNgay, $denNgay)
    {
        $donGiaoDaGiao = DonGiaoHang::with('donHang.chiTietDonHang')
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->where('trang_thai', 'da_giao')
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay])
            ->get();

        $tongDoanhThu = $donGiaoDaGiao->sum(function ($donGiao) {
            return $donGiao->donHang ? $donGiao->donHang->getTongTien() : 0;
        });

        return $tongDoanhThu;
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

        $query = DonGiaoHang::where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay]);

        if ($trangThaiLoc) {
            $query->where('trang_thai', $trangThaiLoc);
        }

        $donGiao = $query->get();

        $tongDon = $donGiao->count();
        $tongDoanhThu = $donGiao->where('trang_thai', 'Hoàn thành')->sum('tong_tien');

        $trangThai = DonGiaoHang::select('trang_thai', DB::raw('count(*) as so_luong'))
            ->where('id_cong_ty_giao_hang', $idCongTy)
            ->whereBetween('ngay_giao', [$tuNgay, $denNgay])
            ->groupBy('trang_thai')
            ->get();

        $pdf = PDF::loadView('giaohang.baocao.pdf', [
            'tuNgay' => $tuNgay,
            'denNgay' => $denNgay,
            'donGiao' => $donGiao,
            'tongDon' => $tongDon,
            'tongDoanhThu' => $tongDoanhThu,
            'trangThai' => $trangThai,
        ]);

        // Tên file có thể tuỳ chỉnh
        return $pdf->download("BaoCaoGiaoHang_{$tuNgay}_den_{$denNgay}.pdf");
    }
}
