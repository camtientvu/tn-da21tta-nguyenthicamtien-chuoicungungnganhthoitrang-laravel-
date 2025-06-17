<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fashion Supply Chain Management</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        #seasonCanvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            /* nền sau cùng */
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            /* không chặn click */
        }
    </style>
</head>

<body>
    <!-- Top Bar -->
    <div class="py-3">
        <div class="top-bar row align-items-center gx-3">
            <!-- Cột trái: Logo + Menu -->
            <div class="col-md-4 d-flex flex-wrap align-items-center gap-3">
                <h4 class="brand-title m-0 text-danger">Fashion SCM</h4>

                <a href="{{ route('home.index') }}" class="top-link">Trang chủ</a>
                <a href="{{route('home.cuahang')}}" class="top-link">Cửa hàng</a>
            </div>

            <!-- Cột tìm kiếm -->
            <div class="col-md-4">
                <div class="search-box">
                    <form action="{{ route('home.timkiem') }}" method="GET" class="d-flex">
                        <input type="text" name="q" class="form-control" placeholder="Tìm kiếm sản phẩm..." required>
                        <button class="btn btn-primary ms-2"><i class="fas fa-search"></i></button>
                    </form>

                </div>
            </div>

            <div
                class="col-md-4 d-flex justify-content-end align-items-center gap-3 mt-3 mt-md-0 text-nowrap">

                <div class="cart-box">
                    @php $cart = session('cart', []); $tongSoLuong = collect($cart)->sum('so_luong'); @endphp


                    <a class="top-link" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart me-1"></i>{{ $tongSoLuong }} sản phẩm </a>


                </div>
                @auth
                <div class="dropdown">
                    <a class="btn  dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i> {{ Auth::user()->ten }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{route('profile.show')}}"><i class="fas fa-user"></i>Thông tin tài khoản</a></li>
                        <li><a class="dropdown-item" href="{{route('lichsu.donhang')}}"><i class="fas fa-history me-2"></i>Lịch sử đơn hàng</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất</a></li>

                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="top-link">Đăng nhập</a>
                @endauth

            </div>
        </div>
    </div>