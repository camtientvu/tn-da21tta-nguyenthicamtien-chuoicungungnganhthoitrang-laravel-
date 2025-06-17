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



            <div class="product-container mb-4">
                <h2 class="section-title">Danh mục: {{ $danhMuc->ten }}</h2>
                <div class="row">
                    @forelse ($sanPhams as $sp)
                    <div class="col-md-3 mb-4">
                        <div class="product-card">
                            <div class="product-badge">
                                <span class="new">Mới</span>
                            </div>
                            <div class="product-name">{{ $sp->ten }}</div>
                            @if ($sp->hinhAnhSanPhams->isNotEmpty())
                            <img src="{{ asset('storage/'.$sp->hinhAnhSanPhams[0]->duong_dan_hinh) }}" alt="{{ $sp->ten }}">
                            @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Ảnh mặc định">
                            @endif
                            <div class="product-price">
                                <span class="current-price">{{ number_format($sp->gia - $sp->giamgia, 0, ',', '.') }} đ</span>
                                @if ($sp->giamgia > 0)
                                <span class="old-price">{{ number_format($sp->gia, 0, ',', '.') }} đ</span>
                                @endif
                            </div>
                            @php
                            $sao = round($sp->sao_tb ?? 5); // nếu chưa có đánh giá thì mặc định 5 sao
                            @endphp
                            <div class="product-rating text-warning">
                                {!! str_repeat('★', $sao) . str_repeat('☆', 5 - $sao) !!}
                                ({{ number_format($sp->sao_tb ?? 5, 1) }})
                            </div>

                            <div class="product-stock in-stock">Còn hàng</div>
                            <div class="view-icon">
                                <a style="text-decoration: none; color:antiquewhite" href="{{ route('home.show', ['id' => $sp->id]) }}">
                                    <i class="fas fa-eye"></i> Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Không có sản phẩm nào.</p>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $sanPhams->links() }}
                </div>
            </div>
            <style>
                .product-wrapper {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                }

                .product-card {
                    flex: 0 0 calc(25% - 20px);
                    /* 4 sản phẩm mỗi dòng */
                    box-sizing: border-box;
                }

                /* Đảm bảo lưới đẹp */
                .product-wrapper {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                }

                /* Card chiều cao bằng nhau */
                .product-card {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    height: 100%;
                    /* nếu dùng grid/flex */
                    min-height: 420px;
                    /* tùy bạn chỉnh */
                    padding: 16px;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    box-sizing: border-box;
                    background: #fff;
                }

                /* Giới hạn chiều cao ảnh + auto resize */
                .product-card img {
                    max-height: 180px;
                    object-fit: contain;
                    width: 100%;
                }

                /* Tên sản phẩm: cắt xuống dòng, không làm bể layout */
                .product-name {
                    font-weight: bold;
                    margin: 10px 0;
                    min-height: 48px;
                    /* để giữ cao cố định cho 2 dòng */
                    line-height: 1.2;
                    overflow: hidden;
                }

                /* Giá sản phẩm và các phần còn lại */
                .product-price,
                .product-rating,
                .product-stock,
                .view-icon {
                    margin-top: 10px;
                }
            </style>


            </section>
        </main>
    </div>
</div>
@include('home.footer')