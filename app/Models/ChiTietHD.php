<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHD extends Model
{
    protected $table = "chi_tiet_hd";

    public function chi_tiet_sp(){
    	return $this->belongsTo('App\Models\ChiTietSP','id_chi_tiet_sp','id');
    }
      
       public function hoa_don(){

    	return $this->belongsTo('App\Models\HoaDon','id_hoa_don','id_chi_tiet_HD');
    }

}
