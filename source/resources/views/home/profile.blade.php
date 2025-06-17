@include('home.header')
<canvas id="seasonCanvas"></canvas>
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h4 class="mb-4 text-primary">👤 Thông tin cá nhân</h4>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" class="mb-5">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" value="{{ $user->ten }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" required value="{{ old('ho_ten', $user->ho_ten) }}">
                @error('ho_ten')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="so_dien_thoai" class="form-control" required value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
                @error('so_dien_thoai')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Căn cước công dân (CCCD)</label>
                <input type="text" name="cccd" class="form-control" required value="{{ old('cccd', $user->cccd) }}">
                @error('cccd')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi', $user->dia_chi) }}">
                @error('dia_chi')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">💾 Lưu thông tin</button>
        </form>

        <h5 class="mb-3 text-danger">🔒 Đổi mật khẩu</h5>
        <button class="btn btn-outline-danger mb-3" data-bs-toggle="modal" data-bs-target="#doiMatKhauModal">
            Thay đổi mật khẩu
        </button>

        <!-- Modal đổi mật khẩu -->
        <div class="modal fade" id="doiMatKhauModal" tabindex="-1" aria-labelledby="doiMatKhauModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('profile.password') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="doiMatKhauModalLabel">🔐 Đổi mật khẩu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" name="mat_khau_cu" class="form-control">
                            @error('mat_khau_cu')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" name="mat_khau_moi" class="form-control">
                            @error('mat_khau_moi')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="mat_khau_moi_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">🔁 Đổi mật khẩu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>


        @include('home.footer')