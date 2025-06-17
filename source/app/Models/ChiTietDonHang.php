<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_hang';
    protected $fillable = ['id_don_hang', 'id_chi_tiet_san_pham', 'so_luong', 'gia'];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'id_don_hang');
    }

    public function chiTietSanPham()
    {
        return $this->belongsTo(ChiTietSanPham::class, 'id_chi_tiet_san_pham');
    }
}
