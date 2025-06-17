@extends("congty.home.home")

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $title }}</h3>
        <a href="{{ route('congty.nhacungcap.create') }}" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Thêm nhà cung cấp
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
                    <th>Tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Ngày tạo</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nhacungcaps as $index => $ncc)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $ncc->id }}</td>
                    <td>{{ $ncc->ten }}</td>
                    <td>{{ $ncc->email }}</td>
                    <td>{{ $ncc->so_dien_thoai }}</td>
                    <td>{{ $ncc->dia_chi }}</td>
                    <td class="text-center">{{ $ncc->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-center">
                        <a href="{{ route('congty.nhacungcap.edit', $ncc->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('congty.nhacungcap.destroy', $ncc->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa nhà cung cấp này?')">
                            @csrf
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if ($nhacungcaps->isEmpty())
                <tr>
                    <td colspan="9" class="text-center text-muted">Không có nhà cung cấp nào.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection