<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Báo cáo giao hàng</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2,
        h4 {
            text-align: center;
            margin-bottom: 0;
        }

        .summary {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>BÁO CÁO GIAO HÀNG</h2>
    <h4>Từ ngày: {{ $tuNgay }} - Đến ngày: {{ $denNgay }}</h4>

    <div class="summary">
        <p><strong>Tổng số đơn:</strong> {{ $tongDon }}</p>
        <p><strong>Tổng doanh thu (đơn hoàn thành):</strong> {{ number_format($tongDoanhThu, 0, ',', '.') }} VNĐ</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Mã đơn giao</th>
                <th>Ngày giao</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donGiao as $don)
            <tr>
                <td>{{ $don->ma }}</td>
                <td>{{ \Carbon\Carbon::parse($don->ngay_giao)->format('d/m/Y') }}</td>
                <td>{{ ucfirst($don->trang_thai) }}</td>
                <td>
                    {{ number_format($don->donHang ? $don->donHang->getTongTien() : 0, 0, ',', '.') }} VNĐ
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Thống kê trạng thái đơn</h4>
    <table>
        <thead>
            <tr>
                <th>Trạng thái</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trangThai as $tt)
            <tr>
                <td>{{ ucfirst($tt->trang_thai) }}</td>
                <td>{{ $tt->so_luong }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>