<?php

namespace App\Http\Controllers\NhaCungCap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DonNhapNguyenLieu;
use App\Models\ChiTietNhapNguyenLieu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BaoCaoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $nhanVien = $user->nhanVienNhaCungCap;

        if (!$nhanVien) {
            abort(403, 'Không xác định được nhà cung cấp');
        }

        $idNCC = $nhanVien->id_nha_cung_cap;

        $tuNgay = $request->input('tu_ngay', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $denNgay = $request->input('den_ngay', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $donNhap = DonNhapNguyenLieu::where('id_nha_cung_cap', $idNCC)
            ->whereBetween('ngay_nhap', [$tuNgay, $denNgay])
            ->get();

        $tongDon = $donNhap->count();
        $tongDoanhThu = $donNhap->where('trang_thai', 'Hoàn thành')->sum('tong_tien');

        $trangThai = DonNhapNguyenLieu::select('trang_thai', DB::raw('count(*) as so_luong'))
            ->where('id_nha_cung_cap', $idNCC)
            ->whereBetween('ngay_nhap', [$tuNgay, $denNgay])
            ->groupBy('trang_thai')
            ->get();

        $topNguyenLieu = ChiTietNhapNguyenLieu::select(
            'id_nguyen_lieu_ncc',
            DB::raw('SUM(so_luong) as tong_so_luong')
        )
            ->whereHas('donNhapNguyenLieu', function ($q) use ($idNCC, $tuNgay, $denNgay) {
                $q->where('id_nha_cung_cap', $idNCC)
                    ->whereBetween('ngay_nhap', [$tuNgay, $denNgay]);
            })
            ->groupBy('id_nguyen_lieu_ncc')
            ->orderByDesc('tong_so_luong')
            ->with('nguyenLieuNCC')
            ->take(2)
            ->get();

        $danhSachNguyenLieu = DB::table('nguyen_lieu_nha_cung_cap')
            ->where('id_nha_cung_cap', $idNCC)
            ->get();

        return view('nhacungcap.baocao.index', compact(
            'tuNgay',
            'denNgay',
            'tongDon',
            'tongDoanhThu',
            'topNguyenLieu',
            'trangThai',
            'danhSachNguyenLieu'
        ));
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $nhanVien = $user->nhanVienNhaCungCap;

        if (!$nhanVien) {
            return response()->json(['error' => 'Không xác định được nhà cung cấp'], 403);
        }

        $idNCC = $nhanVien->id_nha_cung_cap;

        // Lấy dữ liệu từ request
        $tuNgay = $request->input('from');
        $denNgay = $request->input('to');
        $nguyenLieuId = $request->input('nguyen_lieu');
        $trangThaiLoc = $request->input('trang_thai');

        // Khởi tạo query đơn nhập
        $donNhapQuery = DonNhapNguyenLieu::where('id_nha_cung_cap', $idNCC)
            ->whereBetween('ngay_nhap', [$tuNgay, $denNgay]);

        // Lọc theo trạng thái nếu có
        if (!empty($trangThaiLoc)) {
            $donNhapQuery->where('trang_thai', $trangThaiLoc);
        }

        // Lọc theo nguyên liệu nếu có
        if (!empty($nguyenLieuId)) {
            $donNhapQuery->whereHas('chiTietNhapNguyenLieus', function ($q) use ($nguyenLieuId) {
                $q->where('id_nguyen_lieu_ncc', $nguyenLieuId);
            });
        }

        // Lấy kết quả sau khi lọc
        $donNhap = $donNhapQuery->get();

        // Tổng số đơn
        $tongDon = $donNhap->count();

        // Chỉ tính doanh thu từ các đơn đã hoàn thành
        $tongDoanhThu = $donNhap->where('trang_thai', 'Hoàn thành')->sum('tong_tien');

        // Biểu đồ trạng thái (thống kê theo trạng thái trong toàn bộ khoảng lọc, không phụ thuộc filter trạng thái hiện tại)
        $trangThai = DonNhapNguyenLieu::select('trang_thai', DB::raw('count(*) as so_luong'))
            ->where('id_nha_cung_cap', $idNCC)
            ->whereBetween('ngay_nhap', [$tuNgay, $denNgay]);

        if (!empty($nguyenLieuId)) {
            $trangThai->whereHas('chiTietNhapNguyenLieus', function ($q) use ($nguyenLieuId) {
                $q->where('id_nguyen_lieu_ncc', $nguyenLieuId);
            });
        }

        $trangThai = $trangThai->groupBy('trang_thai')->get();

        // Trả về JSON
        return response()->json([
            'tongDon' => $tongDon,
            'tongDoanhThu' => $tongDoanhThu,
            'trangThai' => $trangThai,
        ]);
    }


    public function exportPDF(Request $request)
    {
        $user = Auth::user();
        $nhanVien = $user->nhanVienNhaCungCap;
        if (!$nhanVien) abort(403);

        $idNCC = $nhanVien->id_nha_cung_cap;
        $tuNgay = $request->input('tu_ngay', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $denNgay = $request->input('den_ngay', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $donNhap = DonNhapNguyenLieu::where('id_nha_cung_cap', $idNCC)
            ->whereBetween('ngay_nhap', [$tuNgay, $denNgay])->get();

        $tongDon = $donNhap->count();
        $tongDoanhThu = $donNhap->where('trang_thai', 'Hoàn thành')->sum('tong_tien');

        $pdf = Pdf::loadView('nhacungcap.baocao.pdf', compact('donNhap', 'tongDon', 'tongDoanhThu', 'tuNgay', 'denNgay'));
        return $pdf->download('bao_cao_nhap_nguyen_lieu.pdf');
    }
}
