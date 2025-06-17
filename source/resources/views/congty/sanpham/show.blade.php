@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Chi tiết sản phẩm: {{ $sanPham->ten }}</h3>

    <p><strong>Mã:</strong> {{ $sanPham->ma }}</p>
    <p><strong>Danh mục:</strong> {{ $sanPham->danhMuc->ten ?? 'Không rõ' }}</p>
    <p><strong>Mô tả:</strong> {{ $sanPham->mo_ta }}</p>
    <p><strong>Giá:</strong> {{ number_format($sanPham->gia) }} VND</p>

    <h4>Hình ảnh sản phẩm</h4>
    <div class="row">
        @foreach($sanPham->hinhAnhSanPhams as $image)
        <div class="col-md-3 mb-3 text-center">
            <img src="{{ asset('storage/' . $image->duong_dan_hinh) }}" class="img-fluid img-thumbnail mb-2" />
            <form action="{{ route('congty.sanpham.hinhanh.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá hình ảnh này?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Xoá</button>
            </form>
        </div>
        @endforeach
    </div>
    <a href="{{ route('congty.sanpham.hinhanh.create', $sanPham->id) }}" class="btn btn-secondary">Thêm hình ảnh</a>

    <h4 class="mt-4">Chi tiết sản phẩm</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Màu sắc</th>
                <th>Kích cỡ</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sanPham->chiTietSanPhams as $ct)
            <tr>
                <td>{{ $ct->mau_sac }}</td>
                <td>{{ $ct->kich_co }}</td>
                <td>{{ $ct->so_luong }}</td>
                <td>
                    <a href="{{ route('congty.sanpham.chitiet.edit', $ct->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('congty.sanpham.chitiet.destroy', $ct->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xoá chi tiết này?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('congty.sanpham.chitiet.create', $sanPham->id) }}" class="btn btn-primary">Thêm chi tiết sản phẩm</a>
    <a href="{{ route('congty.sanpham.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection