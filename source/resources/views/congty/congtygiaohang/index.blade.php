@extends('congty.home.home')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? 'Danh sách công ty giao hàng' }}</h3>
        <a href="{{ route('congty.congtygiaohang.create') }}" class="btn btn-success float-right">Thêm mới</a>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($congtygiaohangs as $ctgh)
                <tr>
                    <td>{{ $ctgh->id }}</td>
                    <td>{{ $ctgh->ten }}</td>
                    <td>{{ $ctgh->email }}</td>
                    <td>{{ $ctgh->so_dien_thoai }}</td>
                    <td>{{ $ctgh->dia_chi }}</td>
                    <td>
                        <a href="{{ route('congty.congtygiaohang.edit', $ctgh->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('congty.congtygiaohang.destroy', $ctgh->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($congtygiaohangs->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Chưa có công ty giao hàng nào</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection