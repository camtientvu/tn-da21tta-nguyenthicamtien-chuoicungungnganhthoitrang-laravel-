<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienGiaoHang extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien_giao_hang';

    protected $fillable = [
        'id_nguoi_dung',
        'id_cong_ty_giao_hang',
        'vai_tro'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_nguoi_dung');
    }

    public function congTyGiaoHang()
    {
        return $this->belongsTo(CongTyGiaoHang::class, 'id_cong_ty_giao_hang');
    }
}
