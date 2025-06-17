@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Danh sách sản phẩm</h3>
    <a href="{{ route('congty.sanpham.create') }}" class="btn btn-success mb-2">Thêm mới</a>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sanPhams as $sp)
            <tr>
                <td>{{ $sp->ma }}</td>
                <td>{{ $sp->ten }}</td>
                <td>{{ $sp->danhMuc->ten ?? '---' }}</td>
                <td>{{ number_format($sp->gia) }} VND</td>
                <td>{{ $sp->trang_thai ? 'Hiển thị' : 'Ẩn' }}</td>
                <td>
                    <a href="{{ route('congty.sanpham.edit', $sp->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('congty.sanpham.destroy', $sp->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                    <a href="{{ route('congty.sanpham.show', $sp->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection