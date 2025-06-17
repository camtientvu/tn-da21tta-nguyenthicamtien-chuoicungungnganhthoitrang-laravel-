<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;

    protected $table = 'nha_cung_cap';

    protected $fillable = ['ten', 'dia_chi', 'so_dien_thoai', 'email'];

    public function nguyenLieus()
    {
        return $this->hasMany(NguyenLieuNhaCungCap::class, 'id_nha_cung_cap');
    }

    public function donNhapNguyenLieus()
    {
        return $this->hasMany(DonNhapNguyenLieu::class, 'id_nha_cung_cap');
    }
}