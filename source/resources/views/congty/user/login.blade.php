<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Đăng nhập' }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/theme/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/theme/admin/plugins/bootstrap/css/bootstrap.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="/theme/admin/dist/css/adminlte.min.css">

    <style>
        body {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            /* đỏ hồng */
            font-family: 'Quicksand', sans-serif;
        }

        .login-container {
            height: 100vh;
        }

        .login-box {
            max-width: 450px;
            margin: auto;
        }

        .login-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 5px 30px rgba(0, 0, 0, 0.2);
        }

        .login-card-header {
            background-color: #fff;
            text-align: center;
            padding: 30px 20px 10px;
        }

        .login-card-header h1 {
            font-weight: 600;
            color: #ff416c;
            margin-bottom: 0;
        }

        .login-card-body {
            background-color: #ffffff;
            padding: 30px;
        }

        .login-card-body .form-control {
            border-radius: 10px;
        }

        .login-card-body .btn {
            border-radius: 10px;
            background-color: #ff416c;
            border-color: #ff416c;
        }

        .login-card-body .btn:hover {
            background-color: #ff2e5e;
            border-color: #ff2e5e;
        }

        .login-footer {
            text-align: center;
            font-size: 0.9rem;
            color: #eee;
            margin-top: 20px;
        }

        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container login-container d-flex align-items-center justify-content-center">
        <div class="login-box w-100">
            <div class="card login-card">
                <div class="login-card-header">
                    <h1><i class="fas fa-university"></i> Hệ thống</h1>
                    <p class="text-muted mb-0">{{ $subtitle ?? 'Đăng nhập tài khoản' }}</p>
                </div>
                <div class="login-card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên đăng nhập</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên đăng nhập" required>
                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu" required>
                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký tại đây</a>
                        </div>

                        <button type="submit" class="btn btn-block text-white">
                            <i class="fas fa-sign-in-alt mr-1"></i> Đăng nhập
                        </button>

                    </form>
                </div>
            </div>
            <div class="login-footer">
                &copy; {{ date('Y') }} Hệ thống quản trị. Mọi quyền được bảo lưu.
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/theme/admin/plugins/jquery/jquery.min.js"></script>
    <script src="/theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/theme/admin/dist/js/adminlte.min.js"></script>
</body>

</html>