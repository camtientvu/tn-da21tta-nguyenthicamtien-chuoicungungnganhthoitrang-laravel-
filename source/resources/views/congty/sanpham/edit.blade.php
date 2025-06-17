@extends('congty.home.home')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div class="container">
    <h3>Sửa sản phẩm</h3>

    <form action="{{ route('congty.sanpham.update', $sanPham->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="id_danh_muc" class="form-select" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach($danhMucs as $dm)
                <option value="{{ $dm->id }}" {{ $sanPham->id_danh_muc == $dm->id ? 'selected' : '' }}>{{ $dm->ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control" name="ma" value="{{ old('ma', $sanPham->ma) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="ten" value="{{ old('ten', $sanPham->ten) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea class="form-control" id="noi_dung" name="mo_ta">{{ old('mo_ta', $sanPham->mo_ta) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" class="form-control" name="gia" value="{{ old('gia', $sanPham->gia) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giảm giá</label>
            <input type="number" class="form-control" name="giamgia" value="{{ old('giamgia', $sanPham->giamgia) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-select">
                <option value="1" {{ $sanPham->trang_thai ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ !$sanPham->trang_thai ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('congty.sanpham.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>


@endsection