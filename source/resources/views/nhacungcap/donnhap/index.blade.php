@extends('nhacungcap.home.home')

@section('content')
<div class="container">
    <h3>📦 Danh sách đơn nhập nguyên liệu</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table id="example2" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Ngày nhập</th>
                <th>Số nguyên liệu</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donNhaps as $don)
            <tr>
                <td>{{ $don->ma }}</td>
                <td>{{ \Carbon\Carbon::parse($don->ngay_nhap)->format('d/m/Y') }}</td>
                <td>{{ $don->chi_tiet_nhap_nguyen_lieus_count }}</td>
                <td class="text-right">{{ number_format($don->tong_tien, 0, ',', '.') }} VND</td>
                <td>{{ ucfirst($don->trang_thai) }}</td>
                <td>
                    <form method="POST" action="{{ route('nhacungcap.donnhap.trangthai', $don->id) }}" style="display:inline-block">
                        @csrf
                        @method('PUT')
                        <select name="trang_thai" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                            <option value="Chờ duyệt" {{ $don->trang_thai == 'Chờ duyệt' ? 'selected' : '' }}>Chờ duyệt</option>
                            <option value="Đã duyệt" {{ $don->trang_thai == 'Đã duyệt' ? 'selected' : '' }}>Đã duyệt</option>
                            <option value="Hoàn thành" {{ $don->trang_thai == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="Hủy" {{ $don->trang_thai == 'Hủy' ? 'selected' : '' }}>Hủy</option>
                        </select>
                    </form>

                    @if($don->trang_thai == 'Chờ duyệt')
                    <form method="POST" action="{{ route('nhacungcap.donnhap.destroy', $don->id) }}" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑️</button>
                    </form>
                    @endif
                </td>
            </tr>
            @if($don->chiTietNhapNguyenLieus->count())
            <tr>
                <td colspan="6">
                    <ul class="mb-0" style="list-style: none; padding-left: 0;">
                        @foreach($don->chiTietNhapNguyenLieus as $ct)
                        <li>
                            <strong>{{ $ct->nguyenLieuNCC->ten ?? '---' }}</strong> -
                            Loại nguyên liệu: {{ $ct->nguyenLieuNCC->loai_nguyen_lieu ?? '' }} -
                            SL: {{ $ct->so_luong }} {{ $ct->nguyenLieuNCC->don_vi ?? '' }} -
                            Xuất xứ: {{ $ct->nguyenLieuNCC->xuat_xu ?? '---' }}
                        </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>

    </table>
</div>
@endsection