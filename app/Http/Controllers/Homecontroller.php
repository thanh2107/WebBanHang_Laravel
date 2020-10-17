<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\ChiTietSP;
use App\Models\NguoiDung;
use Hash;
use Auth;
use Session;

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
         $hinh= $chitietsp->find(1);
         $h=$hinh->id_hinh;
        
    	return view('page.chitiet_sanpham',compact('sanpham','chitietsp','hinh'));
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
       public function postRegister(Request $req){
         Session::put('last_auth_attempt', 'register');
        $this->validate($req,

            [   
 
                'email'=>'required|email|unique:nguoi_dung,email',
                'password'=>'required|min:6|max:20',
                'username'=>'required|unique:nguoi_dung,username|min:6|alpha_dash',
                'confirmpassword'=>'required|same:password',
                'phone' =>'numeric'
            
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'username.unique'=>'username đã có người sử dụng',
                'username.min'=>'Nhập username ít nhất 6 kí tự',
                'username.alpha_dash'=>'Nhập username phải là chữ hoặc số, bao gồm dấu gạch ngang và gạch dưới',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'confirmpassword.required'=>'Vui lòng nhập mật khẩu xác nhận',
                'confirmpassword.same'=>'Mật khẩu không giống nhau',
                'username.required'=>'Vui lòng nhập họ tên',
                'phone.numeric'=>'Số điện thoại phải là số'

            ]);
       
        $user = new NguoiDung();
        $user ->username = $req->username;
        $user ->email = $req->email;
        $user ->dia_chi = $req->address;
        $user ->password = Hash::make($req->password);
        $user ->sdt = $req->phone;
        $user->save();


        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');
    }

     public function postLogin(Request $req){
         Session::put('last_auth_attempt', 'login');
        $this->validate($req,

            [   
 
                'email'=>'required',
                'password'=>'required|min:6|max:20'
            
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Nhập mật khẩu không quá 20 kí tự'

            ]);

       // $kiemtra = array('email'=>$req->email,'password'=>$req->password);
        
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])||Auth::attempt(['username'=>$req->email,'password'=>$req->password])){

        return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);

        }else
        {

             return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công!']);
        }
    }
}
