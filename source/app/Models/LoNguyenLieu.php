<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoNguyenLieu extends Model
{
    use HasFactory;

    protected $table = 'lo_nguyen_lieu';
    protected $fillable = ['id_don_nhap', 'id_nguyen_lieu_ncc', 'so_luong_nhap', 'so_luong_su_dung', 'ngay_nhap'];

    public function donNhapNguyenLieu()
    {
        return $this->belongsTo(DonNhapNguyenLieu::class, 'id_don_nhap');
    }

    public function nguyenLieuNCC()
    {
        return $this->belongsTo(NguyenLieuNhaCungCap::class, 'id_nguyen_lieu_ncc');
    }

    public function nguyenLieuDonSanXuats()
    {
        return $this->hasMany(NguyenLieuDonSanXuat::class, 'id_lo_nguyen_lieu');
    }
    public function donNhap()
    {
        return $this->belongsTo(DonNhapNguyenLieu::class, 'id_don_nhap');
    }
}
