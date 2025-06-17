@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Danh sách đơn hàng chờ duyệt</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donHangs as $don)
            <tr>
                <td>{{ $don->ma }}</td>
                <td>{{ $don->khachHang->user->ten ?? 'Không rõ' }}</td>
                <td>{{ \Carbon\Carbon::parse($don->created_at)->format('H:i - d/m/Y') }}</td>
                <td class="text-right">{{ number_format($don->tong_tien, 0, ',', '.') }} đ</td>
                @php
                $trangThaiText = match($don->trang_thai) {
                'Chờ duyệt' => 'Chờ duyệt',
                'Đã duyệt' => 'Đã duyệt',
                'Đã giao' => 'Đã giao',
                'Hoàn thành' => 'Hoàn thành',
                'Hủy' => 'Đã hủy',
                default => 'Không rõ'
                };

                $badgeClass = match($don->trang_thai) {
                'Chờ duyệt' => 'bg-warning text-dark',
                'Đang giao' => 'bg-primary',
                'Đã giao' => 'bg-success',
                'Hoàn thành' => 'bg-success',
                'Hủy' => 'bg-danger',
                default => 'bg-secondary'
                };
                @endphp

                <td><span class="badge {{ $badgeClass }}">{{ $trangThaiText }}</span></td>




                <td>
                    @if($don->trang_thai=='Chờ duyệt')
                    <a href="{{ route('congty.donhang.edit', $don->id) }}" class="btn btn-primary btn-sm">Duyệt</a>
                    <a href="{{ route('congty.donhang.huy', $don->id) }}" class="btn btn-danger btn-sm">Hủy</a>
                    @endif
                    <a href="{{ route('congty.donhang.show', $don->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection