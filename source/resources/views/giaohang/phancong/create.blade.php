@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h4>➕ Phân công giao hàng: Đơn #{{ $donGiaoHang->donHang->ma }}</h4>

    <form method="POST" action="{{ route('giaohang.phancong.store', $donGiaoHang->id) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Chọn nhân viên</label>
            <select name="id_nhan_vien_giao_hang" class="form-select" required>
                <option value="">-- Chọn --</option>
                @foreach ($nhanViens as $nv)
                <option value="{{ $nv->id }}">{{ $nv->user->ten }} ({{ $nv->user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ghi chú (tùy chọn)</label>
            <input type="text" name="ghi_chu" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">✅ Xác nhận phân công</button>
        <a href="{{ route('giaohang.donhang.index') }}" class="btn btn-secondary">⬅️ Quay lại</a>
    </form>
</div>
@endsection