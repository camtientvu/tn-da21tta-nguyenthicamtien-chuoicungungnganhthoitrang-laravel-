@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Cập nhật danh mục</h3>
    <form method="POST" action="{{ route('congty.danhmuc.update', $danhMuc->id) }}">
        @csrf
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="ten" class="form-control" value="{{ old('ten', $danhMuc->ten) }}" required>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="mo_ta" class="form-control">{{ old('mo_ta', $danhMuc->mo_ta) }}</textarea>
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option value="1" {{ $danhMuc->trang_thai ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ !$danhMuc->trang_thai ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('congty.danhmuc.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection