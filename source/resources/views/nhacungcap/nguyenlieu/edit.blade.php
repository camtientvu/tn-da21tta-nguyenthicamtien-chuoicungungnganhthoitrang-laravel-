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
    <label for="don_vi_tinh" class="form-label">Đơn vị</label>
    <select class="form-select" id="don_vi_tinh" name="don_vi_tinh" required>
        <option value="">-- Chọn đơn vị --</option>
        <option value="kg" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'kg' ? 'selected' : '' }}>kg</option>
        <option value="gam" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'gam' ? 'selected' : '' }}>gam</option>
        <option value="hộp" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'hộp' ? 'selected' : '' }}>hộp</option>
        <option value="cái" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'cái' ? 'selected' : '' }}>cái</option>
        <option value="cuộn" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'cuộn' ? 'selected' : '' }}>cuộn</option>
        <option value="chiếc" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'chiếc' ? 'selected' : '' }}>chiếc</option>
        <option value="miếng" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'miếng' ? 'selected' : '' }}>miếng</option>
        <option value="cây" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'cây' ? 'selected' : '' }}>cây</option>
        <option value="tấm" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'tấm' ? 'selected' : '' }}>tấm</option>
        <option value="m" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'm' ? 'selected' : '' }}>m</option>
        <option value="m2" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'm2' ? 'selected' : '' }}>m2</option>
        <option value="cm" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'cm' ? 'selected' : '' }}>cm</option>
        <option value="mm" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'mm' ? 'selected' : '' }}>m2</option>
        <option value="bộ" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'bộ' ? 'selected' : '' }}>bộ</option>
        <option value="set" {{ old('don_vi_tinh', $nguyenLieu->don_vi_tinh) == 'set' ? 'selected' : '' }}>set</option>
    </select>
    @error('don_vi_tinh')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
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