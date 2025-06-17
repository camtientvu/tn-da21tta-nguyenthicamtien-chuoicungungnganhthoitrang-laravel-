@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Sửa nguyên liệu</h3>

    <form action="{{ route('congty.nguyenlieu.update', $nguyenLieu->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ten" class="form-label">Tên nguyên liệu</label>
            <input type="text" class="form-control" id="ten" name="ten" value="{{ old('ten', $nguyenLieu->ten) }}" required>
        </div>
        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mo_ta" name="mo_ta">{{ old('mo_ta', $nguyenLieu->mo_ta) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="don_vi" class="form-label">Đơn vị</label>
            <input type="text" class="form-control" id="don_vi" name="don_vi" value="{{ old('don_vi', $nguyenLieu->don_vi) }}" required>
        </div>
        <div class="mb-3">
            <label for="so_luong" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="so_luong" name="so_luong" value="{{ old('so_luong', $nguyenLieu->so_luong) }}" required>
        </div>
        <div class="mb-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="gia" name="gia" value="{{ old('gia', $nguyenLieu->gia) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('congty.nguyenlieu.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection