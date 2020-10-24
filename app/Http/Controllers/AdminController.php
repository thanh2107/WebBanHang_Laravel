<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    //
    public function AuthLogin(){

            if(Auth::check())
            {   
                return Redirect::to('admin.dashboard'); 
                
            }
            else
            {   
                return Redirect::to('admin')->send(); 
                
            }
    }
    public function getIndex(){

    		return view('admin_login');
    }
    public function show_dashboard(){
            $this->AuthLogin();
    		return view('admin.dashboard');
    }
    public function dashboard(Request $req){
 	 Session::put('last_auth_attempt', 'admin_login');
    	  $this->validate($req,

            [   
 
                'admin_email'=>'required',
                'admin_password'=>'required|min:6|max:20'
            
            ],
            [
                'admin_email.required'=>'Vui lòng nhập email or username',
                'admin_password.required'=>'Vui lòng nhập mật khẩu',
                'admin_password.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'admin_password.max'=>'Nhập mật khẩu không quá 20 kí tự'

            ]);


        
        if(Auth::attempt(['email'=>$req->admin_email,'password'=>$req->admin_password,'level'=>$req->level])||Auth::attempt(['name'=>$req->admin_email,'password'=>$req->admin_password,'level'=>$req->level])){

        return view('admin.dashboard');

        }else
        {

             return  redirect()->back()->with(['flag'=>'danger','message'=>'Sai tài khoản hoặc mật khẩu!']);
        }
    }


    public function getLogout(){
         $this->AuthLogin();
        Auth::logout();
      return view('admin_login');
    
        }
}

