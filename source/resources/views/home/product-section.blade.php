<div class="product-container mb-4">
    <h2 class="section-title">{{ $title }}</h2>
    <div class="product-wrapper">
        @foreach ($sanPhams as $sp)
        <div class="product-card">
            <div class="product-badge">
                <span class="new">Mới</span>
            </div>
@php
    $soLuongTon = $sp->chiTietSanPhams->sum('so_luong');
@endphp

            <div class="product-name">{{ $sp->ten }}</div>

            {{-- Hiển thị ảnh đầu tiên nếu có --}}
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
            $sao = round($sp->sao_tb ?? 0);
            @endphp

            @if($sp->sao_tb && $sp->sao_tb > 0)
            <div class="product-rating text-warning">
                {!! str_repeat('★', $sao) . str_repeat('☆', 5 - $sao) !!}
                ({{ number_format($sp->sao_tb, 1) }})
            </div>
            @endif


           @if($soLuongTon > 0)
    <div class="product-stock in-stock">Còn hàng</div>
@else
    <div class="product-stock out-of-stock text-danger">Hết hàng</div>
@endif

           <div class="view-icon">
    @if($soLuongTon > 0)
    <a style="text-decoration: none; color:antiquewhite" href="{{ route('home.show', ['id' => $sp->id]) }}">
        <i class="fas fa-eye"></i> Xem chi tiết
    </a>
    @else
    <span class="text-secondary"><i class="fas fa-eye-slash"></i> Hết hàng</span>
    @endif
</div>

        </div>
        @endforeach
    </div>
</div>