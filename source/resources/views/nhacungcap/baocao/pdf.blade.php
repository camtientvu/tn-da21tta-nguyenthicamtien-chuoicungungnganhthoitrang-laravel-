<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Báo cáo nhập nguyên liệu</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>BÁO CÁO NHẬP NGUYÊN LIỆU</h2>
    <p><strong>Từ ngày:</strong> {{ $tuNgay }} &nbsp;&nbsp; <strong>Đến ngày:</strong> {{ $denNgay }}</p>
    <p><strong>Tổng số đơn:</strong> {{ $tongDon }} &nbsp;&nbsp; <strong>Doanh thu:</strong> {{ number_format($tongDoanhThu, 0, ',', '.') }} đ</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Ngày nhập</th>
                <th>Mã đơn</th>
                <th>Trạng thái</th>
                <th>Tổng tiền (đ)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donNhap as $index => $don)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($don->ngay_nhap)->format('d/m/Y') }}</td>
                <td>{{ $don->id }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $don->trang_thai)) }}</td>
                <td>{{ number_format($don->tong_tien, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>