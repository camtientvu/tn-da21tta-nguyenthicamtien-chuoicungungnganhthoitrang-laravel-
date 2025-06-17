<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongTyGiaoHang extends Model
{
    protected $table = 'cong_ty_giao_hang';

    protected $fillable = [
        'ten',
        'email',
        'so_dien_thoai',
        'dia_chi'
    ];
}
