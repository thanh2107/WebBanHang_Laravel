<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietSP;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\MauSP;
use App\Models\SizeSP;
use Session;
use Auth;
use Cart;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{


	public function add_cart($id_product,Request $req){


    if ($_POST['action'] == 'buy_now') {

     $check_detail_product = false;
     $detail_products = ChiTietSP::where('id_san_pham',$id_product)->get();

     foreach ($detail_products as $detail){
       if($detail->id_mau == strval($req->color_products) &&
        $detail->id_size == strval($req->size_products) &&
        $detail->soluong > $req->qty){
        $check_detail_product = true;
      $data['id'] = $detail->id;

      break;
    }
    else{
      $check_detail_product = false;
    }
  }

  if($check_detail_product ==true)
  {
    $productId = $id_product;
    $quantity = $req->qty;
    $product = SanPham::where('id',$productId)->first();
    $chitietSP = chitietSP::where('id_san_pham',$productId)->get();
    $data['qty'] = $quantity;
    $data['name'] = $product->ten_san_pham;
    $data['price'] =  $product->gia;
    if($product->gia_khuyen_mai>0){

     $data['weight'] = $product->gia_khuyen_mai;
   }
   else{
     $data['weight'] = $product->gia;
   }
   $data['options']['image'] = $product->hinh;
   $data ['options']['size'] = $req->size_products;
   $data ['options']['color'] = $req->color_products;

   
   Cart::add($data);
   return Redirect::to('show-cart');
 }  else{
  Session::put('message', 'Size hoặc màu bạn chọn hiện đang hết hàng!');
  return redirect()->back();


}
  
} else if ($_POST['action'] == 'add_cart') {
     $check_detail_product = false;
     $detail_products = ChiTietSP::where('id_san_pham',$id_product)->get();

     foreach ($detail_products as $detail){
       if($detail->id_mau == strval($req->color_products) &&
        $detail->id_size == strval($req->size_products) &&
        $detail->soluong > $req->qty){
        $check_detail_product = true;
      $data['id'] = $detail->id;

      break;
    }
    else{
      $check_detail_product = false;
    }
  }

  if($check_detail_product ==true)
  {
    $productId = $id_product;
    $quantity = $req->qty;
    $product = SanPham::where('id',$productId)->first();
    $chitietSP = chitietSP::where('id_san_pham',$productId)->get();
    $data['qty'] = $quantity;
    $data['name'] = $product->ten_san_pham;
    $data['price'] =  $product->gia;
    if($product->gia_khuyen_mai>0){

     $data['weight'] = $product->gia_khuyen_mai;
   }
   else{
     $data['weight'] = $product->gia;
   }
   $data['options']['image'] = $product->hinh;
   $data ['options']['size'] = $req->size_products;
   $data ['options']['color'] = $req->color_products;

   
   Cart::add($data);
    Session::put('message', 'Đã thêm vào giỏ hàng!');
   return redirect()->back();
 }  else{
  Session::put('message', 'Size hoặc màu bạn chọn hiện đang hết hàng!');
  return redirect()->back();


}
} else {
    echo "string";
}


}
public function show_cart(Request $req){
 $color = MauSP::all();
 $size = SizeSP::all();
 return view('cart.show_cart',compact('color','size'));

}
public function delete_to_cart($rowId ){
  Cart::update($rowId,0);
  return Redirect::to('show-cart');
}
public function update_cart(Request $req){
 $rowId = $req->row_card;
 $qty = $req->quantity_cart;
 Cart::update($rowId,$qty);
 return Redirect::to('show-cart');
}
}
