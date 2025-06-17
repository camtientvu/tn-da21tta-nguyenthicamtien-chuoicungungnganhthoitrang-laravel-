@include('home.header')

<style>
    /* Font import */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap");

    .product-detail {
        background: #fff0f5;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
    }

    .product-detail>.col-md-6 {
        flex: 1 1 48%;
        max-width: 48%;
    }

    .main-img {
        width: 100%;
        height: 300pt;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .thumbs {
        margin-top: 10px;
    }

    .thumbs img {
        width: 50px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.2s ease;
    }

    .thumbs img.active,
    .thumbs img:hover {
        border-color: #e91e63;
    }

    .product-name {
        font-size: 2rem;
        color: #c2185b;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .price {
        font-size: 1.5rem;
        color: #e53935;
        margin-bottom: 1rem;
    }

    .price small {
        font-size: 1rem;
        color: #888;
        margin-left: 0.5rem;
    }

    .form-label {
        font-weight: 500;
        color: #555;
    }

    #quantity {
        max-width: 100px;
    }

    .add-to-cart {
        background-color: #e91e63;
        color: white;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        transition: background-color 0.2s ease;
    }

    .add-to-cart:hover {
        background-color: #c2185b;
    }

    .description {
        background: #ffffff;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .description h4 {
        color: #c2185b;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .description ul {
        padding-left: 20px;
    }

    .description img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .product-detail {
            flex-direction: column;
            padding: 1.5rem;
        }

        .product-detail>.col-md-6 {
            max-width: 100%;
        }

        .main-img {
            height: 240pt;
        }

        .product-name {
            font-size: 1.5rem;
        }

        .price {
            font-size: 1.2rem;
        }

        .description {
            padding: 1.5rem;
        }
    }
</style>

<canvas id="seasonCanvas"></canvas>

<div class="content">

    <div class="container border-top border-bottom border-secondary">

        <main class="flex-grow-1">
            <section class="product-section px-4 py-3">
                <div class="container my-5">
                    <div class="product-detail">
                        <!-- Hình ảnh -->
                        <div class="col-md-6">
                            @php
                            $mainImage = $sanPham->hinhAnhSanPhams->first();
                            @endphp
                            <img id="mainImage" src="{{ $mainImage ? asset('storage/' . $mainImage->duong_dan_hinh) : asset('images/default.jpg') }}" class="main-img mb-3" />

                            <div class="thumbs d-flex">
                                @foreach ($sanPham->hinhAnhSanPhams as $index => $hinh)
                                <img src="{{ asset('storage/' . $hinh->duong_dan_hinh) }}" class="{{ $index === 0 ? 'active' : '' }}" onclick="changeImage(this)">
                                @endforeach
                            </div>
                        </div>

                        <!-- Thông tin sản phẩm -->
                        <div class="col-md-6 d-flex flex-column justify-content-between">
                            <div>
                                <div class="product-name">{{ $sanPham->ten }}</div>
                                <div class="text" style="text-align: justify;">{{ $sanPham->mo_ta }}</div>

                                @if ($thanhPhan->isNotEmpty())
                                <h5>🔬 Thành phần nguyên liệu (sản xuất mới nhất)</h5>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nguyên liệu</th>
                                            <th>Xuất xứ</th>
                                            <th>Tỷ lệ (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($thanhPhan as $tp)
                                        <tr>
                                            <td>{{ $tp['ten'] }}</td>
                                            <td>{{ $tp['xuat_xu'] }}</td>
                                            <td>{{ $tp['phan_tram'] }}%</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <p><em>Không có dữ liệu đơn sản xuất hoàn thành.</em></p>
                                @endif

                                <div class="price">
                                    {{ number_format($sanPham->gia - $sanPham->giamgia, 0, ',', '.') }} đ
                                    @if($sanPham->giamgia > 0)
                                    <small class="text-decoration-line-through">{{ number_format($sanPham->gia, 0, ',', '.') }} đ</small>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="size" class="form-label">Chọn Size</label>
                                    <form method="POST" action="{{ route('cart.add') }}">
                                        @csrf
                                        <select class="form-select" id="size" name="id_chi_tiet_san_pham">
                                            @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}"> "Màu: {{$size->mau_sac}} - size: {{ $size->kich_co }}(còn lại: {{ $size->so_luong }}) sản phẩm"</span></option>
                                            @endforeach
                                        </select>
                                </div>


                                <div class="mb-3">


                                    <label for="quantity" class="form-label">Số lượng đặt: </label>
                                    <input type="number" id="quantity" class="form-control" value="1" min="1">
                                </div>
                            </div>

                            <div>





                                <input type="hidden" name="so_luong" id="hiddenQuantity" value="1">

                                <button type="submit" class="btn btn-danger mt-3" onclick="syncQuantity()">🛒 Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            <script>
                                function syncQuantity() {
                                    const q = document.getElementById('quantity').value;
                                    document.getElementById('hiddenQuantity').value = q;
                                }
                            </script>





                        </div>
                    </div>


                </div>


                <div class="rating-section mt-5">
                    <div class="bg-white rounded-4 shadow-sm p-4">
                        <h4 class="mb-4 text-danger-emphasis">Đánh giá</h4>

                        <!-- Sao trung bình -->
                        <!-- ⭐ Sao trung bình -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="star-display text-warning me-3 fs-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <=$soSaoTB)
                                    ★
                                    @elseif ($i - $soSaoTB < 1)
                                    ☆
                                    @else
                                    ☆
                                    @endif
                                    @endfor
                                    </div>
                                    <div class="fs-6 text-muted">
                                        {{ $soSaoTB }}/5 từ {{ $tongDanhGia }} đánh giá
                                    </div>
                            </div>


                            <!-- Danh sách bình luận -->
                            @forelse ($danhGias as $dg)
                            <div class="review border-top pt-3 mt-3">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $dg->khachHang->user->ten ?? 'Ẩn danh' }}</strong>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($dg->created_at)->format('d/m/Y') }}</small>
                                </div>
                                <div class="star-display text-warning mb-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$dg->so_sao)
                                        ★
                                        @else
                                        ☆
                                        @endif
                                        @endfor
                                </div>
                                @if ($dg->noi_dung)
                                <p>{{ $dg->noi_dung }}</p>
                                @endif
                            </div>
                            @empty
                            <p class="text-muted">Chưa có đánh giá nào cho sản phẩm này.</p>
                            @endforelse



                        </div>
                    </div>

                    <script>
                        function changeImage(el) {
                            const main = document.getElementById('mainImage');
                            main.src = el.src;
                            document.querySelectorAll('.thumbs img').forEach(img => img.classList.remove('active'));
                            el.classList.add('active');
                        }
                    </script>
            </section>
        </main>
    </div>
</div>

@include('home.footer')