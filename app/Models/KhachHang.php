<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
   protected $table = "khach_hang";
    public function hoa_don(){

    	return $this->hasMany('App\Models\HoaDon','id_khach_hang','id_khach_hang');
    }
}
