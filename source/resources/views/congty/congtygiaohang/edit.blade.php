@extends('congty.home.home')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? 'Sửa công ty giao hàng' }}</h3>
    </div>
    <form action="{{ route('congty.congtygiaohang.update', $congTyGiaoHang->id) }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label for="ten">Tên công ty</label>
                <input type="text" name="ten" class="form-control" value="{{ old('ten', $congTyGiaoHang->ten) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $congTyGiaoHang->email) }}">
            </div>
            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại</label>
                <input type="text" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai', $congTyGiaoHang->so_dien_thoai) }}">
            </div>
            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi', $congTyGiaoHang->dia_chi) }}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('congty.congtygiaohang.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection