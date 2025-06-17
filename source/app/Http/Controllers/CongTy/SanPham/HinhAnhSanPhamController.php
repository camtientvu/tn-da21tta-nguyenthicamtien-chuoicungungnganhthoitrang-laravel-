<?php

namespace App\Http\Controllers\CongTy\SanPham;

use App\Http\Controllers\Controller;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HinhAnhSanPhamController extends Controller
{
    public function create($id_san_pham)
    {
        $sanPham = SanPham::findOrFail($id_san_pham);
        return view('congty.sanpham.hinhanh.create', compact('sanPham'));
    }

    public function store(Request $request, $id_san_pham)
    {
        try {
            // Validate đầu vào
            $request->validate([
                'duong_dan_hinh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Kiểm tra có file không
            if (!$request->hasFile('duong_dan_hinh')) {
                return back()->withErrors(['duong_dan_hinh' => 'Không có tệp hình được tải lên.']);
            }

            $file = $request->file('duong_dan_hinh');

            // Kiểm tra file hợp lệ
            if (!$file->isValid()) {
                return back()->withErrors(['duong_dan_hinh' => 'Tệp tải lên không hợp lệ.']);
            }

            // Lưu file vào storage/app/public/hinh_san_pham
            $path = $file->store('hinh_san_pham', 'public');

            // Lưu vào database
            HinhAnhSanPham::create([
                'id_san_pham' => $id_san_pham,
                'duong_dan_hinh' => $path,
            ]);

            return redirect()
                ->route('congty.sanpham.show', $id_san_pham)
                ->with('success', 'Thêm hình ảnh thành công');
        } catch (\Exception $e) {
            Log::error('Lỗi khi thêm hình ảnh: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi khi thêm hình ảnh.');
        }
    }


    public function destroy($id)
    {
        $hinhAnh = HinhAnhSanPham::findOrFail($id);
        $id_san_pham = $hinhAnh->id_san_pham;

        if ($hinhAnh->duong_dan_hinh && Storage::disk('public')->exists($hinhAnh->duong_dan_hinh)) {
            Storage::disk('public')->delete($hinhAnh->duong_dan_hinh);
        }

        $hinhAnh->delete();
        return redirect()->route('congty.sanpham.show', $id_san_pham)->with('success', 'Đã xoá hình ảnh');
    }
}
