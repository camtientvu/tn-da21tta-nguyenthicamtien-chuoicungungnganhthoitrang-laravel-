@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Khách hàng</th>
                <th>Thời gian giao</th>
                <th>Trạng thái</th>
                <th>Phân công cho</th>
                <th>Lộ trình</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($donGiaoHangs as $don)
            <tr>
                <td>#{{ $don->donHang?->ma ?? '[Không có]' }}</td>
<td>{{ $don->donHang?->ten_nguoi_nhan ?? 'Không rõ' }}</td>

                <td>{{ \Carbon\Carbon::parse($don->thoi_gian_giao)->format('d/m/Y H:i') }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $don->trang_thai)) }}</td>

                <td>
                    @if ($don->phanCongs->isNotEmpty())
                    <ul class="mb-0">
                        @foreach ($don->phanCongs as $pc)
                        <li>
                            {{ $pc->nhanVienGiaoHang->user->ho_ten ?? 'Không rõ' }}
                            <small class="text-muted">({{ \Carbon\Carbon::parse($pc->thoi_gian_phan_cong)->format('d/m/Y H:i') }})</small>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <em>Chưa phân công</em> <br>
                    <a href="{{ route('giaohang.phancong.create', $don->id) }}" class="btn btn-sm btn-outline-primary mt-1">➕ Phân công</a>
                    @endif
                </td>


                {{-- 👇 Lộ trình --}}
                <td>
                    @if ($don->loTrinhs->isNotEmpty())
                    <ul class="mb-0">
                        @foreach ($don->loTrinhs as $step)

                        <li>
                            <strong>{{ $step->trang_thai }}</strong> – {{ $step->mo_ta }}<br>
                            <strong> Nhân viên giao: {{ $step->nhanVienGiaoHang->user->ho_ten ?? 'Không rõ'}}</strong>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($step->thoi_gian)->format('d/m/Y H:i') }}</small>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <em>Chưa có</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection