<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\ChiTietSP;
use Session;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    public function add_product(){
             $all_category_product = LoaiSP::all();
    		return view('admin.add_product',compact('all_category_product'));
    }

     public function all_product(){

     		$all_product = SanPham::all();
    		return view('admin.all_product',compact('all_product'));
    }
    public function save_product(Request $req){
    function convert_name($str) {
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
    	 Session::put('message_add', 'add_product');
        $this->validate($req,

            [   
 
                'product_name'=>'unique:san_pham,ten_san_pham',
      
            
            ],
            [
                'product_name.unique'=>'Tên sản phẩm đã có sẵn',
               

            ]);

    		$data  = array();
    		$data['ten_san_pham'] = $req->product_name;
            $data['id_loai_san_pham'] = $req->category_product;
    		$data['mo_ta'] = $req->product_desc;
    		$data['phong_cach'] = $req->phong_cach;
            $data['kieu_mau'] = $req->kieu_mau;
            $data['thanh_phan'] = $req->thanh_phan;
            $data['gia'] = $req->gia_sanpham;
            $data['gia_khuyen_mai'] = $req->gia_khuyen_mai_sanpham;
            $data['moi'] = $req->product_status_new;
            $get_image = $req->file('product_img');
            if($get_image){

                $ten_sp = convert_name($req->product_name);
                $new_image = $ten_sp.rand(0,99).'.'.$get_image->getclientoriginalextension();
                $get_image->move('resources/img/product',$new_image);
                $data['hinh'] = $new_image;
                SanPham::insert($data);
                Session::put('message', 'Thêm sản phẩm thành công');
                return Redirect::to('add_product');

            }
            $text = "Thành đẹp trai";
         
             $data['hinh'] ='';
    		sanpham::insert($data);
    		Session::put('message', 'Thêm sản phẩm thành công');
    		return Redirect::to('add_product'); 
    }
    public function edit_product($id_san_pham){

            $category_product = LoaiSP::where('id',$id_san_pham)->first();
            return view('admin.edit_category',compact('category_product'));
    }
  
    public function delete_product($id_san_pham){
             $chitiet_sp = ChiTietSP::where('id_san_pham',$id_san_pham)->get();
             if(isset($chitiet_sp)){
                 Session::put('message', 'Xoá sản phẩm thất bại bởi vì có chi tiết sản phẩm thuộc sản phẩm này này ');
                return Redirect::to('all_product');
             }
             else
             {
                dd($chitiet_sp);
                SanPham::where('id',$id_san_pham) ->delete();
                Session::put('message', 'Xoá  sản phẩm thành công');
                return Redirect::to('all_product');

             }
            
    }
     public function update_product($id_loai_san_pham,Request $req){
            $data  = array();
            $data['ten_LSP'] = $req ->category_name;
            $data['mo_ta'] = $req ->category_name_desc;
            $data['trang_thai'] = $req ->category_status;   
            LoaiSP::where('id_loai_san_pham',$id_loai_san_pham)->update($data);
            Session::put('message', 'Cật nhật danh mục sản phẩm thành công');
          return Redirect::to('all_category');
    }
}
