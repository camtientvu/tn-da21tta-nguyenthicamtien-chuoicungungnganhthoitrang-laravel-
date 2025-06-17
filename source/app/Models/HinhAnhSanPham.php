<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhSanPham extends Model
{
    use HasFactory;

    protected $table = 'hinh_anh_san_pham';
    protected $fillable = ['id_san_pham', 'duong_dan_hinh'];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }
}
