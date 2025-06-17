@include('home.header')

<canvas id="seasonCanvas"></canvas>

<div class="content">
    <div class="container d-flex">
        <!-- Sidebar: Bộ lọc -->
        <aside class="sidebar p-3 border-end" style="width: 250px;">
            <h5 class="mb-3">Lọc sản phẩm</h5>
            <form method="GET" action="{{ route('home.cuahang') }}">

                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="danh_muc" class="form-label">Danh mục</label>
                    <select name="danh_muc" id="danh_muc" class="form-select">
                        <option value="">-- Tất cả --</option>
                        @foreach ($danhMucs as $dm)
                        <option value="{{ $dm->id }}" {{ request('danh_muc') == $dm->id ? 'selected' : '' }}>
                            {{ $dm->ten }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Giá -->
                <div class="mb-3">
                    <label class="form-label">Khoảng giá (VNĐ)</label>
                    <div class="d-flex gap-2">
                        <input type="number" name="gia_tu" class="form-control" placeholder="Từ" value="{{ request('gia_tu') }}">
                        <input type="number" name="gia_den" class="form-control" placeholder="Đến" value="{{ request('gia_den') }}">
                    </div>
                </div>

                <!-- Mới / Bán chạy -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="moi" id="moi" value="1" {{ request('moi') ? 'checked' : '' }}>
                    <label class="form-check-label" for="moi">Sản phẩm mới</label>
                </div>


                <button class="btn btn-primary w-100">Lọc</button>
            </form>
        </aside>

        <!-- Sản phẩm -->
        <main class="flex-grow-1 p-4">
            <h5 class="mb-4">Tất cả sản phẩm</h5>

            @if ($sanPhams->isEmpty())
            <p>Không có sản phẩm nào phù hợp.</p>
            @else
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

                        @if($sp->luot_ban)
                        <div class="product-stock in-stock"> Đã bán: {{ $sp->luot_ban }} </div> @endif
                        <div class="product-stock in-stock">Còn hàng </div>


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

            <div class="mt-4 d-flex justify-content-center">
                {{ $sanPhams->withQueryString()->links() }}
            </div>
            @endif
            <style>
                .product-card {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    background: #ffffff;
                    border-radius: 12px;
                    border: 1px solid #e0e0e0;
                    padding: 16px;
                    transition: box-shadow 0.3s ease, transform 0.3s ease;

                    min-height: 460px;
                    height: 100%;
                    box-sizing: border-box;
                }

                .product-card:hover {
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                    transform: translateY(-4px);
                }

                .product-card img {
                    max-height: 180px;
                    object-fit: contain;
                    width: 100%;
                    border-radius: 8px;
                }

                .product-name {
                    font-size: 16px;
                    font-weight: 600;
                    margin: 12px 0 4px;
                    line-height: 1.3;
                    min-height: 48px;
                    color: #222;
                }

                .product-price {
                    font-size: 16px;
                    margin-top: 10px;
                }

                .product-price .current-price {
                    color: #e53935;
                    font-weight: bold;
                }

                .product-price .old-price {
                    color: #aaa;
                    text-decoration: line-through;
                    margin-left: 8px;
                }

                .product-rating {
                    font-size: 14px;
                    color: #fbc02d;
                }

                .product-stock {
                    font-size: 13px;
                    color: #4caf50;
                }




                .sidebar h5 {
                    font-size: 18px;
                    font-weight: 600;
                    margin-bottom: 16px;
                }

                .sidebar .form-label {
                    font-size: 14px;
                    font-weight: 500;
                }

                .sidebar .form-check-label {
                    font-size: 14px;
                }

                .btn-primary {
                    font-size: 15px;
                    font-weight: 600;
                    border-radius: 6px;
                }

                .pagination {
                    margin-top: 20px;
                }

                .pagination .page-item .page-link {
                    color: #007bff;
                    border-radius: 6px;
                    margin: 0 4px;
                    padding: 6px 12px;
                    border: 1px solid #ddd;
                }

                .pagination .page-item.active .page-link {
                    background-color: #007bff;
                    border-color: #007bff;
                    color: white;
                }

                .pagination .page-item.disabled .page-link {
                    color: #aaa;
                }
            </style>

        </main>

    </div>
</div>

@include('home.footer')