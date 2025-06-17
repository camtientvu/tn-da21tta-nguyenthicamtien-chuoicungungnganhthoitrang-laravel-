@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Thêm đơn nhập nguyên liệu</h3>
    {{-- Hiển thị lỗi validate --}}
    @if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('congty.donnhap.store') }}" method="POST">
        @csrf

        

        <div class="form-group">
            <label>Nhà cung cấp</label>
            <select name="id_nha_cung_cap" class="form-control" required>
                <option value="">-- Chọn nhà cung cấp --</option>
                @foreach($nhaCungCaps as $ncc)
                <option value="{{ $ncc->id }}" {{ old('id_nha_cung_cap') == $ncc->id ? 'selected' : '' }}>
                    {{ $ncc->ten }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Ngày nhập</label>
            <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap') }}" required>
        </div>





        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('congty.donnhap.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection