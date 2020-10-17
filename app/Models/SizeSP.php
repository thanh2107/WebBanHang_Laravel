<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeSP extends Model
{
     protected $table = "size_sp";
     public function chi_tiet_sp(){
    	return $this->hasMany('App\Models\ChiTietSP','id_size','id');
    }
 }