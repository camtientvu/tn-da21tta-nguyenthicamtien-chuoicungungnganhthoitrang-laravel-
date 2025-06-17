<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đơn nhập nguyên liệu #{{ $donNhap->ma }}</title>
   <style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 13px;
        color: #000;
        line-height: 1.5;
        margin: 40px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
        font-size: 13px;
    }

    th {
        border: 1px solid #333;
        padding: 6px;
        text-align: center;
        font-weight: bold;
        font-size: 13px;
    }

    td {
        border: 1px solid #333;
        padding: 6px;
        text-align: center;
        font-size: 13px;
    }

    .info td {
        border: none;
        text-align: left;
        padding: 2px 0;
        font-size: 13px;
    }

    /* ✅ Quốc hiệu + tiêu ngữ */
    .tieungu {
        text-align: center;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .tieungu p {
        margin: 0;
    }

    .divider {
        width: 200px;
        margin: 4px auto 10px auto;
        border-top: 2px solid #000;
    }

    /* ✅ Tên công ty */
    .header h4 {
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        margin: 0;
    }

    /* ✅ Thông tin địa chỉ, số điện thoại */
    .header p {
        font-size: 13px;
        text-align: center;
        margin: 2px 0;
    }

    /* ✅ Tiêu đề văn bản */
    .header h2 {
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        margin: 10px 0 5px;
    }

    /* ✅ Ngày tháng và số phiếu */
    .header .sub-info {
        font-size: 13px;
        font-weight: normal;
        text-align: center;
        margin: 2px 0;
    }

    /* ✅ Phần chữ ký */
    .signature td {
        font-size: 13px;
        text-align: center;
        border: none;
        padding: 30px 10px 10px 10px;
    }

    .signature strong {
        display: block;
        margin-bottom: 5px;
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
        <h2 style="margin-top: 10px;">PHIẾU NHẬP NGUYÊN LIỆU</h2>
        <p>Ngày {{ \Carbon\Carbon::parse($donNhap->ngay_nhap)->format('d') }} Tháng {{ \Carbon\Carbon::parse($donNhap->ngay_nhap)->format('m') }} Năm {{ \Carbon\Carbon::parse($donNhap->ngay_nhap)->format('Y') }}</p>
        <p>Số phiếu: {{ $donNhap->ma }}</p>
    </div>

    <table class="info" width="100%">
        <tr>
            <td><strong>Nhà cung cấp:</strong> {{ $donNhap->nhaCungCap->ten ?? '--------------------' }}</td>
            <td><strong>Trạng thái:</strong> {{ ucfirst($donNhap->trang_thai) }}</td>
        </tr>
        <tr>
            <td><strong>Tổng tiền:</strong> {{ number_format($donNhap->tong_tien) }} VND</td>
            <td><strong>Diễn giải:</strong> Nhập kho đơn số {{ $donNhap->ma }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>TÊN NGUYÊN LIỆU</th>
                <th>LOẠI NGUYÊN LIỆU</th>
                <th>ĐƠN GIÁ (VND)</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
           <!-- <th>SỐ LÔ NHẬP</th>
                <th>ĐÃ SỬ DỤNG</th>  -->
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @foreach ($donNhap->chiTietNhapNguyenLieus as $ct)
            @php
            $loNguyenLieuList = $donNhap->loNguyenLieus->where('id_nguyen_lieu_ncc', $ct->id_nguyen_lieu_ncc);
            $loIds = $loNguyenLieuList->pluck('id')->toArray();
            $tongSoLuongSuDung = $loNguyenLieuList->sum('so_luong_su_dung');
            @endphp
            <tr>
                <td>{{ $stt++ }}</td>
                <td>{{ $ct->nguyenLieuNCC->ten ?? '---' }}</td>
                <td>{{ $ct->nguyenLieuNCC->loai_nguyen_lieu ?? '---' }}</td>
                <td>{{ number_format($ct->gia) }}</td>
                <td>{{ number_format($ct->so_luong) }} {{$ct->nguyenLieuNCC->don_vi_tinh}}</td>
                <td>{{ number_format($ct->so_luong * $ct->gia) }}</td>
            @endforeach
        </tbody>
    </table>

  <table width="100%" style="margin-top: 50px; border: none;">
    <tr>
        <td style="width: 50%; text-align: left; border: none; padding-left: 40px;">
            <strong>Nhà cung cấp</strong><br>(Ký, ghi rõ họ tên)<br><br><br><br>
        </td>
        <td style="width: 50%; text-align: right; border: none; padding-right: 40px;">
            <strong>Người lập phiếu</strong><br>(Ký, ghi rõ họ tên)<br><br><br><br>
        </td>
    </tr>
</table>


</body>

</html>