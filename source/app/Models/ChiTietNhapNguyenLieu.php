<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNhapNguyenLieu extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_nhap_nguyen_lieu';
    protected $fillable = ['id_don_nhap', 'id_nguyen_lieu_ncc', 'so_luong', 'gia'];

    public function donNhapNguyenLieu()
    {
        return $this->belongsTo(DonNhapNguyenLieu::class, 'id_don_nhap');
    }

    public function nguyenLieuNCC()
    {
        return $this->belongsTo(NguyenLieuNhaCungCap::class, 'id_nguyen_lieu_ncc');
    }
}
