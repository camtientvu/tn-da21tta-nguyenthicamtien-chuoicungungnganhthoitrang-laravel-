@extends('congty.home.home')

@section('content')
<div class="container">
    <h3 class="mb-4">{{ $title }}</h3>

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

    <form action="{{ route('congty.don-san-xuat.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label class="form-label">Sản phẩm</label>
            <select name="id_san_pham" class="form-select" required>
                <option value="">-- Chọn sản phẩm --</option>
                @foreach($sanPhams as $sp)
                <option value="{{ $sp->id }}" {{ (old('id_san_pham', $don->id_san_pham ?? '') == $sp->id) ? 'selected' : '' }}>
                    {{ $sp->ten }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="ngay_bat_dau">Ngày bắt đầu</label>
            <input type="date" name="ngay_bat_dau" id="ngay_bat_dau" class="form-control" value="{{ old('ngay_bat_dau') }}" required>
        </div>
        <div class="form-group">
            <label for="ngay_ket_thuc">Ngày kết thúc</label>
            <input type="date" name="ngay_ket_thuc" id="ngay_ket_thuc" class="form-control" value="{{ old('ngay_ket_thuc') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Tạo đơn</button>
        <a href="{{ route('congty.don-san-xuat.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection