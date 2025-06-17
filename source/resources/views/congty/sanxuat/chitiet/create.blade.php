@extends('congty.home.home')



@section('content')
<div class="container">
    <h3>Thêm sản phẩm cho đơn sản xuất: {{ $don->ma }}</h3>

    <form method="POST" action="{{ route('congty.don-san-xuat.chitiet.store', $don->id) }}">
        @csrf
        <div class="mb-3">
            <label for="id_chi_tiet_san_pham" class="form-label">Sản phẩm</label>
            <select class="form-select" name="id_chi_tiet_san_pham" required>
                <option value="">-- Chọn sản phẩm --</option>
                @foreach($chiTietSanPhams as $ct)
                <option value="{{ $ct->id }}">
                    {{ $ct->sanPham->ten ?? '[Không có tên]' }} - Màu: {{ $ct->mau_sac }}, Size: {{ $ct->kich_co }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="so_luong" class="form-label">Số lượng</label>
            <input type="number" name="so_luong" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('congty.don-san-xuat.show', $don->id) }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection