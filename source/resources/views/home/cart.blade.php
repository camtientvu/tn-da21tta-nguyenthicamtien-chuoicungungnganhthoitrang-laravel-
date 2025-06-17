<!-- resources/views/home/dang_ky_nganh.blade.php -->
@include('home.header')



<canvas id="seasonCanvas"></canvas>
<div class="container py-5">
    <h2 class="mb-4 text-danger">🛒 Giỏ hàng của bạn</h2>

    @if (count($cart) > 0)
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Kích cỡ</th>
                <th>Màu sắc</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>

            </tr>
        </thead>
        <tbody>
            @php $tongTien = 0; @endphp
            @foreach ($cart as $key => $item)

            @php $thanhTien = $item['gia'] * $item['so_luong']; $tongTien += $thanhTien; @endphp
            <tr>
                <td>{{ $item['ten'] }}</td>
                <td>{{ $item['kich_co'] }}</td>
                <td>{{ $item['mau_sac'] }}</td>
                <td>{{ number_format($item['gia'], 0, ',', '.') }} đ</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity('{{ $key }}', 'minus')">−</button>
                        <span id="qty-{{ $key }}">{{ $item['so_luong'] }}</span>
                        <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity('{{ $key }}', 'plus')">+</button>
                    </div>
                </td>

                <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="removeItem('{{ $key }}')">🗑️ Xóa</button>
                </td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="fw-bold">
                <td colspan="5" class="text-end">Tổng cộng:</td>
                <td>{{ number_format($tongTien, 0, ',', '.') }} đ</td>
            </tr>
        </tfoot>
    </table>

    <div class="text-end">
        <a href="{{route('checkout')}}" class="btn btn-success">🛍️ Tiến hành đặt hàng</a>
    </div>
    @else
    <div class="alert alert-info">Giỏ hàng của bạn đang trống.</div>
    <a href="{{ route('home.index') }}" class="btn btn-outline-primary">⬅️ Quay lại mua sắm</a>
    @endif
</div>

<script>
    function updateQuantity(id, action) {
        fetch("{{ route('cart.update') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id: id,
                    action: action
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.error || 'Lỗi khi cập nhật số lượng');
                }
            });
    }


    function removeItem(id) {
        if (!confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) return;

        fetch("{{ route('cart.remove') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id: id
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Lỗi khi xóa sản phẩm');
                }
            });
    }
</script>


@include('home.footer')