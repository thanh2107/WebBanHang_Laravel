<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "san_pham";
    public function loai_san_pham(){
    	return $this->belongsTo('App\Models\LoaiSP','id_loai_san_pham','id_loai_san_pham');
    	//Khoá ngoại và khoá chính của bảng loại sản phẩm
    }
      public function chi_tiet_sp(){
    	return $this->hasMany('App\Models\ChiTietSP','id_san_pham','id');
    }
    
    
}
