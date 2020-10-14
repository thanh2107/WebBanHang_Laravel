<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\ChiTietSP;
use App\Models\SizeSP;

class HomeController extends Controller
{
  
    public function getIndex(){
        $slide = Slide:: all();
        $loai = LoaiSP::all();
        $new_product = SanPham::where('moi',1)->paginate(5); /* chỉ lấy ra 5 sản phẩm mới */
        $best_selling = SanPham::orderby('da_ban','desc')->get();
       // $new_product = SanPham::where('new',1)->get();
       // dd($new_product);
    	//return view('page.trangchu',['slide' => $slide]);
        return view('page.trangchu',compact('slide','new_product','best_selling','loai'));
    }
     public function getLoaiSp($loaisp){
        $sp_theoloai = SanPham::where('id_loai_san_pham',$loaisp)->get();
        $loai = LoaiSP::all();
        $tenloai = LoaiSP::where('id_loai_san_pham',$loaisp)->first();
        $sanpham = SanPham::all();
    	return view('page.loai_sanpham',compact('sp_theoloai','loai','tenloai','sanpham'));
    }
    public function getChiTiet(Request $req){
        $sanpham = SanPham::where('id_san_pham',$req->id)->first();
         $chitietsp = ChiTietSP::where('id_san_pham',$req->id)->get();
        
    	return view('page.chitiet_sanpham',compact('sanpham','chitietsp'));
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
