<!-- resources/views/home/dang_ky_nganh.blade.php -->
@include('home.header')
<style>
    .checkout-box {
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        padding: 30px;
        border: 1px solid #dee2e6;
    }

    .checkout-box h3 {
        font-weight: 600;
        border-left: 5px solid #dc3545;
        padding-left: 10px;
    }

    .checkout-box table th,
    .checkout-box table td {
        vertical-align: middle !important;
    }

    .checkout-box table th {
        background-color: #f8f9fa;
    }

    .checkout-box .btn-success {
        font-weight: 500;
        padding: 10px 30px;
        border-radius: 8px;
    }
</style>
@php $user = Auth::user();
@endphp
<canvas id="seasonCanvas"></canvas>
<div class="container py-5">
    <div class="checkout-box">
        <h3 class="mb-4 text-danger">🧾 Xác nhận đặt hàng</h3>

        <form method="POST" action="{{ route('checkout.place') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="ten_nguoi_nhan" class="form-label">Tên người nhận</label>
                    <input type="text" name="ten_nguoi_nhan" value="{{$user->ho_ten}}" class="form-control" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="dia_chi_nhan" class="form-label">Địa chỉ nhận hàng</label>
                    <input type="text" name="dia_chi_nhan" value="{{$user->dia_chi}}" class="form-control" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" name="sdt" value="{{$user->so_dien_thoai}}" class="form-control" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="sdt" class="form-label">Thanh toán</label>
                    <select name="thanh_toan" class="form-control">
                        <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        <option value="Thanh toán online">Thanh toán online</option>
                    </select>
                </div>
            </div>

            <hr class="my-4">

            <h5>🛒 Sản phẩm trong đơn:</h5>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Kích cỡ</th>
                            <th>Màu</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $tong = 0; @endphp
                        @foreach ($cart as $item)
                        @php $tien = $item['gia'] * $item['so_luong']; $tong += $tien; @endphp
                        <tr>
                            <td>{{ $item['ten'] }}</td>
                            <td>{{ $item['kich_co'] }}</td>
                            <td>{{ $item['mau_sac'] }}</td>
                            <td>{{ number_format($item['gia'], 0, ',', '.') }} đ</td>
                            <td>{{ $item['so_luong'] }}</td>
                            <td>{{ number_format($tien, 0, ',', '.') }} đ</td>
                        </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="5" class="text-end">Tổng cộng</td>
                            <td>{{ number_format($tong, 0, ',', '.') }} đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">🛍️ Đặt hàng</button>
            </div>
        </form>
    </div>
</div>

@include('home.footer')