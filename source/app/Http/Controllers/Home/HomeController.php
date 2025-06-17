<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\ChiTietSanPham;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DonSanXuat;
use App\Models\NguyenLieuDonSanXuat;
use Illuminate\Support\Str;
use App\Models\DanhGia;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HomeController extends Controller
{

    function getCategoryIcon($categoryName)
    {
        //  đổi tiếng Việt sang từ khóa tiếng Anh gần đúng
        $map = [
            'giày' => 'fa-shoe-prints',
            'sục' => 'fa-sliders-h',
            'cao gót' => 'fa-high-heel',
            'khuyến mãi' => 'fa-tags',
            'điện thoại' => 'fa-phone',
            'máy tính' => 'fa-laptop',
            'túi' => 'fa-shopping-bag',
            'áo' => 'fa-tshirt',
            'mũ' => 'fa-hat-cowboy',
            'phụ kiện thời trang' => 'fa-gem',
            'nón' => 'fa-hard-hat',
            'sản phẩm xu hướng' => 'fa-chart-line',
            'quần' => 'fa-person-dress'
        ];

        $lower = mb_strtolower($categoryName);

        foreach ($map as $keyword => $icon) {
            if (str_contains($lower, $keyword)) {
                return $icon;
            }
        }

        // Mặc định nếu không khớp
        return 'fa-box';
    }

    public function index()
    {
        // Lấy danh sách danh mục
        $danhMucs = DanhMuc::all();
        // Map danh mục với icon phù hợp
        $danhMucs = $danhMucs->map(function ($dm) {
            $dm->icon = $this->getCategoryIcon($dm->ten);
            return $dm;
        });
        // Lấy 8 sản phẩm mới nhất, kèm theo 1 ảnh bất kỳ (dùng eager loading)
        $sanPhams = SanPham::with(['hinhAnhSanPhams' => function ($query) {
            $query->limit(1); // Chỉ lấy 1 ảnh đầu tiên của mỗi sản phẩm
        }])->withAvg('danhGias as sao_tb', 'so_sao')->where('trang_thai', 1)->latest()->take(4)->get();
        // Trả về view home.index kèm dữ liệu


        // Lấy 2 danh mục đầu tiên
        $danhMuc1 = $danhMucs->get(0); // hoặc $danhMucs[0] nếu chắc chắn tồn tại
        $danhMuc2 = $danhMucs->get(1);

        // Lấy sản phẩm thuộc danh mục 1
        $sanPhamsDanhMuc1 = collect();
        $sanPhamsDanhMuc2 = collect();
        if ($danhMuc1) {
            $sanPhamsDanhMuc1 = SanPham::with(['hinhAnhSanPhams' => fn($q) => $q->limit(1)])->withAvg('danhGias as sao_tb', 'so_sao')
                ->where('id_danh_muc', $danhMuc1->id)
                ->where('trang_thai', 1)->latest()->take(4)->get();
        }

        // Lấy sản phẩm thuộc danh mục 2
        if ($danhMuc2) {
            $sanPhamsDanhMuc2 = SanPham::with(['hinhAnhSanPhams' => fn($q) => $q->limit(1)])->withAvg('danhGias as sao_tb', 'so_sao')
                ->where('id_danh_muc', $danhMuc2->id)
                ->where('trang_thai', 1)->latest()->take(4)->get();
        }

        // Lấy sản phẩm bán chạy theo số lượt bán (đã hoàn thành)
        $sanPhamBanChay = SanPham::with(['hinhAnhSanPhams' => fn($q) => $q->limit(1)])
            ->withAvg('danhGias as sao_tb', 'so_sao')->withCount(['chiTietSanPhams as tong_ban' => function ($q) {
                $q->join('chi_tiet_don_hang', 'chi_tiet_san_pham.id', '=', 'chi_tiet_don_hang.id_chi_tiet_san_pham')
                    ->join('don_hang', 'chi_tiet_don_hang.id_don_hang', '=', 'don_hang.id')
                    ->where('don_hang.trang_thai', 'Hoàn thành');
            }])
            ->orderByDesc('tong_ban')
            ->take(4)
            ->get();

        return view('home.index', compact(
            'danhMucs',
            'sanPhams',
            'danhMuc1',
            'sanPhamsDanhMuc1',
            'danhMuc2',
            'sanPhamsDanhMuc2',
            'sanPhamBanChay'
        ));
        return view('home.index', compact('danhMucs', 'sanPhams'));
    }

    public function show($id)
    {
        $sanPham = SanPham::with(['chiTietSanPhams', 'hinhAnhSanPhams'])->withAvg('danhGias as sao_tb', 'so_sao')->findOrFail($id);
        $sizes = $sanPham->chiTietSanPhams->unique();

        // 🔎 Lấy đơn sản xuất mới nhất
        $donSanXuat = DonSanXuat::where('id_san_pham', $id)
            ->where('trang_thai', 'Hoàn thành')
            ->latest('ngay_ket_thuc')
            ->with(['nguyenLieuDonSanXuats.loNguyenLieu.nguyenLieuNCC'])
            ->first();

        $thanhPhan = collect();

        if ($donSanXuat) {
            $tong = $donSanXuat->nguyenLieuDonSanXuats->sum('so_luong');

            $thanhPhan = $donSanXuat->nguyenLieuDonSanXuats->map(function ($item) use ($tong) {
                return [
                    'ten' => $item->loNguyenLieu->nguyenLieuNCC->ten ?? '---',
                    'xuat_xu' => $item->loNguyenLieu->nguyenLieuNCC->xuat_xu ?? '---',
                    'phan_tram' => $tong > 0 ? round(($item->so_luong / $tong) * 100, 2) : 0
                ];
            });
        }

        // ✅ Lấy đánh giá sản phẩm
        $danhGias = DanhGia::where('id_san_pham', $id)
            ->with('khachHang.user') // để lấy tên người dùng
            ->latest()
            ->get();

        // ✅ Tính trung bình sao và tổng lượt
        $soSaoTB = round($danhGias->avg('so_sao'), 1);
        $tongDanhGia = $danhGias->count();

        return view('home.show', compact('sanPham', 'sizes', 'thanhPhan', 'danhGias', 'soSaoTB', 'tongDanhGia'));
    }


    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thêm vào giỏ hàng.');
        }

        $request->validate([
            'id_chi_tiet_san_pham' => 'required|exists:chi_tiet_san_pham,id',
            'so_luong' => 'required|integer|min:1',
        ]);

        $chiTiet = \App\Models\ChiTietSanPham::with('sanPham')->findOrFail($request->id_chi_tiet_san_pham);

        if ($chiTiet->so_luong <= 0) {
            return back()->with('error', 'Sản phẩm đã hết hàng.');
        }

        // Lấy giỏ hàng hiện tại
        $cart = session()->get('cart', []);
        $key = $request->id_chi_tiet_san_pham;

        // Tính tổng số lượng dự kiến
        $soLuongTrongGio = $cart[$key]['so_luong'] ?? 0;
        $tongSoLuong = $soLuongTrongGio + $request->so_luong;

        if ($tongSoLuong > $chiTiet->so_luong) {
            return back()->with('error', 'Không thể thêm quá số lượng còn lại trong kho.');
        }

        // Cập nhật session giỏ hàng
        $cart[$key] = [
            'ten' => $chiTiet->sanPham->ten,
            'kich_co' => $chiTiet->kich_co,
            'mau_sac' => $chiTiet->mau_sac,
            'gia' => $chiTiet->sanPham->gia - $chiTiet->sanPham->giamgia,
            'so_luong' => $tongSoLuong
        ];

        session()->put('cart', $cart);

        return back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function cart()
    {
        $cart = session('cart', []);
        return view('home.cart', compact('cart'));
    }


    public function checkout()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        return view('home.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng.');
        }

        $request->validate([
            'ten_nguoi_nhan' => 'required|string|max:255',
            'dia_chi_nhan' => 'required|string|max:500',
            'sdt' => 'required|string|max:500',

        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Giỏ hàng trống.');
        }

        $tongTien = 0;

        foreach ($cart as $idChiTiet => $item) {
            $tongTien += $item['gia'] * $item['so_luong'];
        }

        // Tạo đơn hàng
        $donHang = DonHang::create([
            'ma' => strtoupper(Str::random(8)),
            'id_khach_hang' => Auth::user()->khachHang->id,
            'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
            'dia_chi_nhan' => $request->dia_chi_nhan,
            'sdt' => $request->sdt,
            'ngay_dat' => Carbon::now(),
            'tong_tien' => $tongTien,
            'trang_thai' => 'Chờ duyệt',
            'thanh_toan' => $request->thanh_toan,
        ]);

        // Lưu chi tiết đơn hàng
        foreach ($cart as $idChiTiet => $item) {
            ChiTietDonHang::create([
                'id_don_hang' => $donHang->id,
                'id_chi_tiet_san_pham' => $idChiTiet,
                'so_luong' => $item['so_luong'],
                'gia' => $item['gia'],
            ]);

            // Trừ tồn kho
            $chiTiet = ChiTietSanPham::find($idChiTiet);
            $chiTiet->so_luong -= $item['so_luong'];
            $chiTiet->save();
        }

        // Xóa giỏ hàng
        session()->forget('cart');

        return redirect()->route('home.index')->with('success', 'Đặt hàng thành công!');
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'action' => 'required|in:plus,minus'
        ]);

        $cart = session('cart', []);
        $id = $request->id;

        if (!isset($cart[$id])) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $chiTiet = \App\Models\ChiTietSanPham::with('sanPham')->find($id);
        if (!$chiTiet) {
            return response()->json(['error' => 'Không tìm thấy chi tiết sản phẩm'], 404);
        }

        $hienTai = $cart[$id]['so_luong'];

        if ($request->action == 'plus') {
            if ($hienTai < $chiTiet->so_luong) {
                $cart[$id]['so_luong'] += 1;
            } else {
                return response()->json(['error' => 'Trong kho không đủ hàng'], 400);
            }
        } elseif ($request->action == 'minus') {
            $cart[$id]['so_luong'] -= 1;
            if ($cart[$id]['so_luong'] <= 0) {
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }


    public function removeItem(Request $request)
    {
        $request->validate(['id' => 'required']);
        $cart = session('cart', []);
        unset($cart[$request->id]);
        session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }


    public function history()
    {
        $khachHangId = Auth::user()->khachHang->id;

        $danhGiaIds = DanhGia::where('id_khach_hang', $khachHangId)
            ->pluck('id_san_pham')
            ->toArray();

        $donHangs = DonHang::with(['chiTietDonHangs.chiTietSanPham.sanPham'])
            ->withCount('chiTietDonHangs') // ✅ thêm dòng này
            ->where('id_khach_hang', $khachHangId)
            ->orderByDesc('ngay_dat')
            ->get();

        return view('home.orderhistory', compact('donHangs', 'danhGiaIds'));
    }

    public function detail($id)
    {
        $khachHangId = Auth::user()->khachHang->id;

        $donHang = DonHang::with([
            'chiTietDonHangs.chiTietSanPham.sanPham',
            'donGiaoHangs.congTyGiaoHang',
            'donGiaoHangs.phanCongs.nhanVienGiaoHang.user',
            'donGiaoHangs.loTrinhs'
        ])
            ->where('id_khach_hang', $khachHangId)
            ->findOrFail($id);

        // Gắn trạng thái đã đánh giá vào từng sản phẩm
        foreach ($donHang->chiTietDonHangs as $ct) {
            $spId = $ct->chiTietSanPham->id_san_pham;
            $ct->da_danh_gia = \App\Models\DanhGia::where('id_khach_hang', $khachHangId)
                ->where('id_san_pham', $spId)
                ->exists();
        }

        return view('home.orderdetail', compact('donHang'));
    }

    public function xemTheoDanhMuc($id)
    {
        $danhMuc = DanhMuc::findOrFail($id);
        // Lấy danh sách danh mục
        $danhMucs = DanhMuc::all();
        // Map danh mục với icon phù hợp
        $danhMucs = $danhMucs->map(function ($dm) {
            $dm->icon = $this->getCategoryIcon($dm->ten);
            return $dm;
        });
        $sanPhams = SanPham::where('id_danh_muc', $id)
            ->withAvg('danhGias as sao_tb', 'so_sao')->where('trang_thai', 1)->latest()
            ->paginate(8); // mỗi trang 8 sản phẩm

        return view('home.danhmuc', compact('danhMucs', 'danhMuc', 'sanPhams'));
    }

    public function danhGiaSanPham(Request $request)
    {
        $request->validate([
            'id_don_hang' => 'required|exists:don_hang,id',
            'id_san_pham' => 'required|exists:san_pham,id',
            'so_sao' => 'required|integer|min:1|max:5',
            'noi_dung' => 'nullable|string|max:1000',
        ]);


        $khachHang = Auth::user()->khachHang;

        $donHang = DonHang::where('id', $request->id_don_hang)
            ->where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 'Hoàn thành')
            ->first();

        if (!$donHang) {
            return back()->with('error', 'Đơn hàng không hợp lệ hoặc chưa hoàn thành.');
        }

        $sanPhamTonTai = ChiTietDonHang::join('chi_tiet_san_pham', 'chi_tiet_don_hang.id_chi_tiet_san_pham', '=', 'chi_tiet_san_pham.id')
            ->where('chi_tiet_don_hang.id_don_hang', $donHang->id)
            ->where('chi_tiet_san_pham.id_san_pham', $request->id_san_pham)
            ->exists();

        if (!$sanPhamTonTai) {
            return back()->with('error', 'Sản phẩm không tồn tại trong đơn hàng.');
        }

        $daDanhGia = DanhGia::where('id_khach_hang', $khachHang->id)
            ->where('id_san_pham', $request->id_san_pham)
            ->exists();

        if ($daDanhGia) {
            return back()->with('error', 'Bạn đã đánh giá sản phẩm này rồi.');
        }

        DanhGia::create([
            'id_khach_hang' => $khachHang->id,
            'id_san_pham' => $request->id_san_pham,
            'so_sao' => $request->so_sao,
            'noi_dung' => $request->noi_dung,
        ]);

        return back()->with('success', 'Đánh giá đã được ghi nhận!');
    }



    public function huyDon($id)
    {
        $donHang = DonHang::with('chiTietDonHangs.chiTietSanPham')
            ->where('id_khach_hang', Auth::user()->khachHang->id)
            ->where('trang_thai', '!=', 'Đã duyệt')
            ->where('trang_thai', '!=', 'Hoàn thành')
            ->where('trang_thai', '!=', 'Hủy')
            ->findOrFail($id);

        try {
            DB::beginTransaction();

            // Trả lại tồn kho cho từng chi tiết sản phẩm
            foreach ($donHang->chiTietDonHangs as $ct) {
                $ctsp = $ct->chiTietSanPham;
                if ($ctsp) {
                    $ctsp->increment('so_luong', $ct->so_luong);
                }
            }

            // Cập nhật trạng thái đơn
            $donHang->update(['trang_thai' => 'Hủy']);

            DB::commit();
            return back()->with('success', 'Đã hủy đơn hàng và trả lại kho.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Hủy đơn hàng thất bại.');
        }
    }
}
