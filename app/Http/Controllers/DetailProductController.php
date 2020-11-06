<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\MauSP;
use App\Models\SizeSP;
use App\Models\ChiTietHD;
use App\Models\ChiTietSP;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class DetailProductController extends Controller
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
		     public function add_detail_product(){
		     	$this->AuthLogin();
		     	$all_category_product = LoaiSP::all();
		     	$color_product = MauSP::all();
		     	$size_product = SizeSP::all();
		     	$product = SanPham::all();
		     	
		     	return view('admin.add_detail_product',compact('all_category_product','product','color_product','size_product'));
		     }

		     public function all_detail_product(){
		     	$this->AuthLogin();
		     	$detail_product = ChiTietSP::paginate(10);
		     	return view('admin.all_detail_product',compact('detail_product'));
		     }
		     public function convert_name($str) {
		     	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		     	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		     	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		     	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		     	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		     	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		     	$str = preg_replace("/(đ)/", 'd', $str);
		     	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		     	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		     	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		     	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		     	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		     	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		     	$str = preg_replace("/(Đ)/", 'D', $str);
		     	$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		     	$str = preg_replace("/( )/", '-', $str);
		     	return $str;
		     }
		     public function save_detail_product(Request $req){
		     	$this->AuthLogin();
		     	$id_product = SanPham::where('hinh',$req->id_product_Choose)->get();
		     	$detail_product =ChiTietSP::where('id_san_pham',$id_product[0]->id)->get();
		     	Session::put('message_add', 'add_product');
		     	
		     	foreach ($detail_product as $del) {
		     		if(strval($del->id_mau) == $req->color_product && strval($del->id_size) == $req->size_product ){
						Session::put('message', 'Chi tiết sản phẩm đã có sẵn');
						return redirect()->back();
		     		}	}
		     				$data  = array();
		     				$data['id_san_pham'] = $id_product[0]->id;
		     				$data['id_mau'] = $req->color_product;
		     				$data['id_size'] = $req->size_product;
		     				$data['soluong'] = $req->quantity;
		     				ChiTietSP::insert($data);
		     				Session::put('message', 'Thêm chi tiết sản phẩm thành công');
		     				return redirect()->back();
		     		
		     
		     	

		     }
		      public function save_color_size(Request $req){
		      	Session::put('message_add', 'add_product_detail');
		      		$this->AuthLogin();

				 if ($_POST['action'] == 'add_color') {
				 	$this->validate($req,

		        [   
		           
		            'name_color'=>'required',
		            
		        ],
		        [
		            'name_color.required'=>'Tên Màu trống',
		        

		        ]);
				 	$data  = array();
				 	$data['mau'] = $req->name_color;
				 	MauSP::insert($data);
				 	Session::put('message', 'Thêm Màu thành công');
		     				return redirect()->back();
				  
				} else if ($_POST['action'] == 'add_size') {
					$this->validate($req,

		        [   
		           
		            'name_size'=>'required',
		            
		        ],
		        [
		            'name_size.required'=>'Tên Size trống',
		        

		        ]);
				   $data  = array();
				 	$data['ten_size'] = $req->name_size;
				 	SizeSP::insert($data);
				 	Session::put('message', 'Thêm Size thành công');
		     				return redirect()->back();
				}
		      }
		     public function delete_detail_product($id_chi_tiet_sp){
		     	$this->AuthLogin();
		     

		     		ChiTietSP::where('id',$id_chi_tiet_sp) ->delete();
		     		Session::put('message', 'Xoá  chi tiết sản phẩm thành công');
		     		return Redirect::to('all_detail_product');

		     }
		     public function update_detail_product($id_chi_tiet_sp,Request $req){
		     	$this->AuthLogin();
		     	$data  = array();
		     	$chitietsp = ChiTietSP::where('id',$id_chi_tiet_sp)->first();
		     	$data['soluong'] = $req->so_luong;
		     	if($data['soluong'] != $chitietsp->soluong){
		     		ChiTietSP::where('id',$id_chi_tiet_sp)->update($data);
		     		Session::put('message', 'Cật nhật sản phẩm thành công');
		     		return Redirect::to('all_detail_product');

		     	}
		     	else{
		     	Session::put('message', 'Dữ liệu không thay đổi');
		     	return Redirect::to('all_detail_product');
		     }}
}
