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
<div class="container login-container d-flex align-items-center justify-content-center">
    <div class="login-box w-100">
        <div class="card login-card">
            <div class="login-card-header">
                <h1><i class="fas fa-user-plus"></i> Đăng ký</h1>
                <p class="text-muted mb-0">Tạo tài khoản khách hàng</p>
            </div>
            <div class="login-card-body">
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="ten">Tên đăng nhập</label>
                        <input type="text" name="ten" class="form-control @error('ten') is-invalid @enderror" value="{{ old('ten') }}" required>
                        @error('ten')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ten">Họ và tên</label>
                        <input type="text" name="ho_ten" class="form-control @error('ho_ten') is-invalid @enderror" value="{{ old('ho_ten') }}" required>
                        @error('ten')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="so_dien_thoai">Căn cước công dân</label>
                        <input type="text" name="cccd" class="form-control @error('cccd') is-invalid @enderror" value="{{ old('cccd') }}" required>
                        @error('cccd')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mat_khau">Mật khẩu</label>
                        <input type="password" name="mat_khau" class="form-control @error('mat_khau') is-invalid @enderror" required>
                        @error('mat_khau')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mat_khau_confirmation">Xác nhận mật khẩu</label>
                        <input type="password" name="mat_khau_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="so_dien_thoai">Số điện thoại</label>
                        <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" value="{{ old('so_dien_thoai') }}" required>
                        @error('so_dien_thoai')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ</label>
                        <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi') }}">
                    </div>

                    <button type="submit" class="btn btn-block text-white">
                        <i class="fas fa-user-plus mr-1"></i> Đăng ký
                    </button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">&#8592; Đã có tài khoản? Đăng nhập</a>
                </div>
            </div>
        </div>
        <div class="login-footer">
            &copy; {{ date('Y') }} Hệ thống quản trị. Mọi quyền được bảo lưu.
        </div>
    </div>
</div>