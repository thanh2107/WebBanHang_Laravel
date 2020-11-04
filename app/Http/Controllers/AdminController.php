<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietHD;
use App\Models\HoaDon;
use App\Models\User;
use Hash;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    //


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
    public function getIndex(){

    		return view('admin_login');
    }
    public function show_dashboard(){
            $this->AuthLogin();

            $HoaDon=  HoaDon::all();

            $users = User::all()->except(Auth::id());
           $Countusers  = count($users);
          $CountBill = count($HoaDon);
    
              return view('admin.dashboard',compact('CountBill','Countusers'));
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

          $HoaDon=  HoaDon::all();

            $users = User::all()->except(Auth::id());
           $Countusers  = count($users);
          $CountBill = count($HoaDon);
        return view('admin.dashboard',compact('CountBill','Countusers'));

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
        public function manage_orders(){
         $this->AuthLogin();
        $all_order = HoaDon::all();
        $all_detail_order = ChiTietHD::all();
        return view('admin.manage_orders',compact('all_order','all_detail_order'));
    
        }
         public function view_order($order_id){
         $this->AuthLogin();
        $order = HoaDon::where('id_hoa_don',$order_id)->first();
        $detail_order = ChiTietHD::where('id_hoa_don',$order_id)->get();
        return view('admin.view_order',compact('order','detail_order','order_id'));
        }
        public function confirm_order($order_id){
         $this->AuthLogin();
        $data['trang_thai'] = 'Đã xác nhận giao hàng';
        HoaDon::where('id_hoa_don',$order_id)->update($data);

         Session::put('message', 'Đã xác nhận giao hàng');
         return redirect()->back();
        }
}

