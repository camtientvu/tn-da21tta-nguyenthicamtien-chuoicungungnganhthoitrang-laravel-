@extends('congty.home.home')

@section('content')
<div class="container">
    <h2 class="mb-4">📦 CHI TIẾT TỒN KHO NGUYÊN LIỆU</h2>

    @if($loTonKho->isEmpty())
    <p class="text-muted">Không có dữ liệu tồn kho.</p>
    @else
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr class="text-center">
                <th>#</th>
                <th>Tên nguyên liệu</th>
                <th>Nhà cung cấp</th>
                <th>Số lượng nhập</th>
                <th>Đã sử dụng</th>
                <th>Còn tồn</th>
                <th>Đơn vị</th>
                <th>Ngày nhập</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loTonKho as $index => $lo)
            @php
            $ton = $lo->so_luong_nhap - $lo->so_luong_su_dung;
            @endphp
            <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                <td>{{ $lo->nguyenLieuNCC->ten ?? '---' }}</td>
                <td>{{ $lo->nguyenLieuNCC->nhaCungCap->ten ?? '---' }}</td>
                <td>{{ $lo->so_luong_nhap }}</td>
                <td>{{ $lo->so_luong_su_dung }}</td>
                <td class="fw-bold {{ $index < 3 ? 'text-danger' : 'text-success' }}">
                    {!! $index < 3 ? '🔴' : '' !!}
                        {{ $ton }}
                        </td>
                <td>{{ $lo->nguyenLieuNCC->don_vi_tinh ?? '' }}</td>
                <td>{{ \Carbon\Carbon::parse($lo->ngay_nhap)->format('d/m/Y') }}</td>
                <td>{{ $lo->ghi_chu ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection