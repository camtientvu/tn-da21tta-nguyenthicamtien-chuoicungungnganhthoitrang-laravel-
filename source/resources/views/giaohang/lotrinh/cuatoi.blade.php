@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h4 class="mb-4">{{ $title }}</h4>

    @if ($loTrinhs->isEmpty())
    <div class="alert alert-warning text-center">⛔ Bạn chưa thực hiện bước lộ trình nào.</div>
    @else
    @php
    $grouped = $loTrinhs->groupBy('id_don_giao_hang');
    @endphp

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table id="example2" class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th style="width: 15%;">Mã đơn hàng</th>
                        <th style="width: 15%;">Ngày giao</th>
                        <th style="width: 50%;">Lộ trình bạn thực hiện</th>
                        <th style="width: 10%;">Xem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grouped as $donId => $buocList)
                    @php
                    $don = $buocList->first()->donGiaoHang ?? null;
                    $maDon = $don->donHang->ma ?? '---';
                    $ngayGiao = optional($don)->ngay_giao ? \Carbon\Carbon::parse($don->ngay_giao)->format('d/m/Y') : '---';

                    @endphp
                    <tr>
                        <td class="text-center fw-bold">#{{ $maDon }}</td>
                        <td class="text-center">{{ $ngayGiao }}</td>
                        <td>
                            <ul class="ps-3 mb-0">
                                @foreach ($buocList as $lt)
                                <li>
                                    @if ($lt->trang_thai === 'Đang chuyển' && $lt->id_nhan_vien_giao_hang == Auth::user()->nhanVienGiaoHang->id)
                                    <strong>Đơn được chuyển cho bạn</strong><br>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($lt->thoi_gian)->format('d/m/Y H:i') }}</small>
                                    @else
                                    <strong>{{ ucfirst(str_replace('_', ' ', $lt->trang_thai)) }}</strong> – {{ $lt->mo_ta }}<br>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($lt->thoi_gian)->format('d/m/Y H:i') }}</small>
                                    @endif

                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('giaohang.lotrinh.show', $donId) }}" class="btn btn-sm btn-outline-info">
                                👁️ Xem
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection