@extends("giaohang.home.home")

@section('content')
<div class="container">
    <h1 class="mb-4">BÁO CÁO GIAO HÀNG</h1>

    <!-- Bộ lọc + Export -->
    <form id="filterForm">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Từ ngày:</label>
                <input type="date" id="from" name="from" class="form-control" value="{{ $tuNgay }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Đến ngày:</label>
                <input type="date" id="to" name="to" class="form-control" value="{{ $denNgay }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Trạng thái:</label>
                <select id="trang_thai" name="trang_thai" class="form-select">
                    <option value="">-- Tất cả --</option>
                    <option value="Chờ duyệt">Chờ duyệt</option>
                    <option value="Đang giao">Đang giao</option>
                    <option value="Đã giao">Đã giao</option>
                    <option value="Hủy">Đã huỷ</option>
                </select>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-filter me-1"></i> Lọc
                </button>
            </div>
            <div class="col-md-3">
                <a href="{{ route('giaohang.baocao.export.pdf', ['tu_ngay' => $tuNgay, 'den_ngay' => $denNgay]) }}" class="btn btn-danger w-100" target="_blank">
                    <i class="fas fa-file-pdf me-1"></i> In PDF
                </a>
            </div>
        </div>
    </form>

    <!-- Tổng quan -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow bg-success text-white mb-4">
                <div class="card-header"><i class="fas fa-clipboard-list me-1"></i> Tổng số đơn giao</div>
                <div class="card-body text-center">
                    <h2 id="tongDon">{{ $tongDon ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow bg-info text-white mb-4">
                <div class="card-header"><i class="fas fa-coins me-1"></i> Tổng doanh thu</div>
                <div class="card-body text-center">
                    <h2 id="tongDoanhThu">{{ number_format($tongDoanhThu ?? 0, 0, ',', '.') }} đ</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ -->
    <div class="row">
        <div class="col-md-8 mb-4">
            <canvas id="lineChart" data-trangthai="{{ json_encode($trangThai ?? []) }}"></canvas>
        </div>
        <div class="col-md-4 mb-4">
            <canvas id="pieChart" data-trangthai="{{ json_encode($trangThai ?? []) }}"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const form = document.getElementById('filterForm');
    const tongDonEl = document.getElementById('tongDon');
    const tongDoanhThuEl = document.getElementById('tongDoanhThu');
    const lineChartEl = document.getElementById('lineChart');
    const pieChartEl = document.getElementById('pieChart');

    let lineChart, pieChart;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const from = document.getElementById('from').value;
        const to = document.getElementById('to').value;
        const trangThai = document.getElementById('trang_thai').value;

        try {
            const res = await fetch("{{ route('giaohang.baocao.filter') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    from,
                    to,
                    trang_thai: trangThai
                })
            });

            const data = await res.json();

            if (!res.ok) {
                alert(data.error || 'Lỗi khi lọc dữ liệu.');
                return;
            }

            tongDonEl.textContent = data.tongDon ?? 0;
            tongDoanhThuEl.textContent = (data.tongDoanhThu ?? 0).toLocaleString('vi-VN') + ' đ';
            updateCharts(data.trangThai ?? []);
        } catch (err) {
            console.error(err);
            alert('Không thể kết nối đến máy chủ.');
        }
    });

    function updateCharts(data) {
        if (lineChart) lineChart.destroy();
        if (pieChart) pieChart.destroy();
        renderCharts(data);
    }

    function renderCharts(data) {
        const labels = data.map(item => item.trang_thai);
        const values = data.map(item => item.so_luong);

        const ctxLine = lineChartEl.getContext('2d');
        const ctxPie = pieChartEl.getContext('2d');

        lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    label: 'Trạng thái đơn giao',
                    data: values,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)'
                }]
            },
            options: {
                responsive: true
            }
        });

        pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels,
                datasets: [{
                    data: values,
                    backgroundColor: ['#4e73df', '#1cc88a', '#e74a3b']
                }]
            },
            options: {
                responsive: true
            }
        });
    }

    const initialData = JSON.parse(lineChartEl.getAttribute('data-trangthai') || '[]');
    if (initialData.length) renderCharts(initialData);
</script>
@endsection