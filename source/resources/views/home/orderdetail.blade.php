@include('home.header')
<canvas id="seasonCanvas"></canvas>
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h4 class="mb-4 text-danger-emphasis">📦 Chi tiết đơn hàng #{{ $donHang->ma }}</h4>

        {{-- Thông tin người nhận --}}
        <div class="mb-4">
            <strong>👤 Người nhận:</strong> {{ $donHang->ten_nguoi_nhan }} <br>
            <strong>📍 Địa chỉ:</strong> {{ $donHang->dia_chi_nhan }} <br>
            <strong>📞 Số điện thoại nhận:</strong> {{ $donHang->sdt }} <br>
            <strong>🕒 Ngày đặt:</strong> {{ \Carbon\Carbon::parse($donHang->ngay_dat)->format('d/m/Y H:i') }} <br>
            <strong>📌 Trạng thái:</strong>
            <span class="badge bg-secondary">{{ ucfirst($donHang->trang_thai) }}</span>
        </div>

        {{-- Bảng sản phẩm --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Màu</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Đánh giá</th>

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
                        <td>{{ number_format($item->gia, 0, ',', '.') }} đ</td>
                        <td>{{ number_format( $item->so_luong) }}</td>
                        <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                        <td>
                            @php
                            $sp = $item->chiTietSanPham->sanPham;
                            $danhGia = \App\Models\DanhGia::where('id_khach_hang', Auth::user()->khachHang->id)
                            ->where('id_san_pham', $sp->id)
                            ->first();
                            @endphp

                            @if ($donHang->trang_thai === 'Hoàn thành')
                            @if ($danhGia)
                            {{-- Hiển thị số sao --}}
                            <span class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <=$danhGia->so_sao)
                                    ⭐
                                    @else
                                    ☆
                                    @endif
                                    @endfor
                                    ({{ $danhGia->so_sao }}/5)
                            </span>
                            @else
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#danhGiaModal_{{ $sp->id }}">Đánh giá</button>
                            @endif
                            @else
                            <span class="text-muted">Chưa hoàn thành</span>
                            @endif
                        </td>


                    </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="5" class="text-end">Tổng cộng</td>
                        <td>{{ number_format($tong, 0, ',', '.') }} đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @foreach ($donHang->chiTietDonHangs as $item)
        @php $sp = $item->chiTietSanPham->sanPham; @endphp
        @if (!$item->da_danh_gia && $donHang->trang_thai === 'Hoàn thành')
        <!-- Modal đánh giá -->
        <div class="modal fade" id="danhGiaModal_{{ $sp->id }}" tabindex="-1" aria-labelledby="danhGiaModalLabel{{ $sp->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('danhgia.sanpham') }}" method="POST" class="modal-content">
                    @csrf
                    <input type="hidden" name="id_don_hang" value="{{ $donHang->id }}">
                    <input type="hidden" name="id_san_pham" value="{{ $sp->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="danhGiaModalLabel{{ $sp->id }}">Đánh giá sản phẩm: {{ $sp->ten }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating">
                            @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $sp->id }}_{{ $i }}" name="so_sao" value="{{ $i }}" required />
                            <label for="star{{ $sp->id }}_{{ $i }}">★</label>
                            @endfor
                        </div>
                        <div class="mt-3">
                            <label for="noi_dung_{{ $sp->id }}">Nội dung (tùy chọn):</label>
                            <textarea class="form-control" name="noi_dung" id="noi_dung_{{ $sp->id }}" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @endforeach


        {{-- Lộ trình đơn giao hàng --}}
        @if ($donHang->donGiaoHangs->isNotEmpty())
        <div class="mt-4">
            <h5 class="text-primary">🚚 Lộ trình giao hàng</h5>
            @foreach ($donHang->donGiaoHangs as $giao)
            @php
            $nhanVien = $giao->phanCongs->sortByDesc('thoi_gian_phan_cong')->first();

            @endphp
            <div class="border rounded p-3 mb-3 bg-light">
                <strong>Đơn giao hàng #{{ $giao->id }}</strong><br>
                <strong>Công ty giao hàng:</strong> {{ $giao->congTyGiaoHang->ten ?? 'N/A' }}<br>
                <strong>Nhân viên:</strong> {{ $nhanVien->nhanVienGiaoHang->user->ho_ten ?? 'Không rõ' }}
                <br>

                <strong>Trạng thái:</strong> {{ $giao->trang_thai }}<br>
                <strong>Thời gian giao:</strong> {{ \Carbon\Carbon::parse($giao->thoi_gian_giao)->format('d/m/Y H:i') }}

                @if ($giao->loTrinhs->isNotEmpty())
                <ul class="timeline">
                    @foreach ($giao->loTrinhs as $step)
                    <li>
                        <strong>{{ ucfirst($step->trang_thai) }}</strong> – {{ $step->mo_ta }}
                        <small>{{ \Carbon\Carbon::parse($step->thoi_gian)->format('d/m/Y H:i') }}</small>
                    </li>
                    @endforeach
                </ul>
                @endif

            </div>
            @endforeach
        </div>
        @endif

        <div class="text-end mt-4">
            <a href="{{ route('lichsu.donhang') }}" class="btn btn-outline-secondary">⬅️ Quay lại</a>
        </div>
    </div>
</div>
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: start;
        gap: 5px;
    }

    .rating input[type="radio"] {
        display: none;
    }

    .rating label {
        font-size: 1.8rem;
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s;
    }

    .rating input:checked~label,
    .rating label:hover,
    .rating label:hover~label {
        color: gold;
    }

    .timeline {
        position: relative;
        padding-left: 30px;
        border-left: 3px solid #0d6efd;
        /* Màu xanh bootstrap */
        margin-top: 1rem;
    }

    .timeline li {
        position: relative;
        margin-bottom: 1.5rem;
        list-style: none;
        padding-left: 20px;
    }

    .timeline li::before {
        content: '';
        position: absolute;
        left: -11px;
        top: 3px;
        width: 14px;
        height: 14px;
        background-color: #0d6efd;
        border: 3px solid #fff;
        border-radius: 50%;
        z-index: 1;
        box-shadow: 0 0 0 2px #0d6efd;
    }

    .timeline li strong {
        display: inline-block;
        font-weight: 600;
        color: #0d6efd;
    }

    .timeline li small {
        display: block;
        margin-top: 4px;
        color: #6c757d;
        font-size: 0.875rem;
    }
</style>


@include('home.footer')