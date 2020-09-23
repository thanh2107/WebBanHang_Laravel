<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function getIndex(){

    	return view('page.trangchu');
    }
     public function getLoaiSp(){

    	return view('page.loai_sanpham');
    }
    public function getSanPham(){

    	return view('page.chitiet_sanpham');
    }
     public function getLienHe(){

    	return view('page.lienhe');
    }
}
