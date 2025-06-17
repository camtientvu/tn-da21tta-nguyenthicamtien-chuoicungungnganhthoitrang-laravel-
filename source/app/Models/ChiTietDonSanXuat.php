<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonSanXuat extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_san_xuat';
    protected $fillable = ['id_don_san_xuat', 'id_chi_tiet_san_pham', 'so_luong'];

    public function donSanXuat()
    {
        return $this->belongsTo(DonSanXuat::class, 'id_don_san_xuat');
    }

    public function chiTietSanPham()
    {
        return $this->belongsTo(ChiTietSanPham::class, 'id_chi_tiet_san_pham');
    }
}
