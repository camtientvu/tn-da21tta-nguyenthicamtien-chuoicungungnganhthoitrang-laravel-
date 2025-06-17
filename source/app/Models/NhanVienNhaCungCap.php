<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienNhaCungCap extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien_nha_cung_cap';

    protected $fillable = [
        'id_nguoi_dung',
        'id_nha_cung_cap',
        'vai_tro'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_nguoi_dung');
    }

    public function nhaCungCap()
    {
        return $this->belongsTo(NhaCungCap::class, 'id_nha_cung_cap');
    }
}
