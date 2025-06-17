@include('home.header')
<canvas id="seasonCanvas"></canvas>
<div class="content">
    <div class="container d-flex border-top border-bottom border-secondary">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-title px-3 py-2">DANH MỤC SẢN PHẨM</div>
            <nav>
                @foreach ($danhMucs as $dm)
                <a href="{{ route('home.danhmuc', $dm->id) }}" class="sidebar-link">

                    <span> <i class="fas {{ $dm->icon }} sidebar-icon"></i> {{ $dm->ten }} </span>
                    <i class="fas fa-chevron-right"></i>
                </a>
                @endforeach
            </nav>
        </aside>


        <!-- Main Content -->
        <main class="flex-grow-1">
            <div class="info-bar d-flex flex-wrap gap-3 px-3 py-2 border-bottom">
                <div><i class="fas fa-phone-alt me-1"></i>Hotline: 1800 1162</div>
                <div><i class="fas fa-sync-alt me-1"></i>Đổi trả miễn phí 90 ngày</div>
                <div><i class="fas fa-truck me-1"></i>Giao hàng miễn phí</div>
                <div><i class="fas fa-credit-card me-1"></i>Thanh toán khi nhận hàng</div>
            </div>

            <!-- Carousel -->
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/anh1.jpg" class="d-block w-100" alt="Banner 1" />
                    </div>
                    <div class="carousel-item">
                        <img src="images/anh2.jpg" class="d-block w-100" alt="Banner 2" />
                    </div>
                    <div class="carousel-item">
                        <img src="images/anh3.jpg" class="d-block w-100" alt="Banner 3" />
                    </div>
                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#bannerCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#bannerCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>



            <!-- Section: Giày cao gót -->
            <section class="product-section px-4 py-3">


                {{-- SẢN PHẨM BÁN CHẠY --}}
                @include('home.product-section', [
                'title' => '🔥 Sản phẩm bán chạy',
                'sanPhams' => $sanPhamBanChay
                ])

                {{-- SẢN PHẨM MỚI --}}
                @include('home.product-section', [
                'title' => 'Sản phẩm mới',
                'sanPhams' => $sanPhams
                ])

                {{-- SẢN PHẨM DANH MỤC 1 --}}
                @if ($danhMuc1)
                @include('home.product-section', [
                'title' => ucwords($danhMuc1->ten),
                'sanPhams' => $sanPhamsDanhMuc1
                ])
                @endif

                {{-- SẢN PHẨM DANH MỤC 2 --}}
                @if ($danhMuc2)
                @include('home.product-section', [
                'title' => ucwords($danhMuc2->ten),
                'sanPhams' => $sanPhamsDanhMuc2
                ])
                @endif




            </section>
        </main>
    </div>
</div>
@include('home.footer')