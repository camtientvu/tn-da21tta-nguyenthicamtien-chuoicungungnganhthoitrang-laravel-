@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h4>Lộ trình đơn #{{ $don->donHang->ma }}</h4>


    <ul class="list-group mb-4">
        @foreach ($don->loTrinhs as $lt)
        <li class="list-group-item">
            @if ($lt->trang_thai === 'Đang chuyển' && $lt->id_nhan_vien_giao_hang == Auth::user()->nhanVienGiaoHang->id)
            <strong>Đơn được chuyển cho bạn</strong><br>
            <small class="text-muted">{{ \Carbon\Carbon::parse($lt->thoi_gian)->format('d/m/Y H:i') }}</small>
            @else
            <strong>{{ ucfirst($lt->trang_thai) }}</strong> – {{ $lt->mo_ta }}<br>
            <small class="text-muted">
                {{ \Carbon\Carbon::parse($lt->thoi_gian)->format('d/m/Y H:i') }}
                @if ($lt->id_nhan_vien_giao_hang == $nv->id) (Bạn) @endif
            </small>
            @endif
        </li>
        @endforeach
    </ul>

    @if ($coTheSua)
    <a href="{{ route('giaohang.lotrinh.them', ['id' => $don->id]) }}" class="btn btn-success">➕ Thêm lộ trình</a>
    <a href="{{ route('giaohang.lotrinh.chuyen', ['id' => $don->id]) }}" class="btn btn-success">➕ Chuyển đơn</a>
    @endif

    <a href="{{ route('giaohang.lotrinh.cuatoi') }}" class="btn btn-secondary">⬅️ Quay lại</a>
</div>
@endsection