
@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cật nhật sản phẩm

                        </header>
                        <?php
                        $message = Session::get('message');
                        if($message){

                            echo '<span class="alert alert-info">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        @if(count($errors)>0 && Session::get('message_add') == 'add_product')
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>    
                            @endforeach
                        </div>
                        @endif
                                <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{route('update_product',$product->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"  required="" value="{{$product->ten_san_pham}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" class="form-control" id="gia_sanpham" name="gia_sanpham" required="" value="{{$product->gia}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                    <input type="number" class="form-control" id="gia_khuyen_mai_sanpham" name="gia_khuyen_mai_sanpham"value="{{$product->gia_khuyen_mai}}">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="category_product" class="form-control input-sm m-bot15 input_size">
                                        @foreach($all_category_product as   $type)
                                        @if($type->id_loai_san_pham == $product->id_loai_san_pham)
                                        <option selected value="{{$type->id_loai_san_pham}}">{{$type->ten_LSP}}</option>
                                        @else
                                        @endif
                                        <option value="{{$type->id_loai_san_pham}}">{{$type->ten_LSP}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                   <input type="file" class="form-control" id="product_img" name="product_img" >
                                   <img src="{{URL::to('resources/img/product/'.$product->hinh)}}" height="100" width="75">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả chung sản phẩm</label>
                                    <textarea style="resize: none " rows="8" class="form-control" id="product_desc" name="product_desc"  required="">{{$product->mo_ta}}</textarea> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Kiểu mẫu </label>
                                    <input type="text" class="form-control" id="kieu_mau" name="kieu_mau" value="{{$product->kieu_mau}}">
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="exampleInputEmail1">Phong cách</label>
                                    <input type="text" class="form-control" id="phong_cach" name="phong_cach"value="{{$product->phong_cach}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Thành phần</label>
                                    <input type="text" class="form-control" id="thanh_phan" name="thanh_phan" value="{{$product->thanh_phan}}">
                                </div>
                       
                          

                                <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Sản phẩm mới</label>
                                    <select name="product_status_new" class="form-control input-sm m-bot15">
                                        @if($product->moi==0)
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                        @else
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                        @endif
                                       
                                    </select>
                                </div>
                              <div class="form-group col-md-6">
                                   <button type="submit" name="update_product" class="btn btn-success">Cật nhật sản phẩm</button>
                                 <a style="color: #fff" class="btn btn-info" href="{{route('all_product')}}"> Quay lại </a> 
                              </div>
                               

                            </form>
                            </div>

                        </div>
                       
                    </section>

            </div>
          
        </div>
        @endsection