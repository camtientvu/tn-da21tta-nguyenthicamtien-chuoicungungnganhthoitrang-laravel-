@extends('nhacungcap.home.home')

@section('content')
<div class="container">
    <h3>Sửa nguyên liệu</h3>

    <form action="{{ route('nhacungcap.nguyenlieu.update', $nguyenLieu->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ten" class="form-label">Tên nguyên liệu</label>
            <input type="text" class="form-control" id="ten" name="ten" value="{{ old('ten', $nguyenLieu->ten) }}" required>
        </div>
        <div class="mb-3">
            <label for="ten" class="form-label">Loại nguyên liệu</label>
            <input type="text" class="form-control" id="ten" name="loai_nguyen_lieu" value="{{ old('loai_nguyen_lieu', $nguyenLieu->loai_nguyen_lieu) }}" required>
        </div>
        <div class="mb-3">
            <label for="xuat_xu" class="form-label">Xuất xứ</label>
            <textarea class="form-control" id="xuat_xu" name="xuat_xu">{{ old('xuat_xu', $nguyenLieu->xuat_xu) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="don_vi" class="form-label">Đơn vị</label>
            <input type="text" class="form-control" id="don_vi_tinh" name="don_vi_tinh" value="{{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) }}" required>
        </div>

        <div class="mb-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="gia" name="gia" value="{{ old('gia', $nguyenLieu->gia) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('nhacungcap.nguyenlieu.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection