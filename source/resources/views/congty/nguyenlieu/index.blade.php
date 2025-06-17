@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Danh sách nguyên liệu</h3>
    <a href="{{ route('congty.nguyenlieu.create') }}" class="btn btn-success mb-2">Thêm mới</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Đơn vị</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nguyenLieus as $nl)
            <tr>
                <td>{{ $nl->ten }}</td>
                <td>{{ $nl->mo_ta }}</td>
                <td>{{ $nl->don_vi }}</td>
                <td>{{ $nl->so_luong }}</td>
                <td>{{ number_format($nl->gia, 0, ',', '.') }} đ</td>
                <td>
                    <a href="{{ route('congty.nguyenlieu.edit', $nl->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('congty.nguyenlieu.destroy', $nl->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection