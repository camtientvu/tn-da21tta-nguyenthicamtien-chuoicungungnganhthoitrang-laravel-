@extends('congty.home.home')

@section('content')
<div class="container">
    <h3>Thêm Nguyên Liệu cho Đơn Sản Xuất #{{ $don->id }}</h3>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('congty.don-san-xuat.nguyenlieu.store', $don->id) }}" method="POST">
        @csrf

        <div class="mb-3">

            <label for="nguyen_lieu" class="form-label">Chọn loại nguyên liệu</label>
            <select id="nguyen_lieu" class="form-select" onchange="locLoTheoNguyenLieu()">
                <option value="">-- Chọn nguyên liệu --</option>
                @foreach($nguyenLieus as $nl)
                <option value="{{ $nl->id }}">
                    {{ $nl->ten }} ({{ $nl->loai_nguyen_lieu }}) - {{ $nl->nhaCungCap->ten }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_lo_nguyen_lieu" class="form-label">Chọn Lô Nguyên Liệu</label>
            <select name="id_lo_nguyen_lieu" id="id_lo_nguyen_lieu" class="form-select" required onchange="updateSoLuongToiDa()">
                <option value="">-- Chọn lô --</option>
                @foreach($loNguyenLieus as $lo)
                @php
                $conLai = $lo->so_luong_nhap - $lo->so_luong_su_dung;
                @endphp
                <option
                    value="{{ $lo->id }}"
                    data-conlai="{{ $conLai }}"
                    data-nguyenlieu="{{ $lo->id_nguyen_lieu_ncc }}"
                    data-donvitinh="{{ $lo->nguyenLieuNCC->don_vi_tinh }}"
                    {{ old('id_lo_nguyen_lieu') == $lo->id ? 'selected' : '' }}>
                    {{ $lo->nguyenLieuNCC->ten }} - Lô #{{ $lo->id }} | Còn: {{ $conLai }} {{ $lo->nguyenLieuNCC->don_vi_tinh }}
                    - Xuất xứ: {{ $lo->nguyenLieuNCC->xuat_xu }} - {{ $lo->nguyenLieuNCC->nhaCungCap->ten }}
                </option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="so_luong" class="form-label">Số lượng cần dùng</label>
            <input type="number" name="so_luong" id="so_luong" class="form-control" min="1" required>
            <div id="conlai_hint" class="form-text text-danger mb-1"></div>
            <div id="donvitinh_hint" class="form-text text-muted"></div>

        </div>

        <button type="submit" class="btn btn-primary">Thêm nguyên liệu</button>
        <a href="{{ route('congty.don-san-xuat.show', $don->id) }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>


@endsection
<script>
    function locLoTheoNguyenLieu() {
        const selectedNguyenLieuId = document.getElementById('nguyen_lieu').value;
        const loSelect = document.getElementById('id_lo_nguyen_lieu');
        const options = loSelect.querySelectorAll('option');

        options.forEach(opt => {
            if (!opt.value) return; // bỏ qua option đầu tiên

            const loNlId = opt.getAttribute('data-nguyenlieu');
            opt.style.display = (selectedNguyenLieuId == loNlId) ? 'block' : 'none';
        });

        // reset selection nếu đang chọn lô cũ
        loSelect.value = '';
        updateSoLuongToiDa();
    }
</script>

<script>
    function updateSoLuongToiDa() {
        const select = document.getElementById('id_lo_nguyen_lieu');
        const selected = select.options[select.selectedIndex];
        const conlai = selected?.dataset?.conlai || '';
        const donViTinh = selected?.dataset?.donvitinh || '';

        // Cập nhật max và gợi ý số lượng còn lại
        const input = document.getElementById('so_luong');
        input.max = conlai;
        document.getElementById('conlai_hint').textContent = conlai ? "Còn lại: " + conlai : '';
        document.getElementById('donvitinh_hint').textContent = donViTinh ? "Đơn vị tính: " + donViTinh : '';
    }

    // Gọi lần đầu nếu có sẵn lựa chọn cũ
    window.onload = updateSoLuongToiDa;
</script>