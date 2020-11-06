<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\ChiTietSP;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
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
    public function add_product(){
       $this->AuthLogin();
       $all_category_product = LoaiSP::all();
       return view('admin.add_product',compact('all_category_product'));
   }

   public function all_product(){
    $this->AuthLogin();
    $all_product = SanPham::paginate(10);
    return view('admin.all_product',compact('all_product'));
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
public function save_product(Request $req){
    $this->AuthLogin();
    Session::put('message_add', 'add_product');
    $this->validate($req,

        [   
           
            'product_name'=>'unique:san_pham,ten_san_pham',
            'gia_khuyen_mai_sanpham'=> 'lt:gia_sanpham',
            
        ],
        [
            'product_name.unique'=>'Tên sản phẩm đã có sẵn',
            'gia_khuyen_mai_sanpham.lt'=>'Giá khuyến mãi phải nhỏ hơn giá bán'

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
    $allowtypes = array('jpg', 'png', 'jpeg');
    $allowUpload   = true;
   $get_img_extensiton = $get_image->getclientoriginalextension();
    if (!in_array($get_img_extensiton,$allowtypes))
    {
        $allowUpload = false;
    }
     for ($i = 1 ; $i <= 4 ; $i++) { 
        $get_image_detail =$req->file('product_img'.$i);
        if (!is_null($get_image_detail))
        {
            $get_img_extensiton_detail = $get_image_detail->getclientoriginalextension();
          if (!in_array($get_img_extensiton_detail,$allowtypes))
          {
            $allowUpload = false;
            break;
          }
        }
        
      }

    if ($allowUpload)
    {

     
      

        $ten_sp = $this->convert_name($req->product_name);
        $data['ten_file'] = $ten_sp.'/';
         mkdir('resources/img/product/'.$ten_sp);

         //HinhDaiDien
        $new_image = $ten_sp.rand(0,99).date("h_i_s").'.'.$get_img_extensiton;
                // chèn random và giờ phút giây cho không trùng tên hình ảnh
        $get_image->move('resources/img/product',$new_image);
        $data['hinh'] = $new_image;
        //EndHinhDaiDien
  
        for ($i = 1 ; $i <= 4 ; $i++) { 
           $get_image_detail =$req->file('product_img'.$i);
          if (is_null($get_image_detail))
          {
            continue;
            }
            else{

            $get_img_extensiton_detail = $get_image_detail->getclientoriginalextension();
            $new_image_detail = $ten_sp.rand(0,99).date("h_i_s").'.'.$get_img_extensiton_detail;
                    // chèn random và giờ phút giây cho không trùng tên hình ảnh
            $get_image_detail->move('resources/img/product/'.$ten_sp,$new_image_detail);
            $data['h'.$i] = $new_image_detail;

  

            }

          }


        SanPham::insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add_product');
    }
    else
    {
        Session::put('message', 'Không upload được file,Chỉ được upload các định dạng JPG, PNG, JPEG, kiểu file không đúng ...');
        return Redirect::to('add_product');
    }

    
}
public function edit_product($id_san_pham){
   $this->AuthLogin();
   $all_category_product = LoaiSP::all();
   $product = SanPham::where('id',$id_san_pham)->first();
   return view('admin.edit_product',compact('product','all_category_product'));
}
public static function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
public function delete_product($id_san_pham){
   $this->AuthLogin();
   $chitiet_sp = ChiTietSP::where('id_san_pham',$id_san_pham)->get();
   if(count($chitiet_sp) > 0){

      
       Session::put('message', 'Xoá sản phẩm thất bại bởi vì có chi tiết sản phẩm thuộc sản phẩm này  ');
       return Redirect::to('all_product');
   }
   else
   {
    $product =  SanPham::where('id',$id_san_pham)->first();
    $namefile = "resources/img/product/".rtrim($product->ten_file, "/");
   // dd($namefile);
     array_map('unlink', glob("$namefile/*.*"));
    if(rmdir($namefile)){
      $name_img = "resources/img/product/".$product->hinh;
        unlink($name_img);
    SanPham::where('id',$id_san_pham) ->delete();
    Session::put('message', 'Xoá  sản phẩm thành công');
    return Redirect::to('all_product');
  }
    else{
        Session::put('message', 'Xoá  sản phẩm không thành công');
       return redirect()->back();
    }

  }
}
public function update_product($id_san_pham,Request $req){
   $this->AuthLogin();
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
$allowtypes = array('jpg', 'png', 'jpeg');
$allowUpload   = true;
    

if($get_image){
  $get_img_extensiton = $get_image->getclientoriginalextension();
     if (!in_array($get_img_extensiton,$allowtypes))
    {
        $allowUpload = false;
    }

    $ten_sp = $this->convert_name($req->product_name);
    $new_image = $ten_sp.rand(0,99).date("h_i_s").'.'.$get_image->getclientoriginalextension();
                // chèn random và giờ phút giây cho không trùng tên hình ảnh
    $get_image->move('resources/img/product',$new_image);
    $data['hinh'] = $new_image;

}
    for ($i = 1 ; $i <= 4 ; $i++) { 
        $get_image_detail =$req->file('product_img'.$i);
        if ($get_image_detail)
        {
            $get_img_extensiton_detail = $get_image_detail->getclientoriginalextension();
          if (!in_array($get_img_extensiton_detail,$allowtypes))
          {
            $allowUpload = false;
            break;
          }
        }
        
      }

   if ($allowUpload){
        $ten_sp = $this->convert_name($req->product_name);
        // $data['ten_file'] = $ten_sp.'/';
        //  mkdir('resources/img/product/'.$ten_sp);

        for ($i = 1 ; $i <= 4 ; $i++) { 
           $get_image_detail =$req->file('product_img'.$i);
          if ($get_image_detail)
          {

            $get_img_extensiton_detail = $get_image_detail->getclientoriginalextension();
            $new_image_detail = $ten_sp.rand(0,99).date("h_i_s").'.'.$get_img_extensiton_detail;
                    // chèn random và giờ phút giây cho không trùng tên hình ảnh
            $get_image_detail->move('resources/img/product/'.$ten_sp,$new_image_detail);
            $data['h'.$i] = $new_image_detail;

            }
              if(!isset($req->as[$i])){
              $data['h'.$i] = "";
            }
             
          }
          SanPham::where('id',$id_san_pham)->update($data);
          Session::put('message', 'Cật nhật sản phẩm thành công');
         return redirect()->back();
    }
    else
    {
        Session::put('message', 'Không upload được file,Chỉ được upload các định dạng JPG, PNG, JPEG, kiểu file không đúng ...');
         return redirect()->back();
    }


}
}
