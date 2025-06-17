@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Thêm hình ảnh cho sản phẩm: {{ $sanPham->ten }}</h3>
    {{-- Hiển thị thông báo lỗi --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Hiển thị thông báo thành công --}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Hiển thị lỗi hệ thống --}}
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('congty.sanpham.hinhanh.store', $sanPham->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Chọn hình ảnh</label>
            <input type="file" name="duong_dan_hinh" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Tải lên</button>
    </form>
</div>
@endsection