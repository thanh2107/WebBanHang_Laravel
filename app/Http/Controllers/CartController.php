<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietSP;
use App\Models\SanPham;
class CartController extends Controller
{
	public function AuthLogin(){

        if(Auth::check()&&Auth::user()->level=='3')
        {   
            return Redirect::to('admin.dashboard'); 
            
        }
        else
        {   
            return Redirect::to('admin')->send(); 
            
        }
    }
	public function add_cart(Request $req){
 		 $this->AuthLogin();
		$productId = $req->product_id_hidden;
		$quantity = $req->qty;
		$product = SanPham::where('id',$productId)->first();
		$chitietSP = chitietSP::where('id_san_pham',$productId)->get();

        return view('cart.show_cart');
    }    //
}
