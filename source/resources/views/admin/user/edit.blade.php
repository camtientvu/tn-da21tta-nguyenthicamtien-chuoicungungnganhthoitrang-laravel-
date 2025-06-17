@extends("admin.home.home")

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa người dùng</h3>
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
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
                <label for="vai_tro">Phân quyền</label>
                <select name="vai_tro" class="form-control" required>
                    <option value="admin" {{ $user->vai_tro == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                    <option value="staff" {{ $user->vai_tro == 'staff' ? 'selected' : '' }}>Nhân viên</option>
                    <option value="student" {{ $user->vai_tro == 'student' ? 'selected' : '' }}>Thí sinh</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection