<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhSP extends Model
{
     protected $table = "hinh_sp";
     public function chi_tiet_sp(){
    	return $this->hasMany('App\Models\ChiTietSP','idhinh_sp','id_hinh');
    }
}
