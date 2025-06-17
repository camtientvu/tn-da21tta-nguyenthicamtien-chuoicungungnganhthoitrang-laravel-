<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CongTy\NguyenLieu\NguyenLieuController;
use App\Http\Controllers\Admin\MainController;

use App\Http\Controllers\Admin\User\LoginController;

use App\Http\Controllers\CongTy\NguyenLieu\DonNhapNguyenLieuController;
use App\Http\Controllers\CongTy\DanhMuc\DanhMucController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\CongTy\CongTyGiaoHang\CongTyGiaoHangController;
use Illuminate\Http\Request;
use App\Http\Controllers\CongTy\NhaCungCap\NhaCungCapController;
use App\Http\Controllers\CongTy\User\UserController;
use App\Http\Controllers\CongTy\SanPham\SanPhamController;
use App\Http\Controllers\CongTy\SanPham\ChiTietSanPhamController;
use App\Http\Controllers\CongTy\SanPham\HinhAnhSanPhamController;
use App\Http\Controllers\CongTy\SanXuat\DonSanXuatController;
use App\Http\Controllers\CongTy\SanXuat\ChiTietDonSanXuatController;
use App\Http\Controllers\CongTy\SanXuat\NguyenLieuDonSanXuatController;
use App\Http\Controllers\CongTy\DonHang\DonHangController;
use App\Http\Controllers\GiaoHang\GiaoHangController;
use App\Http\Controllers\NhaCungCap\CungCapController;
use App\Http\Controllers\NhaCungCap\DonNhapController;
use App\Http\Controllers\NhaCungCap\BaoCaoController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\CongTy\ThongKeController;
use App\Http\Controllers\Home\CuaHangController;
use App\Http\Controllers\Home\ThongTinCaNhanController;

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home.index');
Route::get('san-pham/{id}', [HomeController::class, 'show'])->name('home.show');
Route::post('/them-vao-gio', [HomeController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/update', [HomeController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/remove', [HomeController::class, 'removeItem'])->name('cart.remove');


// Login chung
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// Form đăng ký
Route::get('dang-ky', [\App\Http\Controllers\Admin\User\RegisterController::class, 'showForm'])->name('register');

// Xử lý đăng ký
Route::post('dang-ky', [\App\Http\Controllers\Admin\User\RegisterController::class, 'register'])->name('register.store');

Route::get('/danh-muc/{id}', [HomeController::class, 'xemTheoDanhMuc'])->name('home.danhmuc');
Route::get('/quen-mat-khau', [ThongTinCaNhanController::class, 'quenMatKhau'])->name('password.forgot');
Route::post('/quen-mat-khau', [ThongTinCaNhanController::class, 'xuLyQuenMatKhau'])->name('password.forgot.submit');

Route::get('/cua-hang', [CuaHangController::class, 'index'])->name('home.cuahang');
Route::get('/tim-kiem', [CuaHangController::class, 'timKiem'])->name('home.timkiem');
Route::middleware(['auth', 'khachhang'])->group(function () {

    Route::get('/gio-hang', [HomeController::class, 'cart'])->name('cart.index');
    Route::get('/thanh-toan', [HomeController::class, 'checkout'])->name('checkout');
    Route::post('/thanh-toan', [HomeController::class, 'placeOrder'])->name('checkout.place');


    Route::get('/lich-su-don-hang', [HomeController::class, 'history'])->name('lichsu.donhang');
    Route::post('/danh-gia-binh-luan', [HomeController::class, 'danhGiaSanPham'])->name('danhgia.sanpham');

    Route::get('/thong-tin-ca-nhan', [ThongTinCaNhanController::class, 'show'])->name('profile.show');
    Route::post('/thong-tin-ca-nhan', [ThongTinCaNhanController::class, 'updateThongTin'])->name('profile.update');
    Route::post('/doi-mat-khau', [ThongTinCaNhanController::class, 'updateMatKhau'])->name('profile.password');
    Route::post('/don-hang/{id}/huy', [HomeController::class, 'huyDon'])->name('home.huydon');

    Route::get('/lich-su-don-hang/{id}', [HomeController::class, 'detail'])->name('lichsu.donhang.chitiet');
});


Route::middleware(['auth', 'nhanviencongty'])->prefix('congty')->name('congty.')->group(function () {
    // Trang chính của công ty
    Route::get('/', [ThongKeController::class, 'index'])->name('home.index');
    Route::get('/thong-ke', [ThongKeController::class, 'index'])->name('thongke.index');
    Route::get('/thongke/ton-kho-chi-tiet', [ThongKeController::class, 'chiTietTonKho'])->name('thongke.tonkho_chitiet');

    // Quản lý người dùng
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::post('/delete', [UserController::class, 'destroy'])->name('user.destroy');




        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/update-role/{id}', [UserController::class, 'updateRole'])->name('user.updateRole');
    });





    // Quản lý nhà cung cấp
    Route::prefix('nhacungcap')->name('nhacungcap.')->group(function () {
        Route::get('/', [NhaCungCapController::class, 'index'])->name('index');
        Route::get('/create', [NhaCungCapController::class, 'create'])->name('create');
        Route::post('/store', [NhaCungCapController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [NhaCungCapController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [NhaCungCapController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [NhaCungCapController::class, 'destroy'])->name('destroy');
    });



    Route::prefix('congtygiaohang')->name('congtygiaohang.')->group(function () {
        Route::get('/', [CongTyGiaoHangController::class, 'index'])->name('index');
        Route::get('/create', [CongTyGiaoHangController::class, 'create'])->name('create');
        Route::post('/store', [CongTyGiaoHangController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CongTyGiaoHangController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [CongTyGiaoHangController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [CongTyGiaoHangController::class, 'destroy'])->name('destroy');
    });




    Route::prefix('danhmuc')->name('danhmuc.')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('index');
        Route::get('/create', [DanhMucController::class, 'create'])->name('create');
        Route::post('/store', [DanhMucController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DanhMucController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [DanhMucController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DanhMucController::class, 'destroy'])->name('destroy');
    });







    Route::prefix('sanpham')->name('sanpham.')->group(function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('index');
        Route::get('/create', [SanPhamController::class, 'create'])->name('create');
        Route::post('/store', [SanPhamController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SanPhamController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SanPhamController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SanPhamController::class, 'destroy'])->name('destroy');
        Route::get('/sanpham/{id}/show', [SanPhamController::class, 'show'])->name('show');



        Route::get('/{id}/chitiet/create', [ChiTietSanPhamController::class, 'create'])->name('chitiet.create');
        Route::post('/{id}/chitiet/store', [ChiTietSanPhamController::class, 'store'])->name('chitiet.store');
        Route::get('/chitiet/{id}/edit', [ChiTietSanPhamController::class, 'edit'])->name('chitiet.edit');
        Route::put('/chitiet/{id}', [ChiTietSanPhamController::class, 'update'])->name('chitiet.update');
        Route::delete('/chitiet/{id}', [ChiTietSanPhamController::class, 'destroy'])->name('chitiet.destroy');

        Route::get('/{id}/hinhanh/create', [HinhAnhSanPhamController::class, 'create'])->name('hinhanh.create');
        Route::post('/{id}/hinhanh/store', [HinhAnhSanPhamController::class, 'store'])->name('hinhanh.store');
        Route::delete('/hinhanh/{id}', [HinhAnhSanPhamController::class, 'destroy'])->name('hinhanh.destroy');
    });




    Route::prefix('donnhap')->name('donnhap.')->group(function () {
        Route::get('/', [DonNhapNguyenLieuController::class, 'index'])->name('index');
        Route::get('/create', [DonNhapNguyenLieuController::class, 'create'])->name('create');
        Route::post('/store', [DonNhapNguyenLieuController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DonNhapNguyenLieuController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [DonNhapNguyenLieuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DonNhapNguyenLieuController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/show', [DonNhapNguyenLieuController::class, 'show'])->name('show');

        Route::get('/{id}/export-pdf', [DonNhapNguyenLieuController::class, 'exportPdf'])->name('exportPdf');

        Route::post('/{id}/chitiet', [DonNhapNguyenLieuController::class, 'storeChiTiet'])->name('chitiet.store');
        Route::delete('/chitiet/{id}', [DonNhapNguyenLieuController::class, 'destroyChiTiet'])->name('chitiet.destroy');
    });






    Route::prefix('don-san-xuat')->name('don-san-xuat.')->group(function () {
        Route::get('/', [DonSanXuatController::class, 'index'])->name('index');
        Route::get('/create', [DonSanXuatController::class, 'create'])->name('create');
        Route::post('/store', [DonSanXuatController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DonSanXuatController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [DonSanXuatController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DonSanXuatController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/show', [DonSanXuatController::class, 'show'])->name('show');

        // Hiển thị form thêm chi tiết sản xuất
        Route::get('/{id}/them-san-pham', [ChiTietDonSanXuatController::class, 'create'])->name('chitiet.create');
        // Xử lý lưu chi tiết sản xuất
        Route::post('/{id}/them-san-pham', [ChiTietDonSanXuatController::class, 'store'])->name('chitiet.store');
        //  Xóa chi tiết sản xuất
        Route::delete('/{id}/xoa-chi-tiet/{chitiet_id}', [ChiTietDonSanXuatController::class, 'destroy'])->name('chitiet.destroy');
        // nguyên liệu sản xuất
        Route::get('{id}/nguyen-lieu/create', [NguyenLieuDonSanXuatController::class, 'create'])->name('nguyenlieu.create');
        Route::post('{id}/nguyen-lieu/store', [NguyenLieuDonSanXuatController::class, 'store'])->name('nguyenlieu.store');
        Route::delete('nguyen-lieu/{id}', [NguyenLieuDonSanXuatController::class, 'destroy'])->name('nguyenlieu.destroy');
    });

    Route::prefix('donhang')->name('donhang.')->group(function () {
        Route::get('/', [DonHangController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [DonHangController::class, 'edit'])->name('edit');
        Route::get('/{id}/huy', [DonHangController::class, 'huyDon'])->name('huy');
        Route::put('/{id}', [DonHangController::class, 'update'])->name('update');

        Route::get('/{id}', [DonHangController::class, 'show'])->name('show');

        Route::get('/{id}/pdf', [DonHangController::class, 'exportPDF'])
            ->name('exportPDF');
    });
});


// Nhân viên nhà cung cấp
Route::middleware(['auth', 'nhanviennhacungcap'])->prefix('nhacungcap')->name('nhacungcap.')->group(function () {
    Route::get('/', [BaoCaoController::class, 'index'])->name('home.index');

    Route::get('/bao-cao', [BaoCaoController::class, 'index'])->name('baocao.index');
    Route::post('/bao-cao/filter', [BaoCaoController::class, 'filter'])->name('baocao.filter');
    Route::get('/bao-cao/pdf', [BaoCaoController::class, 'exportPDF'])->name('baocao.export.pdf');




    Route::get('/nguoidung', [CungCapController::class, 'nhanvien'])->name('nguoidung.index');
    Route::get('/nguoidung/{id}/edit', [CungCapController::class, 'edit'])->name('nguoidung.edit');
    Route::put('/nguoidung/{id}/edit', [CungCapController::class, 'update'])->name('nguoidung.update');
    Route::delete('nguoidung/{id}', [CungCapController::class, 'destroy'])->name('nguoidung.destroy');


    Route::prefix('donnhap')->middleware('auth')->group(function () {
        Route::get('/', [DonNhapController::class, 'index'])->name('donnhap.index');
        Route::put('/{id}/trangthai', [DonNhapController::class, 'updateTrangThai'])->name('donnhap.trangthai');
        Route::delete('/{id}', [DonNhapController::class, 'destroy'])->name('donnhap.destroy');
    });



    Route::prefix('nguyenlieu')->name('nguyenlieu.')->group(function () {
        Route::get('/', [NguyenLieuController::class, 'index'])->name('index');
        Route::get('/create', [NguyenLieuController::class, 'create'])->name('create');
        Route::post('/store', [NguyenLieuController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [NguyenLieuController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [NguyenLieuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [NguyenLieuController::class, 'destroy'])->name('destroy');
    });
});

// Nhân viên giao hàng
Route::middleware(['auth', 'nhanviengiaohang'])->prefix('giaohang')->name('giaohang.')->group(function () {
    Route::get('/', [\App\Http\Controllers\GiaoHang\BaoCaoController::class, 'index'])->name('home.index');

    // Báo cáo giao hàng
    Route::prefix('baocao')->name('baocao.')->group(function () {
        Route::get('/', [\App\Http\Controllers\GiaoHang\BaoCaoController::class, 'index'])->name('index');
        Route::post('/filter', [\App\Http\Controllers\GiaoHang\BaoCaoController::class, 'filter'])->name('filter');
        Route::get('/pdf', [\App\Http\Controllers\GiaoHang\BaoCaoController::class, 'exportPDF'])->name('export.pdf');
        Route::get('/excel', [\App\Http\Controllers\GiaoHang\BaoCaoController::class, 'exportExcel'])->name('export.excel');
    });


    Route::get('/nguoidung', [GiaoHangController::class, 'nhanvien'])
        ->name('nguoidung.index');

    Route::get('/nguoidung/{id}/edit', [GiaoHangController::class, 'edit'])->name('nguoidung.edit');
    Route::put('/nguoidung/{id}', [GiaoHangController::class, 'update'])->name('nguoidung.update');
    Route::delete('/nguoidung/{id}', [GiaoHangController::class, 'destroy'])->name('nguoidung.destroy');



    Route::get('/giaohang/donhang', [GiaoHangController::class, 'danhSachDonGiao'])->name('donhang.index');
    Route::prefix('giaohang/phancong')->name('phancong.')->group(function () {
        Route::get('/{idDonGiaoHang}/create', [GiaoHangController::class, 'createPC'])->name('create');
        Route::post('/{idDonGiaoHang}', [GiaoHangController::class, 'storePC'])->name('store');
    });

    Route::prefix('giaohang/lotrinh')->name('lotrinh.')->group(function () {
        Route::get('/cuatoi', [GiaoHangController::class, 'loTrinhTheoNhanVien'])->name('cuatoi');
        Route::get('/{idDonGiaoHang}', [GiaoHangController::class, 'loTrinh'])->name('index');
        Route::post('/{idDonGiaoHang}', [GiaoHangController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [GiaoHangController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GiaoHangController::class, 'update'])->name('update');
        Route::delete('/{id}', [GiaoHangController::class, 'destroy'])->name('destroy');


        Route::get('/don/{id}', [GiaoHangController::class, 'xemLoTrinhTheoDon'])->name('show');
        Route::get('/them/{id}', [GiaoHangController::class, 'create'])->name('them');
        Route::post('giaohang/lotrinh/them/{id}', [GiaoHangController::class, 'luuLoTrinh'])->name('luuthem');
        // Hiển thị form chuyển
        Route::get('donhang/{id}/chuyen', [GiaoHangController::class, 'formChuyenNhanVien'])->name('chuyen');

        // Xử lý chuyển
        Route::post('donhang/{id}/chuyen', [GiaoHangController::class, 'xuLyChuyenNhanVien'])->name('chuyen.xuly');
    });
});
