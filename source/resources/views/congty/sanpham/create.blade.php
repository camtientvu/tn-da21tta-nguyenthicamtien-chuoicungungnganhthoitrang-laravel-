@extends('congty.home.home')


@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div class="container">
    <h3>Thêm sản phẩm</h3>
    <form action="{{ route('congty.sanpham.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Danh mục</label>
            <select name="id_danh_muc" class="form-control">
                @foreach($danhMucs as $dm)
                <option value="{{ $dm->id }}">{{ $dm->ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Mã sản phẩm</label>
            <input type="text" name="ma" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="ten" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="mo_ta" class="form-control" id="noi_dung"></textarea>
        </div>
        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="gia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Giảm giá</label>
            <input type="number" name="giamgia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-success">Thêm mới</button>
    </form>
</div>

@endsection