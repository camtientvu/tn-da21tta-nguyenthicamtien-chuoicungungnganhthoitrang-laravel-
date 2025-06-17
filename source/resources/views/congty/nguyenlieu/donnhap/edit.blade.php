@extends('congty.home.home')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Cập nhật đơn nhập nguyên liệu</h3>

    {{-- Thông báo thành công --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Thông báo lỗi hệ thống --}}
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    {{-- Thông báo lỗi xác thực --}}
    @if ($errors->any())
    <div class="alert alert-warning">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('congty.donnhap.update', $donNhap->id) }}" method="POST">
        @csrf


       

        <div class="form-group mb-3">
            <label>Nhà cung cấp</label>
            <select name="id_nha_cung_cap" class="form-control" required>
                @foreach($nhaCungCaps as $ncc)
                <option value="{{ $ncc->id }}" {{ $donNhap->id_nha_cung_cap == $ncc->id ? 'selected' : '' }}>
                    {{ $ncc->ten }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Ngày nhập</label>
            <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap', $donNhap->ngay_nhap) }}" required>
        </div>



        <div class="form-group mb-4">
            <label>Trạng thái</label>
            <select name="trang_thai" class="form-control" required>
                <option value="Chờ duyệt" {{ $donNhap->trang_thai === 'Chờ duyệt' ? 'selected' : '' }}>Chờ duyệt</option>
                <option value="Đã duyệt" {{ $donNhap->trang_thai === 'Đã duyệt' ? 'selected' : '' }}>Đã duyệt</option>
                <option value="Hoàn thành" {{ $donNhap->trang_thai === 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="Hủy" {{ $donNhap->trang_thai === 'Hủy' ? 'selected' : '' }}>Hủy</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('congty.donnhap.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection