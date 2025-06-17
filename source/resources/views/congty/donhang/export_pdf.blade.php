<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đơn giao hàng #{{ $donHang->ma }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #000;
            line-height: 1.5;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: center;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .info td {
            border: none;
            text-align: left;
            padding: 2px 0;
        }

        .tieungu {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        .tieungu p {
            margin: 0;
        }

        .divider {
            width: 200px;
            margin: 0 auto 10px;
            border-top: 2px solid #000;
        }
    </style>
</head>

<body>

    <div class="tieungu">
        <p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
        <p>Độc lập - Tự do - Hạnh phúc</p>
        <div class="divider"></div>
    </div>

    <div class="header">
        <h4 style="margin: 0;">CÔNG TY TNHH Fashion SCM</h4>
        <p style="margin: 0;">Địa chỉ: Trà Vinh</p>
        <p style="margin: 0;">Điện thoại: 19008198 | Email: fashion_scm@gmail.com</p>
        <h2 style="margin-top: 10px;">ĐƠN GIAO HÀNG</h2>
        <p>Ngày {{ \Carbon\Carbon::parse($donHang->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($donHang->created_at)->format('m') }} Năm {{ \Carbon\Carbon::parse($donHang->created_at)->format('Y') }}</p>
        <p>Số phiếu: {{ $donHang->ma }}</p>
    </div>

    <table class="info" width="100%">
        <tr>
            <td><strong>Khách hàng:</strong> {{ $donHang->ten_nguoi_nhan }}</td>
            <td>

                @if ($donHang->donGiaoHangs->isNotEmpty())
                <strong>Giao bởi:</strong> {{ $donHang->donGiaoHangs->first()->congTyGiaoHang->ten ?? '---' }}
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Địa chỉ:</strong> {{ $donHang->dia_chi_nhan }}</td>
            <td>
                <strong>SĐT:</strong>
                {{ $donHang->khachHang->user->so_dien_thoai ?? '--------------------' }}
            </td>
        </tr>
        <tr>
            <td colspan="2"><strong>Diễn giải:</strong> Giao hàng đơn số {{ $donHang->ma }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN HÀNG HÓA</th>
                <th>ĐVT</th>
                <th>SỐ LƯỢNG</th>
                <th>ĐƠN GIÁ</th>
                <th>THÀNH TIỀN</th>
                <th>GHI CHÚ</th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; $tong = 0; @endphp
            @foreach ($donHang->chiTietDonHangs as $item)
            @php
            $thanhTien = $item->so_luong * $item->gia;
            $tong += $thanhTien;
            @endphp
            <tr>
                <td>{{ $stt++ }}</td>
                <td>{{ $item->chiTietSanPham->sanPham->ten }}</td>
                <td>Chiếc</td>
                <td>{{ $item->so_luong }}</td>
                <td>{{ number_format($item->gia, 0, ',', '.') }}</td>
                <td>{{ number_format($thanhTien, 0, ',', '.') }}</td>
                <td></td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5" class="text-end"><strong>Tổng cộng</strong></td>
                <td colspan="2"><strong>{{ number_format($tong, 0, ',', '.') }} đ</strong></td>
            </tr>
        </tbody>
    </table>

    <table width="100%" style="margin-top: 50px; border: none;">
        <tr>
            <td style="width: 50%; text-align: center; border: none;">
                <strong>Người giao hàng</strong> <br>(Ký, ghi rõ họ tên)<br><br>
            </td>
            <td style="width: 50%; text-align: center; border: none;">
                <strong>Người nhận hàng</strong><br>(Ký, ghi rõ họ tên)<br><br>
            </td>
        </tr>
    </table>

</body>

</html>