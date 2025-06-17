@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Chi tiết đơn hàng #{{ $donHang->ma }}</h3>

    <div class="card p-4 mb-4">
        <p><strong>Người nhận:</strong> {{ $donHang->ten_nguoi_nhan }}</p>
        <p><strong>Địa chỉ:</strong> {{ $donHang->dia_chi_nhan }}</p>
        <p><strong>Ngày đặt:</strong> {{ \Carbon\Carbon::parse($donHang->created_at)->format('H:i - d/m/Y') }}</p>
        <p><strong>Trạng thái:</strong>
            <span class="badge bg-secondary">
                {{ ucfirst(str_replace('_', ' ', $donHang->trang_thai)) }}
            </span>
        </p>
    </div>

    <h5>📦 Sản phẩm trong đơn</h5>
    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Kích cỡ</th>
                <th>Màu</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $tong = 0; @endphp
            @foreach ($donHang->chiTietDonHangs as $item)
            @php
            $sp = $item->chiTietSanPham->sanPham;
            $thanhTien = $item->gia * $item->so_luong;
            $tong += $thanhTien;
            @endphp
            <tr>
                <td>{{ $sp->ten }}</td>
                <td>{{ $item->chiTietSanPham->kich_co }}</td>
                <td>{{ $item->chiTietSanPham->mau_sac }}</td>
                <td>{{ number_format($item->gia) }} đ</td>
                <td>{{ number_format( $item->so_luong) }}</td>
                <td class="text-right">{{ number_format($thanhTien) }} đ</td>
            </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="5" class="text-end">Tổng cộng</td>
                <td class="text-right">{{ number_format($tong) }} đ</td>
            </tr>
        </tbody>
    </table>

    @if ($donHang->donGiaoHangs->isNotEmpty())
    <h5>🚚 Thông tin giao hàng</h5>
    @foreach ($donHang->donGiaoHangs as $giao)
    <div class="border p-3 mb-3 bg-light rounded">
        <p><strong>Công ty giao hàng:</strong> {{ $giao->congTyGiaoHang->ten ?? 'Không rõ' }}</p>
        <p><strong>Thời gian giao:</strong> {{ \Carbon\Carbon::parse($giao->thoi_gian_giao)->format('d/m/Y H:i') }}</p>
        <p><strong>Trạng thái:</strong> {{ ucfirst(str_replace('_', ' ', $giao->trang_thai)) }}</p>

        @if ($giao->loTrinhs->isNotEmpty())
        <h6>Lộ trình đơn:</h6>
        <ul class="mb-0">
            @foreach ($giao->loTrinhs as $loTrinh)
            <li>
                <strong>{{ $loTrinh->trang_thai }}</strong> — {{ $loTrinh->mo_ta }} - NV: {{ $loTrinh->nhanVienGiaoHang->user->ho_ten ?? 'Không rõ' }} <br>
                <small class="text-muted">{{ \Carbon\Carbon::parse($loTrinh->thoi_gian)->format('d/m/Y H:i') }}</small>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    @endforeach
    @endif

    <a href="{{ route('congty.donhang.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
    <a href="{{ route('congty.donhang.exportPDF', $donHang->id) }}" class="btn btn-danger">
        📄 Xuất PDF
    </a>

</div>
@endsection