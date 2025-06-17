@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Cập nhật chi tiết sản phẩm</h3>

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('congty.sanpham.chitiet.update', $chiTiet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Màu sắc</label>
            <input type="text" name="mau_sac" class="form-control" value="{{ old('mau_sac', $chiTiet->mau_sac) }}" required>
        </div>
        <div class="form-group">
            <label>Kích cỡ</label>
            <input type="text" name="kich_co" class="form-control" value="{{ old('kich_co', $chiTiet->kich_co) }}" required>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="so_luong" class="form-control" value="{{ old('so_luong', $chiTiet->so_luong) }}" required step="1">

        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection