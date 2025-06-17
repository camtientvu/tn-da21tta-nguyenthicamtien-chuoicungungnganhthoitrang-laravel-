<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguyenLieuDonSanXuat extends Model
{
    use HasFactory;

    protected $table = 'nguyen_lieu_don_san_xuat';
    protected $fillable = ['id_don_san_xuat', 'id_lo_nguyen_lieu', 'so_luong'];

    public function donSanXuat()
    {
        return $this->belongsTo(DonSanXuat::class, 'id_don_san_xuat');
    }

    public function loNguyenLieu()
    {
        return $this->belongsTo(LoNguyenLieu::class, 'id_lo_nguyen_lieu');
    }
}
