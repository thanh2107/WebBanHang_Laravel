<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSP extends Model
{
    protected $table = "chi_tiet_sp";

    
    public function san_pham(){

        return $this->belongsTo('App\Models\SanPham','id_san_pham','id');  //id là id của Model sanpham  và id_size là khoá ngoại bản chị tiết sp
    }
     public function size_sp(){

    	return $this->belongsTo('App\Models\SizeSP','id_size','id');  //id là id của Model SizeSP  và id_size là khoá ngoại bản chị tiết sp
    }
     public function mau_sp(){

    	return $this->belongsTo('App\Models\MauSP','id_mau','id');
    }
     public function chi_tiet_hd(){

    	return $this->hasMany('App\Models\ChiTietHD','id_chi_tiet_sp','id');
    }
}
