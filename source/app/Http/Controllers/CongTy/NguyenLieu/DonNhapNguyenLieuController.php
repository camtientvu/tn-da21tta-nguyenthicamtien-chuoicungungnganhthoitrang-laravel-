<?php

namespace App\Http\Controllers\CongTy\NguyenLieu;

use App\Http\Controllers\Controller;
use App\Models\DonNhapNguyenLieu;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ChiTietNhapNguyenLieu;
use App\Models\NguyenLieu;
use App\Models\LoNguyenLieu;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class DonNhapNguyenLieuController extends Controller
{
    public function index()
    {
        $donNhaps = DonNhapNguyenLieu::with('nhaCungCap')->get();
        return view('congty.nguyenlieu.donnhap.index', [
            'title' => 'Danh sách đơn nhập nguyên liệu'
        ], compact('donNhaps'));
    }

    public function create()
    {
        $nhaCungCaps = NhaCungCap::all();
        return view('congty.nguyenlieu.donnhap.create', [
            'title' => 'Thêm đơn nhập nguyên liệu',
            'nhaCungCaps' => $nhaCungCaps
        ]);
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
           
            'id_nha_cung_cap' => 'required|exists:nha_cung_cap,id',
            'ngay_nhap' => 'required|date',
        ]);

        try {
            // Tạo mới đơn nhập
            DonNhapNguyenLieu::create($request->all());

            // Trả về thông báo thành công
            return redirect()->route('congty.donnhap.index')->with('success', 'Thêm đơn nhập thành công');
        } catch (\Exception $e) {
            // Ghi log nếu cần
            Log::error('Lỗi khi thêm đơn nhập: ' . $e->getMessage());

            // Trả về thông báo lỗi
            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi thêm đơn nhập. Vui lòng thử lại sau.');
        }
    }


    public function edit($id)
    {
        $donNhap = DonNhapNguyenLieu::findOrFail($id);
        $nhaCungCaps = NhaCungCap::all();
        return view('congty.nguyenlieu.donnhap.edit', [
            'title' => 'Sửa đơn nhập nguyên liệu'
        ], compact('donNhap', 'nhaCungCaps'));
    }



    public function update(Request $request, $id)
    {
        $donNhap = DonNhapNguyenLieu::findOrFail($id);

        $request->validate([
            
            'id_nha_cung_cap' => 'required|exists:nha_cung_cap,id',
            'ngay_nhap' => 'required|date',

            'trang_thai' => 'required|string|in:Chờ duyệt,Đã duyệt,Hoàn thành,Hủy',
        ]);

        DB::beginTransaction();

        try {
            // Cập nhật đơn nhập
            $donNhap->update($request->all());

            // Nếu trạng thái là "Hoàn thành", cập nhật số lượng nguyên liệu
            if ($request->trang_thai === 'Hoàn thành') {
                foreach ($donNhap->chiTietNhapNguyenLieus as $chiTiet) {
                    $nguyenLieu = $chiTiet->nguyenLieu;
                    if ($nguyenLieu) {
                        $nguyenLieu->increment('so_luong', $chiTiet->so_luong);
                    }
                }
            }

            DB::commit();

            return redirect()->route('congty.donnhap.index')
                ->with('success', 'Cập nhật đơn nhập thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Lỗi khi cập nhật đơn nhập nguyên liệu', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'don_nhap_id' => $id,
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi cập nhật đơn nhập. Vui lòng thử lại.');
        }
    }


    public function destroy($id)
    {
        $donNhap = DonNhapNguyenLieu::findOrFail($id);

        // Kiểm tra trạng thái
        if ($donNhap->trang_thai === 'Hoàn thành') {
            return redirect()->route('congty.donnhap.index')
                ->with('error', 'Không thể xóa đơn nhập đã hoàn thành.');
        }

        $donNhap->delete();

        return redirect()->route('congty.donnhap.index')
            ->with('success', 'Xóa đơn nhập thành công');
    }

    public function show($id)
    {
        $donNhap = DonNhapNguyenLieu::with([
            'chiTietNhapNguyenLieus.nguyenLieuNCC',
            'loNguyenLieus.nguyenLieuNCC',
            'nhaCungCap'
        ])->findOrFail($id);

        // Lấy danh sách nguyên liệu thuộc nhà cung cấp này
        $nguyenLieuList = \App\Models\NguyenLieuNhaCungCap::where('id_nha_cung_cap', $donNhap->id_nha_cung_cap)->get();

        return view('congty.nguyenlieu.donnhap.show', compact('donNhap', 'nguyenLieuList'));
    }


    public function storeChiTiet(Request $request, $id)
    {
        $donNhap = DonNhapNguyenLieu::findOrFail($id);

        if ($donNhap->trang_thai !== 'Chờ duyệt') {
            return back()->with('error', 'Chỉ được phép thêm khi đơn đang chờ duyệt.');
        }

        $validated = $request->validate([
            'id_nguyen_lieu_ncc' => 'required|exists:nguyen_lieu_nha_cung_cap,id',
            'so_luong' => 'required|numeric|min:1',
            'gia' => 'required|numeric|min:0',
        ]);

        // Tạo chi tiết nhập nguyên liệu từ NCC
        $chiTiet = new \App\Models\ChiTietNhapNguyenLieu([
            'id_don_nhap' => $donNhap->id,
            'id_nguyen_lieu_ncc' => $validated['id_nguyen_lieu_ncc'],
            'so_luong' => $validated['so_luong'],
            'gia' => $validated['gia'],
        ]);
        $chiTiet->save();

        // Cập nhật tổng tiền đơn nhập
        $donNhap->tong_tien += $chiTiet->so_luong * $chiTiet->gia;
        $donNhap->save();

        // Tạo lô nguyên liệu tương ứng
        \App\Models\LoNguyenLieu::create([
            'id_don_nhap' => $donNhap->id,
            'id_nguyen_lieu_ncc' => $validated['id_nguyen_lieu_ncc'],
            'so_luong_nhap' => $validated['so_luong'],
            'so_luong_su_dung' => 0,
        ]);

        return back()->with('success', 'Đã thêm chi tiết nguyên liệu và lô nguyên liệu.');
    }
    public function destroyChiTiet($id)
    {
        $chiTiet = \App\Models\ChiTietNhapNguyenLieu::findOrFail($id);
        $donNhap = $chiTiet->donNhapNguyenLieu;

        if ($donNhap->trang_thai !== 'Chờ duyệt') {
            return back()->with('error', 'Chỉ được phép xóa khi đơn đang chờ duyệt.');
        }

        // Giảm tổng tiền
        $donNhap->tong_tien -= $chiTiet->so_luong * $chiTiet->gia;
        $donNhap->save();

        // Xóa lô nguyên liệu tương ứng
        \App\Models\LoNguyenLieu::where([
            'id_don_nhap' => $donNhap->id,
            'id_nguyen_lieu_ncc' => $chiTiet->id_nguyen_lieu_ncc,
            'so_luong_nhap' => $chiTiet->so_luong
        ])->delete();

        $chiTiet->delete();

        return back()->with('success', 'Đã xóa chi tiết nguyên liệu và lô nguyên liệu.');
    }



    public function exportPdf($id)
    {
        $donNhap = DonNhapNguyenLieu::with(['nhaCungCap', 'chiTietNhapNguyenLieus.nguyenLieuNCC', 'loNguyenLieus'])->findOrFail($id);
        $pdf = PDF::loadView('congty.nguyenlieu.donnhap.pdf', compact('donNhap'));
        return $pdf->download("phieu-nhap-{$donNhap->ma}.pdf");
    }
}