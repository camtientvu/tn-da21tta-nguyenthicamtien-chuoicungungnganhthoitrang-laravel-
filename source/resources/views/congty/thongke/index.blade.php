@extends("congty.home.home")

@section('content')
<div class="container">
    <h1 class="mb-4">📊 TỔNG QUAN HỆ THỐNG</h1>

    <!-- Bộ lọc thời gian -->
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="start_date" class="form-label">Từ ngày</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-4">
            <label for="end_date" class="form-label">Đến ngày</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Lọc thống kê</button>
        </div>
    </form>

    <!-- Tổng đơn hàng / đơn nhập -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow bg-primary text-white mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>🧾 Tổng số đơn hàng</span>
                    <a href="{{ route('congty.donhang.index') }}" class="btn btn-sm btn-light">Chi tiết</a>
                </div>
                <div class="card-body text-center">
                    <h2>{{ $donHang->tong_don ?? 0 }}</h2>
                    <p>💵 Doanh thu: {{ number_format($donHang->tong_doanh_thu ?? 0, 0, ',', '.') }} đ</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow bg-success text-white mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>📥 Tổng số đơn nhập</span>
                    <a href="{{ route('congty.donnhap.index') }}" class="btn btn-sm btn-light">Chi tiết</a>
                </div>
                <div class="card-body text-center">
                    <h2>{{ $donNhap->tong_don ?? 0 }}</h2>
                    <p>💰 Giá trị: {{ number_format($donNhap->tong_gia_tri ?? 0, 0, ',', '.') }} đ</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Doanh thu & Giá trị đơn nhập theo ngày -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">📅 Doanh thu theo ngày</div>
                <div class="card-body">
                    <canvas id="chartDoanhThuNgay" data-chart='@json($doanhThuTheoNgay)' style="height: 150px"></canvas>
                    <p class="text-end mt-2">
                        🧮 Tổng doanh thu: <strong class="text-primary">{{ number_format(array_sum($doanhThuTheoNgay->toArray()), 0, ',', '.') }} đ</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">📅 Giá trị đơn nhập theo ngày</div>
                <div class="card-body">
                    <canvas id="chartGiaTriNhapNgay" data-chart='@json($giaTriNhapTheoNgay)' style="height: 150px"></canvas>
                    <p class="text-end mt-2">
                        🧮 Tổng giá trị: <strong class="text-success">{{ number_format(array_sum($giaTriNhapTheoNgay->toArray()), 0, ',', '.') }} đ</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ trạng thái đơn hàng / nhập -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">📦 Trạng thái đơn hàng</div>
                <div class="card-body">
                    <canvas id="chartDonHang" data-chart='@json($donHangTheoTrangThai)'></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">📦 Trạng thái đơn nhập</div>
                <div class="card-body">
                    <canvas id="chartDonNhap" data-chart='@json($donNhapTheoTrangThai)'></canvas>
                </div>
            </div>
        </div>
    </div>


    <!-- Đánh giá sản phẩm & Xu hướng -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">⭐ Đánh giá sản phẩm</div>
                <div class="card-body">
                    <canvas id="chartDanhGia"
                        data-chart='@json([
                            "Đánh giá cao" => $danhGiaCao,
                            "Đánh giá trung bình" => $tongDanhGia - $danhGiaCao - $danhGiaThap,
                            "Đánh giá thấp" => $danhGiaThap
                        ])'
                        style="height: 150px">
                    </canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">📈 Xu hướng mua hàng theo tháng</div>
                <div class="card-body">
                    <canvas id="chartXuHuong" data-chart='@json($xuHuongMuaHang)' style="height: 150px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Sản phẩm bán chạy -->
    <div class="card mb-4">
        <div class="card-header">🔥 Top sản phẩm bán chạy</div>
        <div class="card-body">
            <ul style="list-style: none; padding-left: 0;">
                @foreach($sanPhamMuaNhieu as $sp)
                <li>🛒 <strong>{{ $sp->ten }}</strong> – {{ $sp->tong_ban }} lượt bán</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Tồn kho nguyên liệu -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>🏗️ Tồn kho nguyên liệu</span>
            <a href="{{ route('congty.thongke.tonkho_chitiet') }}" class="btn btn-sm btn-outline-success ms-2">Chi tiết tồn kho</a>
        </div>
        <div class="card-body">
            <ul style="list-style: none; padding-left: 0;">
                @foreach($tonKhoTongHop as $index => $item)
                <li>
                    📌 <strong class="{{ $index < 3 ? 'text-danger' : '' }}">
                        {{ $item['ten'] }}
                        :
                        {{ $item['tong_ton'] }} {{ $item['don_vi_tinh'] }} </strong>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function renderBarChart(canvasId) {
        const el = document.getElementById(canvasId);
        if (!el) return;
        const data = JSON.parse(el.getAttribute('data-chart'));
        new Chart(el.getContext('2d'), {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Số lượng',
                    data: Object.values(data),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function renderLineChart(canvasId) {
        const el = document.getElementById(canvasId);
        if (!el) return;
        const data = JSON.parse(el.getAttribute('data-chart'));
        new Chart(el.getContext('2d'), {
            type: 'line',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: canvasId.includes('DoanhThu') ? 'Doanh thu (VNĐ)' : 'Giá trị nhập (VNĐ)',
                    data: Object.values(data),
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true
            }
        });
    }

    function renderDoughnutChart(canvasId) {
        const el = document.getElementById(canvasId);
        if (!el) return;
        const data = JSON.parse(el.getAttribute('data-chart'));
        const ctx = el.getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    data: Object.values(data),
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    renderBarChart('chartDonHang');
    renderBarChart('chartDonNhap');
    renderLineChart('chartDoanhThuNgay');
    renderLineChart('chartGiaTriNhapNgay');
    renderLineChart('chartXuHuong');
    renderDoughnutChart('chartDanhGia');
</script>
@endsection