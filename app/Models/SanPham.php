<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "san_pham";
    public function loai_san_pham(){

    	return $this->belongsTo('App\Models\LoaiSP','id_loai_san_pham','id_san_pham');
    }
    
}
