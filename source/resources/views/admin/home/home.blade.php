<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.home.header");
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

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
                    <a href="{{route('admin')}}" class="nav-link">Trang chủ</a>
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

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin')}}" class="brand-link">
                <img src="/theme/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">QUẢN TRỊ HỆ THỐNG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/theme/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('dangxuat')}}" class="d-block">{{ auth()->user()->name ?? 'Guest' }}</a>
                    </div>

                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Quản lý tuyển sinh -->
                        <li class="nav-header">QUẢN LÝ TUYỂN SINH</li>

                        <!-- Ngành học -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Ngành học
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('nganh.index') }}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Danh sách ngành</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('nganh.create') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Thêm ngành mới</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Phân mục WebQuest -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Bài viết
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('baiviet.index') }}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Danh sách bài viết ngành</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('baiviet.create') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Thêm bài viết</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Hồ sơ đăng ký -->
                        <li class="nav-item">
                            <a href="{{ route('dangky.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Hồ sơ đăng ký</p>
                            </a>
                        </li>

                        <!-- Đợt tuyển sinh -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-day"></i>
                                <p>
                                    Đợt tuyển sinh
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dot.index') }}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Danh sách đợt</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dot.create') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Thêm đợt mới</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Câu hỏi tư vấn -->
                        <li class="nav-item">
                            <a href="{{ route('cauhoi.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-question-circle"></i>
                                <p>Câu hỏi tư vấn</p>
                            </a>
                        </li>

                        <!-- Người dùng -->
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Người dùng</p>
                            </a>
                        </li>

                        <!-- Báo cáo thống kê -->
                        <li class="nav-item">
                            <a href="{{ route('baocao.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>Thống kê tuyển sinh</p>
                            </a>
                        </li>
                    </ul>


                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @include("admin.home.main")



            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Trang quản lý &copy; 2025-2026 <a href="https://adminlte.io">HỆ THỐNG TUYỂN SINH</a>.</strong>
            All rights reserved.
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
    </script>



    @yield('footer')
</body>

</html>