<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHD extends Model
{
    protected $table = "chi_tiet_hd";
    public function san_pham(){

    	return $this->belongsTo('App\Models\SanPham','id_san_pham','id_chi_tiet_HD');
    }
       public function hoa_don(){

    	return $this->belongsTo('App\Models\HoaDon','id_hoa_don','id_chi_tiet_HD');
    }

}
