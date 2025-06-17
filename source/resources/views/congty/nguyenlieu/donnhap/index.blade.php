@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Danh sách đơn nhập nguyên liệu</h3>
    <a href="{{ route('congty.donnhap.create') }}" class="btn btn-success mb-2">Thêm mới</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donNhaps as $dn)
            <tr>
                <td>DNH: {{ $dn->id }}</td>
                <td>{{ $dn->nhaCungCap->ten ?? '---' }}</td>
                <td>{{ \Carbon\Carbon::parse($dn->ngay_nhap)->format('d/m/Y') }}</td>
                <td class="text-right">{{ number_format($dn->tong_tien) }} VND</td>
                <td>
                    @switch($dn->trang_thai)
                    @case('Chờ duyệt') <span class="badge bg-warning">Chờ duyệt</span> @break
                    @case('Đã duyệt') <span class="badge bg-info">Đã duyệt</span> @break
                    @case('Hoàn thành') <span class="badge bg-success">Hoàn thành</span> @break
                    @case('Hủy') <span class="badge bg-danger">Hủy</span> @break
                    @endswitch
                </td>
                <td>
                    <a href="{{ route('congty.donnhap.edit', $dn->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('congty.donnhap.destroy', $dn->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                    <a href="{{ route('congty.donnhap.show', $dn->id) }}" class="btn btn-info btn-sm">Xem</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection