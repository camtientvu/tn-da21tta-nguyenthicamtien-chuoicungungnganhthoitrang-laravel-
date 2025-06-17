<!DOCTYPE html>
<html lang="en">

<head>
    @include("giaohang.home.header")
</head>
<style>
    .sidebar-gradient-redpink {
        background: linear-gradient(135deg, rgb(255, 204, 65), #ff4b2b) !important;
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
</style>

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
                    <a href="{{route('giaohang.home.index')}}" class="nav-link">Trang chủ</a>
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
        <!-- Quản lý tuyển sinh --> @php $user = Auth::user();
        @endphp
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-gradient-redpink">

            <!-- Brand Logo -->
            <a href="" class="brand-link">

                <span class="brand-text font-weight-light text-center">QUẢN TRỊ HỆ THỐNG <br> GIAO HÀNG</span>

                <span class="brand-text font-weight-light text-center">{{ optional($user->nhanVienGiaoHang->congTyGiaoHang)->ten ?? '---' }}</span>

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/theme/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ auth()->user()->ten ?? 'Guest' }}</a>

                        <form action="{{ route('logout') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">Đăng xuất</button>
                        </form>
                    </div>

                </div>







                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-header">QUẢN LÝ HỆ THỐNG GIAO HÀNG</li>




                        @if ($user->nhanVienGiaoHang->vai_tro == 'giam_doc')
                        <!-- Ngành học -->
                        <li class="nav-item">
                            <a href="{{route('giaohang.nguoidung.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Người dùng

                                </p>
                            </a>

                        </li>


                        <!-- Phân mục WebQuest -->
                        <li class="nav-item">
                            <a href="{{route('giaohang.donhang.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Đơn hàng

                                </p>
                            </a>

                        </li>
                        @endif
                        <!-- Phân mục WebQuest -->
                        <li class="nav-item">
                            <a href="{{route('giaohang.lotrinh.cuatoi')}}" class="nav-link">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>
                                    Trung chuyển

                                </p>
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

            @include("giaohang.home.main")



            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Trang quản lý &copy; 2025-2026 <a href="https://adminlte.io">HỆ THỐNG QUẢN LÝ CHUỖI CUNG ỨNG NGÀNH THỜI TRANG</a>.</strong>
            <br> SẢN PHẨM ĐỒ ÁN TỐT NGHIỆP; SINH VIÊN THỰC HIỆN: NGUYỄN THỊ CẨM TIÊN; LỚP DA21TTA; MÃ SỐ SINH VIÊN: 110121114
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


    @yield('scripts')
    @yield('footer')
</body>

</html>