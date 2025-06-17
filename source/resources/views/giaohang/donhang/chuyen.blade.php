@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h4 class="mb-4">🔁 Chuyển đơn giao hàng #{{ $don->donHang->ma }}</h4>

    <form action="{{ route('giaohang.lotrinh.chuyen.xuly', $don->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Chọn nhân viên giao hàng mới</label>
            <select name="id_nhan_vien_moi" class="form-select" required>
                <option value="">-- Chọn nhân viên --</option>
                @foreach ($danhSachNhanVien as $nhanVien)
                <option value="{{ $nhanVien->id }}">
                    {{ $nhanVien->user->ho_ten }} (Mã NV: {{ $nhanVien->id }})
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning">✅ Xác nhận chuyển</button>
        <a href="{{ route('giaohang.lotrinh.show', $don->id) }}" class="btn btn-secondary">⬅️ Quay lại</a>
    </form>
</div>
@endsection