<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSP;
use App\Models\SanPham;
use Session;
use Illuminate\Support\Facades\Redirect;
class CategoryProductController extends Controller
{
     public function add_category_product(){

    		return view('admin.add_category');
    }
     public function all_category_product(){

     		$all_category = LoaiSP::all();
    		return view('admin.all_category',compact('all_category'));
    }
    public function save_category_product(Request $req){
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

            $category_product = LoaiSP::where('id_loai_san_pham',$id_loai_san_pham)->first();
            return view('admin.edit_category',compact('category_product'));
    }
    public function delete_category_product($id_loai_san_pham){
             $sanpham = SanPham::where('id_loai_san_pham',$id_loai_san_pham)->get();
             if(isset($sanpham))
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
            $data  = array();
            $data['ten_LSP'] = $req ->category_name;
            $data['mo_ta'] = $req ->category_name_desc;
            $data['trang_thai'] = $req ->category_status;   
            LoaiSP::where('id_loai_san_pham',$id_loai_san_pham)->update($data);
            Session::put('message', 'Cật nhật danh mục sản phẩm thành công');
          return Redirect::to('all_category');
}
}