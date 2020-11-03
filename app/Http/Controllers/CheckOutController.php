<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietSP;
use App\Models\ChiTietHD;
use App\Models\SanPham;
use App\Models\HoaDon;
use App\Models\LoaiSP;
use Session;
use Auth;
use Cart;
use Illuminate\Support\Facades\Redirect;
class CheckOutController extends Controller
{
    
    public function login_checkout(Request $req){
    	 if(Auth::check()&&Auth::user()->level=='0')
            {   
                return view('cart.checkout_cart'); 
                
            }
            else
            {   
                return Redirect::to('Login')->send(); 
                
            }
        }
     public function save_checkout(Request $req){
    Session::put('message_add', 'message_checkout');
    $this->validate($req,

        [   
           'myRadios' =>'required'
           
        ],
        [
           
            'myRadios.required'=>'Vui lòng chọn phương thức vận chuyển'
        ]);
        $user = Auth::user();
    
        $user ->address = $req ->address;
        $user ->phone = $req ->phone;
        $user ->update();
      $content =Cart::content();
        $content =Cart::content();
      
            $order_data['id_user'] = strval($user->id);
            $order_data['ngay_mua'] = date('Y-m-d'); 
            $order_data['tong_tien'] = $req->total_hidden; 
            $order_data['thanh_toan'] = $req->order;
            $order_data['ghi_chu'] = $req->note;
            $order_data['trang_thai'] = 'Đang chờ xử lý';
            $order_id = HoaDon::insertGetId($order_data);
    
         foreach ($content as $v_content) {
            $data_d_bill['id_hoa_don'] = $order_id;
            $data_d_bill['id_chi_tiet_sp'] = $v_content->id;
            $data_d_bill['so_luong'] = $v_content->qty;
            $data_d_bill['don_gia'] = $v_content->weight;
            ChiTietHD::insert($data_d_bill);

            //add da_ban
            $chitiet = ChiTietSP::where('id',$v_content->id)->first();
             $daban['da_ban']=$chitiet->da_ban  +$v_content->qty; 
             ChiTietSP::where('id',$v_content->id)->update($daban);

             }
             Cart::destroy();
             Session::put('message', 'Đặt hàng thành công');
            return redirect()->back();




        }





}
