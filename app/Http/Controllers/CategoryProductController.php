<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSP;
use App\Models\SanPham;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class CategoryProductController extends Controller
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
     public function add_category_product(){
            $this->AuthLogin();
    		return view('admin.add_category');
    }
     public function all_category_product(){
             $this->AuthLogin();
     		$all_category = LoaiSP::all();
    		return view('admin.all_category',compact('all_category'));
    }
    public function save_category_product(Request $req){
         $this->AuthLogin();
    	 Session::put('message_add', 'add_category');
        $this->validate($req,

            [   
 
                'category_name'=>'unique:loai_san_pham,ten_LSP',
      
            
            ],
            [
                'category_name.unique'=>'Tên danh mục đã có sẵn',
               

            ]);

    		$data  = array();
    		$data['ten_LSP'] = $req ->category_name;
    		$data['mo_ta'] = $req ->category_name_desc;
    		$data['trang_thai'] = $req ->category_status;	
    		LoaiSP::insert($data);
    		Session::put('message', 'Thêm danh mục sản phẩm thành công');
    		return Redirect::to('add_category');
    }
    public function edit_category_product($id_loai_san_pham){
             $this->AuthLogin();
            $category_product = LoaiSP::where('id_loai_san_pham',$id_loai_san_pham)->first();
            return view('admin.edit_category',compact('category_product'));
    }
    public function delete_category_product($id_loai_san_pham){
            $this->AuthLogin();
             $sanpham = SanPham::where('id_loai_san_pham',$id_loai_san_pham)->get();
             if(count($sanpham) > 0)
             {
                 Session::put('message', 'Xoá danh mục sản phẩm thất bại bởi vì có sản phẩm thuộc danh mục này');
                return Redirect::to('all_category');
             }
             else
             {
                LoaiSP::where('id_loai_san_pham',$id_loai_san_pham) ->delete();
                Session::put('message', 'Xoá danh mục sản phẩm thành công');
                return Redirect::to('all_category');
             }
            
    }
     public function update_category_product($id_loai_san_pham,Request $req){
         $this->AuthLogin();
            $data  = array();
            $data['ten_LSP'] = $req ->category_name;
            $data['mo_ta'] = $req ->category_name_desc;
            $data['trang_thai'] = $req ->category_status;   
            LoaiSP::where('id_loai_san_pham',$id_loai_san_pham)->update($data);
            Session::put('message', 'Cật nhật danh mục sản phẩm thành công');
          return Redirect::to('all_category');
    }
}