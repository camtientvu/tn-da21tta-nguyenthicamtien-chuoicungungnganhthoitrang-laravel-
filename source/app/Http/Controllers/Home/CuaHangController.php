<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuaHangController extends Controller
{
    public function index(Request $request)
    {
        $query = SanPham::with('hinhAnhSanPhams');

        // 🔍 Lọc theo danh mục
        if ($request->filled('danh_muc')) {
            $query->where('id_danh_muc', $request->danh_muc);
        }

        if ($request->filled('gia_tu') && $request->filled('gia_den')) {
    $giaTu = (float) preg_replace('/[^\d.]/', '', $request->gia_tu);
    $giaDen = (float) preg_replace('/[^\d.]/', '', $request->gia_den);
    $query->whereBetween(DB::raw('gia - giamgia'), [$giaTu, $giaDen]);
}
        // 🔍 Lọc sản phẩm mới
        if ($request->filled('moi')) {
            $query->orderByDesc('created_at');
        }



        $sanPhams = $query->where('trang_thai', 1)->paginate(12);
        $danhMucs = DanhMuc::all();

        return view('home.cuahang.index', compact('sanPhams', 'danhMucs'));
    }

    public function timKiem(Request $request)
    {
        $tuKhoa = $request->input('q');
        $danhMucs = DanhMuc::all();
        $sanPhams = SanPham::with('hinhAnhSanPhams')
            ->where('ten', 'like', '%' . $tuKhoa . '%')
            ->where('trang_thai', 1)->orWhere('mo_ta', 'like', '%' . $tuKhoa . '%')
            ->paginate(12);

        return view('home.cuahang.timkiem', [
            'sanPhams' => $sanPhams,
            'tuKhoa' => $tuKhoa,
            'danhMucs' => $danhMucs,
        ]);
    }
}