@extends('giaohang.home.home')

@section('content')
<div class="container">
    <h3>✏️ Sửa thông tin nhân viên giao hàng</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Lỗi!</strong> Vui lòng kiểm tra lại dữ liệu nhập vào.<br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('giaohang.nguoidung.update', $nhanVien->id) }}">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label class="form-label">Vai trò</label>
            <select name="vai_tro" class="form-select" required>
                <option value="thuc_thi" {{ $nhanVien->vai_tro === 'thuc_thi' ? 'selected' : '' }}>Nhân viên</option>
                <option value="giam_doc" {{ $nhanVien->vai_tro === 'giam_doc' ? 'selected' : '' }}>Giám đốc</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">💾 Cập nhật</button>
        <a href="{{ route('giaohang.nguoidung.index') }}" class="btn btn-secondary">⬅️ Quay lại</a>
    </form>
</div>
@endsection