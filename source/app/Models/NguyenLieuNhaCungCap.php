<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguyenLieuNhaCungCap extends Model
{
    use HasFactory;

    protected $table = 'nguyen_lieu_nha_cung_cap';

    protected $fillable = [
        'id_nha_cung_cap',
        'ten',
        'loai_nguyen_lieu',
        'don_vi_tinh',
        'xuat_xu',
        'gia'
    ];

    public function nhaCungCap()
    {
        return $this->belongsTo(NhaCungCap::class, 'id_nha_cung_cap');
    }

    public function chiTietNhap()
    {
        return $this->hasMany(ChiTietNhapNguyenLieu::class, 'id_nguyen_lieu_ncc');
    }
    public function loNguyenLieus()
    {
        return $this->hasMany(LoNguyenLieu::class, 'id_nguyen_lieu_ncc');
    }
}
