@extends("congty.home.home")

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa người dùng</h3>
    </div>
    <form action="{{ route('congty.user.update', $user->id) }}" method="POST">
        @csrf

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Đã xảy ra lỗi:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="form-group">
                <label for="ten">Tên đăng nhập</label>
                <input type="text" name="ten" class="form-control" value="{{ old('ten', $user->ten) }}" required>
            </div>
            <div class="form-group">
                <label for="ten">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" value="{{ old('ho_ten', $user->ho_ten) }}" required>
            </div>

            <div class="form-group">
                <label for="ten">Căn cước công dân</label>
                <input type="text" name="cccd" class="form-control" value="{{ old('cccd', $user->cccd) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại</label>
                <input type="text" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
            </div>

            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi', $user->dia_chi) }}">
            </div>

            <div class="form-group">
                <label for="mat_khau">Mật khẩu mới (bỏ trống nếu không đổi)</label>
                <input type="password" name="mat_khau" class="form-control">
            </div>

            <div class="form-group">
                <label for="mat_khau_confirmation">Xác nhận mật khẩu</label>
                <input type="password" name="mat_khau_confirmation" class="form-control">
            </div>




        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('congty.user.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
<script>
    const pw = document.getElementById('mat_khau');
    const pwStrength = document.getElementById('pwStrength');
    if (pw) {
        pw.addEventListener('input', function() {
            const val = pw.value;
            if (val.length < 6) {
                pwStrength.innerText = '⚠️ Mật khẩu quá yếu (ít nhất 6 ký tự)';
                pwStrength.classList.add('text-danger');
            } else if (val.length < 8) {
                pwStrength.innerText = 'Mật khẩu tạm ổn';
                pwStrength.classList.remove('text-danger');
            } else {
                pwStrength.innerText = '✅ Mật khẩu mạnh';
                pwStrength.classList.remove('text-danger');
            }
        });
    }
</script>