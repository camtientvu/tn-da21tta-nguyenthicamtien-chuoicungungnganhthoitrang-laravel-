@extends("congty.home.home")

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Chi tiết người dùng: {{ $user->ten }}</h4>
        <a href="{{ route('congty.user.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>SĐT:</strong> {{ $user->so_dien_thoai ?? '(chưa có)' }}</p>
        <p><strong>Địa chỉ:</strong> {{ $user->dia_chi ?? '(chưa có)' }}</p>
        <p><strong>Loại người dùng:</strong>
            @switch($user->loai_nguoi_dung)
            @case('nhan_vien_cong_ty') <span class="badge bg-primary">Nhân viên công ty</span> @break
            @case('nhan_vien_nha_cung_cap') <span class="badge bg-warning text-dark">Nhân viên NCC</span> @break
            @case('nhan_vien_giao_hang') <span class="badge bg-info text-dark">Nhân viên giao hàng</span> @break
            @case('khach_hang') <span class="badge bg-success">Khách hàng</span> @break
            @default <span class="badge bg-secondary">Không xác định</span>
            @endswitch
        </p>

        <hr>

        @if ($user->loai_nguoi_dung === 'khach_hang')
        <p><em>Khách hàng không có phân quyền nội bộ.</em></p>
        @else
        <form action="{{ route('congty.user.updateRole', $user->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vai_tro" class="form-label"><strong>Vai trò hiện tại:</strong></label>
                <select name="vai_tro" id="vai_tro" class="form-select" required>
                    @php
                    $roles = match($user->loai_nguoi_dung) {
                    'nhan_vien_cong_ty' => ['san_xuat', 'phe_duyet_giao_hang', 'phe_duyet_kho', 'phe_duyet_san_xuat', 'admin'],
                    'nhan_vien_nha_cung_cap', 'nhan_vien_giao_hang' => ['giam_doc', 'thuc_thi'],
                    default => [],
                    };
                    @endphp

                    @foreach ($roles as $role)
                    <option value="{{ $role }}" {{ $chiTiet->vai_tro === $role ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $role)) }}
                    </option>
                    @endforeach
                </select>
            </div>

            @if($user->loai_nguoi_dung === 'nhan_vien_nha_cung_cap')
            <p><strong>Nhà cung cấp:</strong> {{ $chiTiet->nhaCungCap->ten ?? 'Không rõ' }}</p>
            @endif

            @if($user->loai_nguoi_dung === 'nhan_vien_giao_hang')
            <p><strong>Công ty giao hàng:</strong> {{ $chiTiet->congTyGiaoHang->ten ?? 'Không rõ' }}</p>
            @endif

            <button type="submit" class="btn btn-warning">Cập nhật vai trò</button>
        </form>
        @endif
    </div>
</div>
@endsection