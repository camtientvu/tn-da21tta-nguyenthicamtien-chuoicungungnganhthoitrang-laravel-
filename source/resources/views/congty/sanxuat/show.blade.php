@extends('congty.home.home')

@section('content')
<div class="container">
    <h2>{{ $title }}</h2>

    {{-- Thông tin đơn sản xuất --}}
    <div class="card mb-4">
        <div class="card-header">Thông tin đơn sản xuất</div>
        <div class="card-body">
            <p><strong>Mã:</strong>DSN: {{ $don->id }}</p>
            <p><strong>Ngày bắt đầu:</strong> {{ $don->ngay_bat_dau }}</p>
            <p><strong>Ngày kết thúc:</strong> {{ $don->ngay_ket_thuc }}</p>
            <p><strong>Trạng thái:</strong> {{ $don->trang_thai }}</p>
        </div>
    </div>

    {{-- Danh sách sản phẩm đang sản xuất --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Sản phẩm đang sản xuất</span>
            @if ($don->trang_thai === 'Chờ duyệt')
            <a href="{{ route('congty.don-san-xuat.chitiet.create', $don->id) }}" class="btn btn-primary">
                Thêm sản phẩm
            </a>

            @endif

        </div>


        <table id="example2" class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Kích cỡ</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($don->chiTietDonSanXuats as $ct)
                <tr>
                    <td>{{ $ct->chiTietSanPham->sanPham->ten ?? '[Không có tên]' }}</td>
                    <td>{{ $ct->chiTietSanPham->mau_sac }}</td>
                    <td>{{ $ct->chiTietSanPham->kich_co }}</td>
                    <td>{{ $ct->so_luong }}</td>
                    <td>
                        @if ($don->trang_thai === 'Chờ duyệt')
                        <form action="{{ route('congty.don-san-xuat.chitiet.destroy', [$don->id, $ct->id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{-- Danh sách nguyên liệu sử dụng --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Nguyên liệu sử dụng</span>
            @if ($don->trang_thai === 'Chờ duyệt')
            <a href="{{ route('congty.don-san-xuat.nguyenlieu.create', $don->id) }}" class="btn btn-primary">
                Thêm nguyên liệu
            </a>
            @endif
        </div>
        @if($don->nguyenLieuDonSanXuats->isEmpty())
        <p>Chưa có nguyên liệu nào được thêm.</p>
        @else
        <table id="example3" class="table table-bordered">
            <thead>
                <tr>
                    <th>Lô</th>
                    <th>Nguyên liệu</th>
                    <th>Loại</th>
                    <th>Số lượng</th>
                    <th>Đơn vị</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($don->nguyenLieuDonSanXuats as $item)
                <tr>
                    <td>#{{ $item->loNguyenLieu->id }}</td>
                    <td>{{ $item->loNguyenLieu->nguyenLieuNCC->ten }} - Xuất xứ: {{ $item->loNguyenLieu->nguyenLieuNCC->xuat_xu }} - {{ $item->loNguyenLieu->nguyenLieuNCC->nhaCungCap->ten }}</td>
                    <td>{{ $item->loNguyenLieu->nguyenLieuNCC->loai_nguyen_lieu }}</td>
                    <td>{{ number_format($item->so_luong) }}</td>
                    <td>{{ $item->loNguyenLieu->nguyenLieuNCC->don_vi_tinh }}</td>
                    <td>
                        @if($don->trang_thai === 'Chờ duyệt')
                        <form action="{{ route('congty.don-san-xuat.nguyenlieu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                        @else
                        <em>Không thể xóa</em>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </div>

    <a href="{{ route('congty.don-san-xuat.index') }}" class="btn btn-secondary">← Quay lại</a>
</div>
@endsection