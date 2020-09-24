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
     public function getGioHang(){

        return view('page.giohang');
    }
     public function getThanhToan(){

        return view('page.thanhtoan');
    }
    public function getLogin(){

        return view('page.login_register');
    }
}
