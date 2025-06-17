@extends("congty.home.home")

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $title }}</h3>
        <a href="{{ route('congty.user.create') }}" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm người dùng
        </a>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-success m-3">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead class="table-danger text-center">
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ và tên</th>
                    <th>CCCD</th>
                    <th>Thông tin</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    <th>Xem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->ten }}</td>
                    <td>{{ $user->ho_ten }}</td>
                    <td>{{ $user->cccd }}</td>
                    <td class="text-center">
                        @switch($user->loai_nguoi_dung)
                        @case('nhan_vien_cong_ty')
                        <span class="badge bg-danger text-dark d-block text-start p-2">

                            <strong>NV Công ty</strong><br>
                            <small class="text-white fst-italic">
                                @switch($user->nhanVienCongTy->vai_tro)
                                @case('admin')
                                Quản lý
                                @break
                                @case('san_xuat')
                                Nhân viên quản lý sản xuất
                                @break
                                @case('phe_duyet_giao_hang')
                                Nhân Viên duyệt giao hàng
                                @break
                                @case('phe_duyet_kho')
                                Nhân viên duyệt nhập kho
                                @break
                                @case('phe_duyet_san_xuat')
                                Nhân viên xác nhận sản xuất
                                @break
                                @default
                                Nhân viên
                                @endswitch
                            </small>
                        </span>
                        @break

                        @case('nhan_vien_nha_cung_cap')
                        <span class="badge bg-warning text-dark d-block text-start p-2">
                            <strong>NV NCC</strong><br>
                            {{ $user->nhanVienNhaCungCap->nhaCungCap->ten ?? 'Chưa rõ' }}<br>
                            <small class="text-dark fst-italic">
                                {{ $user->nhanVienNhaCungCap->vai_tro == 'giam_doc' ? 'Giám đốc' : 'Nhân viên' }}
                            </small>
                        </span>
                        @break

                        @case('nhan_vien_giao_hang')
                        <span class="badge bg-info text-dark d-block text-start p-2">
                            <strong>NV Giao hàng</strong><br>
                            {{ $user->nhanVienGiaoHang->congTyGiaoHang->ten ?? 'Chưa rõ' }}<br>
                            <small class="text-white fst-italic">
                                {{ $user->nhanVienGiaoHang->vai_tro == 'giam_doc' ? 'Giám đốc' : 'Nhân viên' }}
                            </small>
                        </span>
                        @break


                        @case('khach_hang')
                        <span class="badge bg-success">Khách hàng</span>
                        @break

                        @default
                        <span class="badge bg-secondary">Không rõ</span>
                        @endswitch

                    </td>

                    <td class="text-center">
                        <a href="{{ route('congty.user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{route('congty.user.destroy')}}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?')">
                            @csrf

                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('congty.user.show', $user->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Xem
                        </a>
                    </td>
                </tr>
                @endforeach

                @if ($users->isEmpty())
                <tr>
                    <td colspan="9" class="text-center text-muted">Không có người dùng nào.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection