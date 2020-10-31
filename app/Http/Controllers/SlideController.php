<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\SanPham;
use App\Models\LoaiSp;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class SlideController extends Controller
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
    public function all_slide(){
    	$this->AuthLogin();
 		$all_slide = Slide::all();
        return view('admin.all_slide',compact('all_slide'));
    }    
    public function add_slide(){

    	$product = SanPham::all();
    	$catelogy = LoaiSP::all();
       $this->AuthLogin();
       return view('admin.add_slide',compact('product','catelogy'));
   }
}
