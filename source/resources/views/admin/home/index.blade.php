@extends("admin.home.home")

@section('content')
<div class="container">
    <h1 class="mb-4">BÁO CÁO THỐNG KÊ</h1>

    <!-- Tổng quan -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow text-white bg-primary mb-4">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-boxes me-2"></i>
                    <span>Tổng số đơn hàng</span>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title display-4" id="tongDon">{{ $tongDon }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow text-white bg-success mb-4">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-coins me-2"></i>
                    <span>Tổng doanh thu</span>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title display-4" id="tongDoanhThu">{{ number_format($tongDoanhThu, 2) }} ₤</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Bộ lọc -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form id="filterForm">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="from" class="form-label">
                                    <i class="fas fa-calendar-alt me-1"></i> Từ ngày:
                                </label>
                                <input type="date" id="from" name="from" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">
                                    <i class="fas fa-calendar-check me-1"></i> Đến ngày:
                                </label>
                                <input type="date" id="to" name="to" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="to" class="form-label">
                                    <i class="fas fa-filter1 me-1"></i>
                                </label>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-1"></i> Lọc
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Biểu đồ -->
    <div class="row">
        <div class="col-md-8">
            <canvas id="lineChart" data-trangthai="{{ $trangThai }}"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="pieChart" data-trangthai="{{ $trangThai }}"></canvas>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.getElementById('filterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const from = document.getElementById('from').value;
        const to = document.getElementById('to').value;

        fetch("{{ route('baocao.filter') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    from,
                    to
                })
            })
            .then(response => response.json())
            .then(data => {
                // Cập nhật tổng quan
                document.getElementById('tongDon').textContent = data.tongDon;
                document.getElementById('tongDoanhThu').textContent = new Intl.NumberFormat().format(data.tongDoanhThu) + ' VNĐ';

                // Cập nhật biểu đồ
                updateCharts(data.trangThai);
            });
    });

    let lineChart, pieChart;

    function renderCharts(data) {
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const ctxPie = document.getElementById('pieChart').getContext('2d');

        // Biểu đồ đường
        lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: data.map(item => item.trang_thai),
                datasets: [{
                    label: 'Số lượng đơn hàng',
                    data: data.map(item => item.so_luong),
                    borderColor: 'blue',
                    borderWidth: 2
                }]
            },
        });

        // Biểu đồ tròn
        pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: data.map(item => item.trang_thai),
                datasets: [{
                    data: data.map(item => item.so_luong),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#FF9F40']
                }]
            },
        });
    }

    // Lấy dữ liệu từ thuộc tính data-trangthai và chuyển thành đối tượng JavaScript
    const trangThaiData = JSON.parse(document.getElementById('lineChart').getAttribute('data-trangthai'));
    renderCharts(trangThaiData);
</script>
@endsection