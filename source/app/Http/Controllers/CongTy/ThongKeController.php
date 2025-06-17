<?php

namespace App\Http\Controllers\CongTy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\DonNhapNguyenLieu;
use App\Models\LoNguyenLieu;
use App\Models\NguyenLieuNhaCungCap;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use App\Models\DanhGia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        // Nếu có start_date và end_date từ form, dùng chúng
        if ($request->filled(['start_date', 'end_date'])) {
            $start = Carbon::parse($request->start_date)->startOfDay();
            $end = Carbon::parse($request->end_date)->endOfDay();
        } else {
            // Mặc định lấy tháng hiện tại
            $start = now()->startOfMonth();
            $end = now()->endOfMonth();
        }

        // Từ đây, các truy vấn dùng $start và $end như cũ:

        $doanhThuTheoNgay = DonHang::where('trang_thai', 'Hoàn thành')
            ->whereBetween('ngay_dat', [$start, $end])
            ->selectRaw("DATE(ngay_dat) as ngay, SUM(tong_tien) as tong")
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->pluck('tong', 'ngay');

        $giaTriNhapTheoNgay = DonNhapNguyenLieu::where('trang_thai', 'Hoàn thành')
            ->whereBetween('ngay_nhap', [$start, $end])
            ->selectRaw("DATE(ngay_nhap) as ngay, SUM(tong_tien) as tong")
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->pluck('tong', 'ngay');

        // 1. Tổng đơn hàng
        $donHangQuery = DonHang::where('trang_thai', 'Hoàn thành')
            ->whereBetween('ngay_dat', [$start, $end]);


        $donHang = $donHangQuery->selectRaw('COUNT(*) as tong_don, SUM(tong_tien) as tong_doanh_thu')->first();

        $donHangTheoTrangThai = DonHang::selectRaw('trang_thai, COUNT(*) as so_luong')
            ->when($start, fn($q) => $q->where('ngay_dat', '>=', $start))
            ->when($end, fn($q) => $q->where('ngay_dat', '<=', $end))
            ->groupBy('trang_thai')
            ->pluck('so_luong', 'trang_thai');

        // 2. Tổng đơn nhập
        $donNhapQuery = DonNhapNguyenLieu::where('trang_thai', 'Hoàn thành')
            ->whereBetween('ngay_nhap', [$start, $end]);


        $donNhap = $donNhapQuery->selectRaw('COUNT(*) as tong_don, SUM(tong_tien) as tong_gia_tri')->first();

        $donNhapTheoTrangThai = DonNhapNguyenLieu::selectRaw('trang_thai, COUNT(*) as so_luong')
            ->when($start, fn($q) => $q->where('ngay_nhap', '>=', $start))
            ->when($end, fn($q) => $q->where('ngay_nhap', '<=', $end))
            ->groupBy('trang_thai')
            ->pluck('so_luong', 'trang_thai');



        // 5. Tồn kho

        $tonKho = LoNguyenLieu::with('nguyenLieuNCC')
            ->whereColumn('so_luong_nhap', '>', 'so_luong_su_dung')
            ->get()
            ->groupBy('id_nguyen_lieu_ncc');

        $tonKhoTongHop = $tonKho->map(function ($items) {
            return [
                'ten' => optional($items->first()->nguyenLieuNCC)->ten,
                'don_vi_tinh' => optional($items->first()->nguyenLieuNCC)->don_vi_tinh,
                'tong_ton' => $items->sum(fn($i) => $i->so_luong_nhap - $i->so_luong_su_dung),
            ];
        })->sortBy('tong_ton')->values(); // Sắp xếp tăng dần theo tồn kho


        // 6. Đánh giá
        $tongDanhGia = DanhGia::count();
        $danhGiaCao = DanhGia::where('so_sao', '>=', 4)->count();
        $danhGiaThap = DanhGia::where('so_sao', '<=', 2)->count();

        // 7. Xu hướng mua hàng
        $xuHuongMuaHang = DonHang::selectRaw("DATE_FORMAT(ngay_dat, '%Y-%m') as thang, COUNT(*) as so_don")
            ->when($start, fn($q) => $q->where('ngay_dat', '>=', $start))
            ->when($end, fn($q) => $q->where('ngay_dat', '<=', $end))
            ->groupBy('thang')
            ->orderBy('thang')
            ->pluck('so_don', 'thang');

        // 8. Top sản phẩm bán chạy
        $sanPhamMuaNhieu = SanPham::withCount(['chiTietSanPhams as tong_ban' => function ($q) {
            $q->join('chi_tiet_don_hang', 'chi_tiet_san_pham.id', '=', 'chi_tiet_don_hang.id_chi_tiet_san_pham')
                ->join('don_hang', 'chi_tiet_don_hang.id_don_hang', '=', 'don_hang.id')
                ->where('don_hang.trang_thai', 'Hoàn thành');
        }])
            ->having('tong_ban', '>', 0)
            ->orderByDesc('tong_ban')
            ->take(5)
            ->get();

        return view('congty.thongke.index', compact(
            'donHang',
            'donHangTheoTrangThai',
            'donNhap',
            'donNhapTheoTrangThai',
            'doanhThuTheoNgay',
            'giaTriNhapTheoNgay',
            'tongDanhGia',
            'danhGiaCao',
            'danhGiaThap',
            'xuHuongMuaHang',
            'sanPhamMuaNhieu',
            'tonKhoTongHop'
        ));
    }


    public function chiTietTonKho()
    {
        $loTonKho = \App\Models\LoNguyenLieu::with('nguyenLieuNCC.nhaCungCap')
            ->whereColumn('so_luong_nhap', '>', 'so_luong_su_dung')
            ->orderByRaw('so_luong_nhap - so_luong_su_dung ASC') // sắp xếp theo còn tồn
            ->get();

        return view('congty.thongke.tonkho_chitiet', compact('loTonKho'));
    }
}
