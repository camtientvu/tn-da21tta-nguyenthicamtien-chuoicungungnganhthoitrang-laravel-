<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguyenLieu extends Model
{
    use HasFactory;

    protected $table = 'nguyen_lieu';
    protected $fillable = ['ten', 'mo_ta', 'don_vi', 'so_luong', 'gia'];

    public function chiTietNhapNguyenLieus()
    {
        return $this->hasMany(ChiTietNhapNguyenLieu::class, 'id_nguyen_lieu');
    }

    public function loNguyenLieus()
    {
        return $this->hasMany(LoNguyenLieu::class, 'id_nguyen_lieu');
    }
}
