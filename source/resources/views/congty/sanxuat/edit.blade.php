@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Sửa đơn sản xuất</h3>

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('congty.don-san-xuat.update', $don->id) }}" method="POST">
        @csrf
        {{-- Nếu dùng POST cho update thì cần thêm method spoofing --}}
        @method('POST')


        <div class="mb-3">
            <label class="form-label">Sản phẩm</label>
            <select name="id_san_pham" class="form-select" required>
                <option value="">-- Chọn sản phẩm --</option>
                @foreach($sanPhams as $sp)
                <option value="{{ $sp->id }}" {{ (old('id_san_pham', $don->id_san_pham ?? '') == $sp->id) ? 'selected' : '' }}>
                    {{ $sp->ten }}
                </option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label>Ngày bắt đầu</label>
            <input type="date" name="ngay_bat_dau" class="form-control"
                value="{{ old('ngay_bat_dau', \Carbon\Carbon::parse($don->ngay_bat_dau)->format('Y-m-d')) }}" required>

        </div>

        <div class="form-group">
            <label>Ngày kết thúc</label>
            <input type="date" name="ngay_ket_thuc" class="form-control"
                value="{{ old('ngay_ket_thuc', \Carbon\Carbon::parse($don->ngay_ket_thuc)->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label>Trạng thái</label>
            <select name="trang_thai" class="form-control" required>
                <option value="Chờ duyệt" {{ old('trang_thai', $don->trang_thai) == 'Chờ duyệt' ? 'selected' : '' }}>Chờ duyệt</option>
                <option value="Đang sản xuất" {{ old('trang_thai', $don->trang_thai) == 'Đang sản xuất' ? 'selected' : '' }}>Đang sản xuất</option>
                <option value="Hoàn thành" {{ old('trang_thai', $don->trang_thai) == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="Hủy" {{ old('trang_thai', $don->trang_thai) == 'Hủy' ? 'selected' : '' }}>Hủy</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('congty.don-san-xuat.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection