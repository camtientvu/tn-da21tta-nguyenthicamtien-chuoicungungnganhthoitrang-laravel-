@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif



    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Công ty</th>
                <th>Quyền hạn</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nhanViens as $nv)
            <tr>
                <td>{{ $nv->user->ten }}</td>
                <td>{{ $nv->user->email }}</td>

                <td>{{ $nv->congTyGiaoHang->ten ?? 'Không rõ' }}</td>
                <td>{{ $nv->vai_tro }}</td>
                <td>{{ $nv->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('giaohang.nguoidung.edit', $nv->id) }}" class="btn btn-sm btn-primary">✏️ Sửa</a>
                    <form action="{{ route('giaohang.nguoidung.destroy', $nv->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa nhân viên này?')" class="btn btn-sm btn-danger">🗑️ Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection