<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
   protected $table = "hoa_don";
     public function chi_tiet_hd(){

    	return $this->hasMany('App\Models\ChiTietHD','id_hoa_don','id_hoa_don');
    }
     public function khach_hang(){

    	return $this->belongsTo('App\Models\KhachHang','id_khach_hang','id_hoa_don');
    }
}