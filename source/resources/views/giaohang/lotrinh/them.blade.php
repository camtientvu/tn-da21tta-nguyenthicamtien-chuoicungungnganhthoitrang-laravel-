@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h4 class="mb-4">➕ Thêm bước lộ trình cho đơn hàng #{{ $don->donHang->ma ?? '---' }}</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('giaohang.lotrinh.luuthem', $don->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select class="form-select" name="trang_thai" required>
                <option value="Đang giao">Đang giao</option>
                <option value="Đã giao">Đã giao</option>
                <option value="Hủy">Hủy</option>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea class="form-control" name="mo_ta" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Thời gian</label>
            <input type="datetime-local" name="thoi_gian" class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-success">✅ Lưu bước</button>
        <a href="{{ route('giaohang.lotrinh.show', $don->id) }}" class="btn btn-secondary">⬅️ Quay lại</a>
    </form>
</div>
@endsection