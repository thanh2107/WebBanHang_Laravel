<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;
use App\Models\SanPham;
use App\Models\HoaDon;
use App\Models\ChiTietHD;
use App\Models\LoaiSP;
use App\Models\ChiTietSP;
use App\Models\NguoiDung;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Auth;
use Session;
use Mail;
class HomeController extends Controller
{
 
    public function getIndex(){
        $slide = Slide:: where('trang_thai',1)->get();
        $loai = LoaiSP::paginate(8); /* chỉ lấy ra 8 dah muc sản phẩm mới */
        $new_product = SanPham::where('moi',1)->paginate(10); /* chỉ lấy ra 5 sản phẩm mới */
        //su lý gộp đã bán
        $chitietsp = ChiTietSP::all();
        $sanpham = SanPham::all();
        $count = 0;
        foreach ($sanpham as $sp) {
       
            foreach($chitietsp as $ct) {
                if($ct->id_san_pham ==$sp->id)
                {
                    $count = $count+$ct->da_ban;

                }
            }
            if($count!=0)
            {
                $daban['da_ban'] =$count;
                SanPham::where('id', $sp->id)->update($daban);
                $count = 0;
            }
        }

        $best_selling = SanPham::orderby('da_ban','desc')->get();
        return view('page.trangchu',compact('slide','new_product','best_selling','loai'));
    }
     public function getLoaiSp($loaisp){
        $sp_theoloai = SanPham::where('id_loai_san_pham',$loaisp)->get();
        $loai = LoaiSP::all();
        $tenloai = LoaiSP::where('id_loai_san_pham',$loaisp)->first();
        $sanpham = SanPham::all();
    	return view('page.loai_sanpham',compact('sp_theoloai','loai','tenloai','sanpham'));
    }
    public function getDanhMuc(){           
        $sanpham = SanPham::all();
         $loai = LoaiSP::all();
      return view('page.danhmuc_sanpham',compact('sanpham','loai'));
}
    public function getChiTiet(Request $req){
         $sanpham = SanPham::where('id',$req->id)->first();
         $chitietsp = ChiTietSP::where('id_san_pham',$req->id)->get();
         $color_product = ChiTietSP::where('id_san_pham',$req->id)->select('id_mau')->distinct()->get();
        $size_product = ChiTietSP::where('id_san_pham',$req->id)->select('id_size')->distinct()->get()    ;
        $sanpham_lienquan = SanPham::where('id_loai_san_pham',$sanpham->id_loai_san_pham)->paginate(10); 
    	return view('page.chitiet_sanpham',compact('sanpham','chitietsp','sanpham_lienquan','color_product','size_product'));
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
     public function reset_password(){

        return view('page.reset_pass');
    }



    public function getForgotPassword(Request $request)
    {
        $email = $request->email;
        //Tạo token và gửi đường link reset vào email nếu email tồn tại
        $result = User::where('email', $request->email)->first();
        if($result){
            $resetPassword = ResetPassword::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);
            $token = ResetPassword::where('email', $request->email)->first();
            $url = route('get-reset-password',['code' => $resetPassword->token]);
             //send it to email
               $data = [
                'link' => $url
            ];
            Mail::send('page.reset_pass_to_mail', $data, function($message) use ($email){
                $message->from('tyn01685732770@gmail.com', 'Thời trang loriem');
                $message->to($email, 'Visitor')->subject('Quên mật khẩu từ cửa hàng thời trang loriem');
                
            });
            return redirect()->back()->with(['flag'=>'success','message'=>'Thông báo: Link lấy lại mật khẩu đã được gửi vào email của bạn!']);
        } else {
            echo 'Email không có trong hệ thống, vui lòng kiểm tra lại';
        }
        
    }
    public function resetPassword(Request $request)
    {
        // Check token valid or not
        $result = ResetPassword::where('token', $request->token)->first();
        if($result){ 
            $this->validate($request,

            [   
 
                'password'=>'required|min:6|max:20',
                'confirmpassword'=>'required|same:password',
            
            ],
            [
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'confirmpassword.required'=>'Vui lòng nhập mật khẩu xác nhận',
                'confirmpassword.same'=>'Mật khẩu không giống nhau'   

            ]);
            $email = $result->email;
            $data_pass['password'] = Hash::make($request->password);
            User::where('email', $email)->update($data_pass);
            ResetPassword::where('token', $request->token)->delete();
           return redirect()->back()->with(['flag'=>'success','message'=>'Đổi mật khẩu thành công!']);
        } else {
            echo 'This link is expired';
        }
    }
    public function getFormResetPassword(Request $request){
          $code = $request->code;
        return view('page.reset',compact('code'));
    }



       public function postRegister(Request $req){
         Session::put('last_auth_attempt', 'register');
        $this->validate($req,

            [   
 
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'username'=>'required|unique:users,name|min:6|alpha_dash',
                'confirmpassword'=>'required|same:password',
                'phone' =>'numeric'
            
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'username.unique'=>'username đã có người sử dụng',
                'username.min'=>'Nhập username ít nhất 6 kí tự',
                'username.alpha_dash'=>'Nhập username phải là chữ hoặc số, bao gồm dấu gạch ngang và không được có khoảng trắng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'confirmpassword.required'=>'Vui lòng nhập mật khẩu xác nhận',
                'confirmpassword.same'=>'Mật khẩu không giống nhau',
                'username.required'=>'Vui lòng nhập họ tên',
                'phone.numeric'=>'Số điện thoại phải là số'

            ]);
       
        $user = new User();
        $user ->name = $req->username;
        $user ->email = $req->email;
        $user ->password = Hash::make($req->password);
        $user ->phone = $req->phone;
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
                'email.required'=>'Vui lòng nhập email or username',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Nhập mật khẩu không quá 20 kí tự'

            ]);

       // $kiemtra = array('email'=>$req->email,'password'=>$req->password);
        
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'level'=>$req->level])||Auth::attempt(['name'=>$req->email,'password'=>$req->password,'level'=>$req->level])){
        // return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);
              return view('cart.checkout_cart'); 
        }else
        {

             return redirect()->back()->with(['flag'=>'danger','message'=>'Sai mật khẩu hoặc tài khoan!']);
        }
    }



    public function getLogout(){
        Auth::logout();
      return redirect()->back();
    }

    public function search(Request $req){
        $keywords =$req->keywords_submit;
        $search_product = SanPham::where('ten_san_pham','like','%'.$keywords.'%')->get();
        return view('page.search',compact('search_product'));
    }
        public function manage_orders_customer($id_user){
             if(!Auth::check())
            {   
                 return view('page.login_register');
                
            }
            else
            {   
         
        $all_order = HoaDon::where('id_user',$id_user)->get();
        $all_detail_order = ChiTietHD::all();
        return view('page.order',compact('all_order','all_detail_order'));
        }
     }
      public function view_order_customer($order_id){
          if(!Auth::check())
            {   
                 return view('page.login_register');
                
            }
            else
            {   
         
        $order = HoaDon::where('id_hoa_don',$order_id)->first();
        $detail_order = ChiTietHD::where('id_hoa_don',$order_id)->get();
        return view('page.view_order_customer',compact('order','detail_order','order_id'));
        }}
}
