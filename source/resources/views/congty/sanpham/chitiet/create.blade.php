@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Thêm chi tiết sản phẩm cho: {{ $sanPham->ten }}</h3>

    <form action="{{ route('congty.sanpham.chitiet.store', $sanPham->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Màu sắc</label>
            <input type="text" name="mau_sac" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kích cỡ</label>
            <input type="text" name="kich_co" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="so_luong" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
</div>
@endsection