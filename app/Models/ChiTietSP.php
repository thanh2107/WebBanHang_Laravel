<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSP extends Model
{
    protected $table = "chi_tiet_sp";

     public function hinh_sp(){

    	return $this->belongsTo('App\Models\HinhSP','id_hinh','id');
    }
     public function size_sp(){

    	return $this->belongsTo('App\Models\SizeSP','id_size','id');
    }
     public function mau_sp(){

    	return $this->belongsTo('App\Models\Mau_SP','id_mau','id');
    }
     public function chi_tiet_hd(){

    	return $this->hasMany('App\Models\ChiTietHD','id_chi_tiet_sp','id');
    }
}
