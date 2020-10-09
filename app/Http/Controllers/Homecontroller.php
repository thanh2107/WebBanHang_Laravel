<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\SanPham;

class HomeController extends Controller
{
  
    public function getIndex(){
        $slide = Slide:: all();
        $new_product = SanPham::where('moi',1)->paginate(5); /* chỉ lấy ra 5 sản phẩm mới */
        $best_selling = SanPham::orderby('da_ban','desc')->get();
       // $new_product = SanPham::where('new',1)->get();
       // dd($new_product);
    	//return view('page.trangchu',['slide' => $slide]);
        return view('page.trangchu',compact('slide','new_product','best_selling'));
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
