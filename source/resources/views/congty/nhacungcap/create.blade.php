@extends("congty.home.home")

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm nhà cung cấp</h3>
    </div>
    <form action="{{ route('congty.nhacungcap.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
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
                <label for="ten">Tên nhà cung cấp</label>
                <input type="text" name="ten" class="form-control" value="{{ old('ten') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email liên hệ</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại</label>
                <input type="text" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai') }}">
            </div>

            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi') }}">
            </div>

            <div class="form-group">
                <label for="ghi_chu">Ghi chú</label>
                <textarea name="ghi_chu" class="form-control" rows="3">{{ old('ghi_chu') }}</textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Thêm mới</button>
            <a href="{{ route('congty.nhacungcap.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection