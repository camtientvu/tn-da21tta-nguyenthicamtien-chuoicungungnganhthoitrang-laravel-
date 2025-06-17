@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Duyệt đơn hàng #{{ $donHang->ma }}</h3>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card p-4 mb-4">
        <h5>📦 Thông tin đơn hàng</h5>
        <p><strong>Khách hàng đặt:</strong> {{ $donHang->khachHang->user->ten ?? 'Không rõ' }}</p>
        <p><strong>Tên khách nhận:</strong> {{ $donHang->ten_nguoi_nhan }}</p>
        <p><strong>Địa chỉ nhận:</strong> {{ $donHang->dia_chi_nhan }}</p>
        <p><strong>Số điện thoại nhận:</strong> {{ $donHang->sdt }}</p>
        <p><strong>Ngày đặt:</strong> {{ \Carbon\Carbon::parse($donHang->ngay_dat)->format('d/m/Y H:i') }}</p>
        <p><strong>Tổng tiền:</strong> {{ number_format($donHang->tong_tien, 0, ',', '.') }} VND</p>
    </div>

    <form method="POST" action="{{ route('congty.donhang.update', $donHang->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_cong_ty_giao_hang" class="form-label">Chọn công ty giao hàng</label>
            <select name="id_cong_ty_giao_hang" id="id_cong_ty_giao_hang" class="form-select" required>
                <option value="">-- Chọn công ty --</option>
                @foreach($congTyGiaoHangs as $cty)
                <option value="{{ $cty->id }}">{{ $cty->ten }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">✅ Duyệt & Giao hàng</button>
        <a href="{{ route('congty.donhang.index') }}" class="btn btn-secondary">⬅️ Quay lại</a>
    </form>
</div>
@endsection