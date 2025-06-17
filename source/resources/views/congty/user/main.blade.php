<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/theme/admin/index2.html" class="h1"><b>Admin</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Đăng nhập tài khoản quản trị</p>
            @include("admin.user.alert")
            <form action="/admin/user/login/store" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
            </form>


            <!-- /.social-auth-links -->


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>