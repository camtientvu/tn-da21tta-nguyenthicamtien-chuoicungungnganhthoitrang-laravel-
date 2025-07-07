@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Chi tiết đơn nhập nguyên liệu: DNH: {{ $donNhap->id }}</h3>
    <p><strong>Nhà cung cấp:</strong> {{ $donNhap->nhaCungCap->ten ?? '---' }}</p>
    <p><strong>Ngày nhập:</strong> {{ \Carbon\Carbon::parse($donNhap->ngay_nhap)->format('d/m/Y') }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($donNhap->tong_tien) }} VND</p>
    <p><strong>Trạng thái:</strong> {{ ucfirst($donNhap->trang_thai) }}</p>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <hr>
    <h4>Chi tiết nguyên liệu</h4>

    @if($donNhap->trang_thai === 'Chờ duyệt')
    <form action="{{ route('congty.donnhap.chitiet.store', $donNhap->id) }}" method="POST" class="mb-3">
        @csrf
        <div class="row g-2">
            <div class="col-md-4">
                <select id="nguyenLieuSelect" name="id_nguyen_lieu_ncc" class="form-control" required>
                    <option value="">-- Chọn nguyên liệu --</option>
                    @foreach($nguyenLieuList as $nl)
                    <option value="{{ $nl->id }}" data-gia="{{ $nl->gia }}">
                        {{ $nl->ten }} - Xuất sứ: {{ $nl->xuat_xu }}
                    </option>
                    @endforeach
                </select>


            </div>
            <div class="col-md-2">
                <input type="number" id="giaInput" name="gia" class="form-control" placeholder="Giá (VND)" required min="0" step="0.01">
            </div>

            <div class="col-md-2">
                <input type="number" name="so_luong" class="form-control" placeholder="Số lượng" required min="1">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Thêm nguyên liệu</button>
            </div>
        </div>
    </form>
    @endif

    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Nguyên liệu</th>
                <th>Loại</th>
                <th>Số lượng</th>
                <th>Đơn giá (VND)</th>
                <th>Thành tiền</th>
                <th>Số lô nhập (ID)</th>
                <th>Số lượng đã sử dụng</th>
                @if($donNhap->trang_thai === 'Chờ duyệt')
                <th>Hành động</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($donNhap->chiTietNhapNguyenLieus as $ct)
            <tr>
                <td>{{ $ct->nguyenLieuNCC->ten ?? '---' }}</td>
                <td>{{ $ct->nguyenLieuNCC->loai_nguyen_lieu ?? '---' }}</td>

                <td>{{ number_format($ct->so_luong) }}</td>
                <td>{{ number_format($ct->gia) }} đ</td>
                <td class="text-right">{{ number_format($ct->so_luong * $ct->gia) }} đ</td>
                <td>
                    @php
                    $loNguyenLieuList = $donNhap->loNguyenLieus->where('id_nguyen_lieu_ncc', $ct->id_nguyen_lieu_ncc);
                    $loIds = $loNguyenLieuList->pluck('id')->toArray();
                    @endphp
                    {{ implode(', ', $loIds) }}
                </td>
                <td>
                    @php
                    $tongSoLuongSuDung = $loNguyenLieuList->sum('so_luong_su_dung');
                    @endphp
                    {{ $tongSoLuongSuDung }}
                </td>
                @if($donNhap->trang_thai === 'Chờ duyệt')
                <td>
                    <form action="{{ route('congty.donnhap.chitiet.destroy', $ct->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa chi tiết này?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('congty.donnhap.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    <a href="{{ route('congty.donnhap.exportPdf', $donNhap->id) }}" class="btn btn-primary mt-3">Xuất PDF</a>

</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('nguyenLieuSelect');
        const giaInput = document.getElementById('giaInput');

        select.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const gia = selectedOption.getAttribute('data-gia');
            giaInput.value = gia || '';
        });
    });
</script>