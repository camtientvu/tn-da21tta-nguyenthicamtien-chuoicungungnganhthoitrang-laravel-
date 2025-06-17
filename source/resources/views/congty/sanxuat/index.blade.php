@extends('congty.home.home')
@php $user = Auth::user();
@endphp
@section('content')
<div class="container">
    <h3>Danh sách đơn sản xuất</h3>
    @if ($user->nhanVienCongTy->vai_tro == 'admin' || $user->nhanVienCongTy->vai_tro == 'san_xuat')
    <a href="{{ route('congty.don-san-xuat.create') }}" class="btn btn-success mb-2">Thêm mới</a>
    @endif
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Sản phẩm</th> <!-- ✅ Thêm cột -->
                <th>Ngày sản xuất</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>

        </thead>
        <tbody>
            @foreach($donSanXuats as $dsx)
            <tr>
                <td>DSN:{{ $dsx->id }}</td>
                <td>{{ $dsx->sanPham->ten ?? '---' }}</td> <!-- ✅ Hiển thị tên sản phẩm -->
                <td>{{ \Carbon\Carbon::parse($dsx->ngay_bat_dau)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($dsx->ngay_ket_thuc)->format('d/m/Y') }}</td>
                <td>
                    @switch($dsx->trang_thai)
                    @case('Chờ duyệt') <span class="badge bg-warning">Chờ duyệt</span> @break
                    @case('Đang sản xuất') <span class="badge bg-primary">Đang sản xuất</span> @break
                    @case('Hoàn thành') <span class="badge bg-success">Hoàn thành</span> @break
                    @case('Hủy') <span class="badge bg-danger">Hủy</span> @break
                    @endswitch
                </td>
                <td>
                    @php $user = Auth::user(); @endphp
                    @if ($user->nhanVienCongTy->vai_tro == 'admin' || $user->nhanVienCongTy->vai_tro == 'phe_duyet_san_xuat')
                    <a href="{{ route('congty.don-san-xuat.edit', $dsx->id) }}" class="btn btn-primary btn-sm">Cập nhật</a>
                    @endif
                    @if ($user->nhanVienCongTy->vai_tro == 'admin')
                    <form action="{{ route('congty.don-san-xuat.destroy', $dsx->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                    @endif
                    <a href="{{ route('congty.don-san-xuat.show', $dsx->id) }}" class="btn btn-info btn-sm">Xem</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection