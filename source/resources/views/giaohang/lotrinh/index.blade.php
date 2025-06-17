@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h4>Lộ trình đơn giao hàng #{{ $don->donHang->ma }}</h4>

    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th>Trạng thái</th>
                <th>Mô tả</th>
                <th>Thời gian</th>
                <th>Nhân viên</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($don->loTrinhs as $lt)
            <tr>
                <td>{{ ucfirst(str_replace('_', ' ', $lt->trang_thai)) }}</td>
                <td>{{ $lt->mo_ta }} </td>
                <td>{{ \Carbon\Carbon::parse($lt->thoi_gian)->format('d/m/Y H:i') }}</td>
                <td>{{ $lt->nhanVienGiaoHang->user->ho_ten ?? 'Không rõ' }}</td>
                <td>
                    @if ($lt->trang_thai === 'Đang chuyển')
                    <a href="{{ route('giaohang.lotrinh.edit', $lt->id) }}" class="btn btn-sm btn-warning">✏️ Sửa</a>
                    <form action="{{ route('giaohang.lotrinh.destroy', $lt->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Xóa lộ trình này?')" class="btn btn-sm btn-danger">🗑️ Xóa</button>
                    </form>
                    @else
                    <em>Không thể sửa</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <h5>➕ Thêm lộ trình mới</h5>
    <form method="POST" action="{{ route('giaohang.lotrinh.store', $don->id) }}">
        @csrf
        <input type="hidden" name="id_nhan_vien_giao_hang" value="{{ Auth::user()->nhanVienGiaoHang->id }}">

        <div class="mb-3">
            <label>Trạng thái</label>
            <select name="trang_thai" class="form-select" required>
                <option value="Đang chuyển">Đang chuyển</option>
                <option value="Đã giao">Đã giao</option>
                <option value="Không thành công">Không thành công</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <input type="text" name="mo_ta" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection