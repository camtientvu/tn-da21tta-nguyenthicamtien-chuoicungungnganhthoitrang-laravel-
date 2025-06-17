@extends("congty.home.home")

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm người dùng</h3>
    </div>
    <form action="{{ route('congty.user.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Lỗi nhập dữ liệu:</strong>
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
                <input type="text" name="ten" class="form-control" value="{{ old('ten') }}" required>
            </div>
            <div class="form-group">
                <label for="ten">Họ và tên</label>
                <input type="text" name="ho_ten" class="form-control" value="{{ old('ho_ten') }}" required>
            </div>
            <div class="form-group">
                <label for="ten">Căn cước công dân</label>
                <input type="text" name="cccd" class="form-control" value="{{ old('cccd') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="mat_khau">Mật khẩu</label>
                <input type="password" name="mat_khau" id="mat_khau" class="form-control" required>
                <small id="pwStrength" class="text-muted"></small>
            </div>


            <div class="form-group">
                <label for="mat_khau_confirmation">Xác nhận mật khẩu</label>
                <input type="password" name="mat_khau_confirmation" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại</label>
                <input type="number" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai') }}">
            </div>

            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi') }}">
            </div>

            <div class="form-group">
                <label for="loai_nguoi_dung">Loại người dùng</label>
                <select name="loai_nguoi_dung" id="loai_nguoi_dung" class="form-control" required>
                    <option value="">-- Chọn loại --</option>
                    <option value="khach_hang" {{ old('loai_nguoi_dung') == 'khach_hang' ? 'selected' : '' }}>Khách hàng</option>
                    <option value="nhan_vien_cong_ty" {{ old('loai_nguoi_dung') == 'nhan_vien_cong_ty' ? 'selected' : '' }}>Nhân viên công ty</option>
                    <option value="nhan_vien_nha_cung_cap" {{ old('loai_nguoi_dung') == 'nhan_vien_nha_cung_cap' ? 'selected' : '' }}>Nhân viên nhà cung cấp</option>
                    <option value="nhan_vien_giao_hang" {{ old('loai_nguoi_dung') == 'nhan_vien_giao_hang' ? 'selected' : '' }}>Nhân viên giao hàng</option>
                </select>
            </div>

            <div class="form-group d-none" id="nha_cung_cap_group">
                <label for="id_nha_cung_cap">Nhà cung cấp</label>
                <select name="id_nha_cung_cap" class="form-control">
                    <option value="">-- Chọn nhà cung cấp --</option>
                    @foreach($nhaCungCaps as $ncc)
                    <option value="{{ $ncc->id }}" {{ old('id_nha_cung_cap') == $ncc->id ? 'selected' : '' }}>{{ $ncc->ten }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group d-none" id="cong_ty_giao_hang_group">
                <label for="id_cong_ty_giao_hang">Công ty giao hàng</label>
                <select name="id_cong_ty_giao_hang" class="form-control">
                    <option value="">-- Chọn công ty giao hàng --</option>
                    @foreach($congTyGiaoHangs as $ctgh)
                    <option value="{{ $ctgh->id }}" {{ old('id_cong_ty_giao_hang') == $ctgh->id ? 'selected' : '' }}>{{ $ctgh->ten }}</option>
                    @endforeach
                </select>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Thêm mới</button>
            <a href="{{ route('congty.user.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function toggleFields() {
        const selected = document.getElementById('loai_nguoi_dung').value;
        const nhaCC = document.getElementById('nha_cung_cap_group');
        const ctyGH = document.getElementById('cong_ty_giao_hang_group');

        if (selected === 'nhan_vien_nha_cung_cap') {
            nhaCC.classList.remove('d-none');
            ctyGH.classList.add('d-none');
        } else if (selected === 'nhan_vien_giao_hang') {
            ctyGH.classList.remove('d-none');
            nhaCC.classList.add('d-none');
        } else {
            nhaCC.classList.add('d-none');
            ctyGH.classList.add('d-none');
        }
    }

    document.getElementById('loai_nguoi_dung').addEventListener('change', toggleFields);
    document.addEventListener('DOMContentLoaded', toggleFields);
</script>
<script>
    document.getElementById('mat_khau').addEventListener('input', function() {
        const pw = this.value;
        const msg = document.getElementById('pwStrength');
        if (pw.length < 6) {
            msg.innerText = '⚠️ Mật khẩu quá yếu (tối thiểu 6 ký tự)';
            msg.classList.add('text-danger');
        } else if (pw.length < 8) {
            msg.innerText = 'Mật khẩu tạm ổn';
            msg.classList.remove('text-danger');
        } else {
            msg.innerText = '✅ Mật khẩu mạnh';
            msg.classList.remove('text-danger');
        }
    });
</script>

@endsection