<!DOCTYPE html>
<html lang="en">

<head>
    @include("congty.home.header")
</head>
<style>
    .sidebar-gradient-redpink {
        background: linear-gradient(135deg, #ff416c, #ff4b2b) !important;
        /* đỏ hồng chuyển sắc */
        color: white;
    }

    .sidebar-gradient-redpink .brand-link,
    .sidebar-gradient-redpink .nav-link,
    .sidebar-gradient-redpink .user-panel a,
    .sidebar-gradient-redpink .nav-icon {
        color: white !important;
    }

    .sidebar-gradient-redpink .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .sidebar-gradient-redpink .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    html, body {
    height: 100%;
    margin: 0;
}

.wrapper {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}

.content-wrapper {
    flex: 1;
    padding-bottom: 60px; /* chừa chỗ cho footer */
}

.main-footer {
    height: 70px;
    background-color: #f4f6f9;
    padding: 10px 20px;
    font-size: 16px;
    text-align: left;
    z-index: 10;
}

</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!--canvas-->
   <!-- <canvas id="seasonCanvas"></canvas> -->
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/theme/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('congty.home.index')}}" class="nav-link">Trang chủ</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
        @php $user = Auth::user();
        @endphp
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-gradient-redpink">

            <a href="#" class="brand-link">
                @php
                $role = $user->nhanVienCongTy->vai_tro ?? 'khong_rõ';

                $info = match ($role) {
                'admin' => ['label' => 'QUẢN TRỊ TỐI CAO', 'icon' => 'fa-user-shield'],
                'phe_duyet_san_xuat' => ['label' => 'QUẢN TRỊ PHÂN HỆ GIAI ĐOẠN SẢN XUẤT', 'icon' => 'fa-diagram-project'],
                'san_xuat' => ['label' => 'QUẢN LÝ SẢN XUẤT', 'icon' => 'fa-industry'],
                'phe_duyet_giao_hang' => ['label' => 'QUẢN TRỊ GIAO HÀNG', 'icon' => 'fa-shipping-fast'],
                'phe_duyet_kho' => ['label' => 'QUẢN TRỊ KHO', 'icon' => 'fa-warehouse'],
                default => ['label' => 'NHÂN VIÊN CÔNG TY', 'icon' => 'fa-user'],
                };
                @endphp

                <span class="brand-text font-weight-bold text-uppercase">
                    <i class="fas {{ $info['icon'] }} me-2"></i> {{ $info['label'] }}
                </span>
            </a>



            <!-- Sidebar -->
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-start text-white text-center ">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-circle fa-lg me-3"></i>
                        <span class="fw-bold"> {{ auth()->user()->ten ?? 'Guest' }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Đăng xuất</button>
                    </form>
                </div>







                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Quản lý hệ thống -->
                        <li class="nav-header">QUẢN LÝ HỆ THỐNG</li>

                        @if ($user->nhanVienCongTy->vai_tro == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('congty.user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Người dùng

                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{ route('congty.nhacungcap.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    Nhà cung cấp

                                </p>
                            </a>

                        </li>
                        @endif

                        @if ($user->nhanVienCongTy->vai_tro == 'admin' )

                        <li class="nav-item">
                            <a href="{{ route('congty.congtygiaohang.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shipping-fast"></i>
                                <p>
                                    Công ty giao hàng

                                </p>
                            </a>

                        </li>

                        @endif
                        @if ($user->nhanVienCongTy->vai_tro == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('congty.danhmuc.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Danh mục

                                </p>
                            </a>

                        </li>



                        <li class="nav-item">
                            <a href="{{ route('congty.sanpham.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Sản phẩm

                                </p>
                            </a>

                        </li>
                        @endif

                        @if ($user->nhanVienCongTy->vai_tro == 'admin' || $user->nhanVienCongTy->vai_tro == 'phe_duyet_kho')
                        <li class="nav-item">
                            <a href="{{ route('congty.donnhap.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    Đơn nhập nguyên liệu

                                </p>
                            </a>

                        </li>
                        @endif
                        @if ($user->nhanVienCongTy->vai_tro == 'admin' || $user->nhanVienCongTy->vai_tro == 'san_xuat' || $user->nhanVienCongTy->vai_tro == 'phe_duyet_san_xuat')
                        <li class="nav-item">
                            <a href="{{ route('congty.don-san-xuat.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p>
                                    Đơn sản xuất

                                </p>
                            </a>

                        </li>
                        @endif
                        @if ($user->nhanVienCongTy->vai_tro == 'admin' || $user->nhanVienCongTy->vai_tro == 'phe_duyet_giao_hang')
                        <li class="nav-item">
                            <a href="{{ route('congty.donhang.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Đơn hàng

                                </p>
                            </a>

                        </li>

                        @endif
                    </ul>


                </nav>

            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @include("congty.home.main")



            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Trang quản lý &copy; 2025-2026 <a href="https://adminlte.io">HỆ THỐNG QUẢN LÝ CHUỖI CUNG ỨNG NGÀNH THỜI TRANG</a>.</strong>
            <br> SẢN PHẨM ĐỒ ÁN TỐT NGHIỆP; SINH VIÊN THỰC HIỆN: NGUYỄN THỊ CẨM TIÊN; LỚP: DA21TTA; MÃ SỐ SINH VIÊN: 110121114
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


<!--Canvas
<script>
    const canvas = document.getElementById('seasonCanvas');
    const ctx = canvas.getContext('2d');
    let width = window.innerWidth;
    let height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;

    const season = getCurrentSeason();
    const particles = [];
    const splashes = [];
    const total = 100;

    function getCurrentSeason() {
        const month = new Date().getMonth() + 1;
        if ([3, 4, 5].includes(month)) return 'spring';
        if ([7, 8].includes(month)) return 'summer';
        if ([  9, 10, 11, 6].includes(month)) return 'autumn';
        return 'winter';
    }

    function createParticles() {
        for (let i = 0; i < total; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                size: Math.random() * 6 + 4,
                speedY: season === 'summer' ? Math.random() * 6 + 6 : Math.random() * 1.5 + 0.5,
                speedX: season === 'summer' ? (Math.random() - 0.5) * 2 : (Math.random() * 1 - 0.5),
                angle: Math.random() * 360,
                rotateSpeed: Math.random() * 2 - 1,
                opacity: Math.random() * 0.8 + 0.2
            });
        }
    }

    function drawParticles() {
        ctx.clearRect(0, 0, width, height);
        for (let p of particles) {
            ctx.save();
            ctx.globalAlpha = p.opacity;
            ctx.translate(p.x, p.y);
            ctx.rotate((p.angle * Math.PI) / 180);

            switch (season) {
                case 'spring':
                    drawPetal(p.size);
                    break;
                case 'summer':
                    drawRain(p.size);
                    break;
                case 'autumn':
                    drawLeaf(p.size);
                    break;
                case 'winter':
                    drawSnow(p.size);
                    break;
            }

            ctx.restore();
        }

        drawSplashes();
        moveParticles();
    }

    function drawPetal(size) {
        ctx.fillStyle = '#ff69b4';
        ctx.beginPath();
        ctx.ellipse(0, 0, size / 2, size, 0, 0, 2 * Math.PI);
        ctx.fill();
    }

    function drawRain(size) {
        ctx.strokeStyle = '#6ec6ff';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(3, size * 3); // mưa xiên
        ctx.stroke();
    }

    function drawLeaf(size) {
        ctx.fillStyle = '#ffa500';
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.quadraticCurveTo(size, size * 1.5, 0, size * 3);
        ctx.quadraticCurveTo(-size, size * 1.5, 0, 0);
        ctx.fill();
    }

    function drawSnow(size) {
        ctx.fillStyle = '#ffffff';
        ctx.beginPath();
        ctx.arc(0, 0, size / 2, 0, Math.PI * 2);
        ctx.fill();
    }

    function moveParticles() {
        for (let p of particles) {
            p.y += p.speedY;
            p.x += p.speedX;
            p.angle += p.rotateSpeed;

            if (p.y > height) {
                if (season === 'summer') {
                    createSplash(p.x, height);
                }
                p.y = -10;
                p.x = Math.random() * width;
            }
        }

        for (let i = splashes.length - 1; i >= 0; i--) {
            const s = splashes[i];
            s.radius += 0.5;
            s.alpha -= 0.02;
            if (s.alpha <= 0) splashes.splice(i, 1);
        }
    }

    function createSplash(x, y) {
        splashes.push({
            x: x,
            y: y - 2,
            radius: 1,
            alpha: 0.5
        });
    }

    function drawSplashes() {
        for (let s of splashes) {
            ctx.beginPath();
            ctx.arc(s.x, s.y, s.radius, 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(110, 198, 255, ${s.alpha})`;
            ctx.lineWidth = 1;
            ctx.stroke();
        }
    }

    function animate() {
        drawParticles();
        requestAnimationFrame(animate);
    }

    window.addEventListener('resize', () => {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width;
        canvas.height = height;
    });

    // ⚡️ Summer lightning & rainbow
    if (season === 'summer') {
        function drawLightning() {
            const startX = Math.random() * width;
            let x = startX,
                y = 0;

            ctx.strokeStyle = '#ffffff';
            ctx.lineWidth = 2.5;
            ctx.shadowBlur = 15;
            ctx.shadowColor = '#ffffff';

            ctx.beginPath();
            ctx.moveTo(x, y);

            while (y < height / 1.5) {
                const dx = (Math.random() - 0.5) * 30;
                const dy = Math.random() * 30;
                x += dx;
                y += dy;
                ctx.lineTo(x, y);
            }

            ctx.stroke();

            drawRainbow();
            document.body.style.backgroundColor = 'rgba(255,255,255,0.1)';
            setTimeout(() => document.body.style.backgroundColor = '', 150);
        }

        function drawRainbow() {
            const gradient = ctx.createLinearGradient(0, height / 2, width, height / 2);
            gradient.addColorStop(0, 'rgba(255, 0, 0, 0.2)');
            gradient.addColorStop(0.2, 'rgba(255, 165, 0, 0.2)');
            gradient.addColorStop(0.4, 'rgba(255, 255, 0, 0.2)');
            gradient.addColorStop(0.6, 'rgba(0, 255, 0, 0.2)');
            gradient.addColorStop(0.8, 'rgba(0, 0, 255, 0.2)');
            gradient.addColorStop(1, 'rgba(128, 0, 128, 0.2)');

            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(width / 2, height, width / 1.5, Math.PI, Math.PI * 2);
            ctx.fill();
        }

        setInterval(() => {
            if (Math.random() < 0.4) drawLightning();
        }, 5000);
    }

    createParticles();
    animate();
</script>
-->
    <!-- jQuery -->
    <script src="/theme/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/theme/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->

    <!-- Sparkline -->
    <script src="/theme/admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/theme/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/theme/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/theme/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/theme/admin/plugins/moment/moment.min.js"></script>
    <script src="/theme/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/theme/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/theme/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/theme/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/theme/admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/theme/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/theme/admin/dist/js/pages/dashboard.js"></script>





    <!-- DataTables  & Plugins -->
    <script src="/theme/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/theme/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/theme/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/theme/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/theme/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/theme/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/theme/admin/plugins/jszip/jszip.min.js"></script>
    <script src="/theme/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/theme/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/theme/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/theme/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/theme/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/theme/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/theme/admin/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <style>
        .dataTables_filter input {
            width: 300px;
            /* Set the width of the search box */
            padding: 8px;
            /* Add some padding */
            border: 1px solid #ccc;
            /* Border color */
            border-radius: 4px;
            /* Rounded corners */
            font-size: 14px;
            /* Font size */
        }

        .dataTables_filter {
            margin-bottom: 10px;
            /* Space below the filter */
        }
        
        
.brand-text {
    white-space: normal !important;
    word-break: break-word;
    font-size: 16px;
    line-height: 1.3;
}

.brand-link {
    white-space: normal !important;
    overflow: visible !important;
}

    </style>

    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true, // Allow changing the number of rows displayed
                "pageLength": 10, // Display 5 rows per page by default
                "searching": true, // Enable search box
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "zeroRecords": "Không tìm thấy kết quả",
                    "info": "Hiển thị trang _PAGE_ trên _PAGES_",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(lọc từ _MAX_ mục)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối cùng",
                        "next": "Tiếp theo",
                        "previous": "Trước đó"
                    }
                }
            });
        });


        $(function() {
            $('#example3').DataTable({
                "paging": true,
                "lengthChange": true, // Allow changing the number of rows displayed
                "pageLength": 10, // Display 5 rows per page by default
                "searching": true, // Enable search box
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "zeroRecords": "Không tìm thấy kết quả",
                    "info": "Hiển thị trang _PAGE_ trên _PAGES_",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(lọc từ _MAX_ mục)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối cùng",
                        "next": "Tiếp theo",
                        "previous": "Trước đó"
                    }
                }
            });
        });
    </script>


    @yield('scripts')
    @yield('footer')
</body>

</html>