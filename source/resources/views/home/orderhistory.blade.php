@include('home.header')
<canvas id="seasonCanvas"></canvas>

<div class="container py-5">
    <h4 class="mb-4 text-danger">📜 Lịch sử đơn hàng</h4>

    @if ($donHangs->isEmpty())
    <div class="alert alert-info">Bạn chưa có đơn hàng nào.</div>
    @else
    <table id="example2" class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Mã đơn</th>
                <th>Ngày đặt</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donHangs as $don)
            <tr>
                <td>{{ $don->ma }}</td>
                <td data-order="{{ $don->ngay_dat }}">
                    {{ \Carbon\Carbon::parse($don->ngay_dat)->format('d/m/Y') }}
                </td>
                <td>{{ $don->chi_tiet_don_hangs_count }} sản phẩm</td>
                <td>{{ number_format($don->tong_tien, 0, ',', '.') }} đ</td>
                <td><span class="badge bg-info text-dark">{{ ucfirst($don->trang_thai) }}</span></td>
                <td><span class="badge bg-info text-success">{{ ucfirst($don->thanh_toan) }}</span></td>
                <td>

                    <a href="{{ route('lichsu.donhang.chitiet', $don->id) }}" class="btn btn-sm btn-outline-primary">Chi tiết</a>



                    @if($don->trang_thai=='Chờ duyệt')
                    @if($don->trang_thai !== 'Hoàn thành' && $don->trang_thai !== 'Hủy'&& $don->trang_thai !== 'Đã duyệt')
                    <form action="{{ route('home.huydon', $don->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">
                        @csrf
                        <button class="btn btn-danger mt-2">❌ Hủy đơn hàng</button>
                    </form>
                    @endif

                    @endif

                    @if($don->thanh_toan=='Thanh toán online')
                    <a href="{{ route('lichsu.donhang.chitiet', $don->id) }}" class="btn btn-sm btn-outline-primary">Thanh toán</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>





@include('home.footer')