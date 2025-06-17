<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_san_pham';
    protected $fillable = ['id_san_pham', 'mau_sac', 'kich_co', 'so_luong'];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_chi_tiet_san_pham');
    }

    public function chiTietDonSanXuats()
    {
        return $this->hasMany(ChiTietDonSanXuat::class, 'id_chi_tiet_san_pham');
    }
}
