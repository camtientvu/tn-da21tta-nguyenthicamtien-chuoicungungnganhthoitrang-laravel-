@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Danh sách danh mục</h3>
    <a href="{{ route('congty.danhmuc.create') }}" class="btn btn-success mb-2">Thêm mới</a>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhMucs as $dm)
            <tr>
                <td>{{ $dm->ten }}</td>
                <td>{{ $dm->mo_ta }}</td>
                <td>{{ $dm->trang_thai ? 'Hiển thị' : 'Ẩn' }}</td>
                <td>
                    <a href="{{ route('congty.danhmuc.edit', $dm->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route('congty.danhmuc.destroy', $dm->id) }}" method="POST" style="display:inline-block">
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