
@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cật nhật sản phẩm
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
                            <div class="col-md-12">
                                <form role="form" action="{{route('update_product',$product->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input id="as1" type="hidden" name="as[1]">
                                    <input id="as2" type="hidden" name="as[2]">
                                    <input id="as3" type="hidden" name="as[3]">
                                    <input id="as4" type="hidden" name="as[4]">
                                    <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"  required="" value="{{$product->ten_san_pham}}">
                                </div>
                                <div class="col-md-6 form-group  col-not-pdleft">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" class="form-control" id="gia_sanpham" name="gia_sanpham" required="" value="{{$product->gia}}">
                                </div>
                                <div class="col-md-6 form-group  col-not-pdleft">
                                    <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                    <input type="number" class="form-control" id="gia_khuyen_mai_sanpham" name="gia_khuyen_mai_sanpham"value="{{$product->gia_khuyen_mai}}">
                                </div>
                                <div class="form-group col-md-4 col-not-pdleft ">
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
                                <div class="form-group col-md-5 col-not-pdleft">
                                    <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                   <input type="file" class="form-control" id="product_img" name="product_img"onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                                   
                                  
                                </div>
                                 <div style="margin-bottom: 0;" class="form-group col-md-1">
                                   <img src="{{URL::to('resources/img/product/'.$product->hinh)}}"  style="display: block;" id="blah" alt="your image" width="75" height="100" >

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả chung sản phẩm</label>
                                    <textarea style="resize: none " rows="8" class="form-control" id="product_desc" name="product_desc"  required="">{{$product->mo_ta}}</textarea> 
                                </div>
                                <div class="form-group col-md-6 col-not-pdleft">
                                    <label for="exampleInputEmail1">Kiểu mẫu </label>
                                    <input type="text" class="form-control" id="kieu_mau" name="kieu_mau" value="{{$product->kieu_mau}}">
                                </div>
                                <div class="form-group col-md-6 col-not-pdleft" >
                                    <label for="exampleInputEmail1">Phong cách</label>
                                    <input type="text" class="form-control" id="phong_cach" name="phong_cach"value="{{$product->phong_cach}}">
                                </div>
                                <div class="form-group col-md-6 col-not-pdleft">
                                    <label for="exampleInputEmail1">Thành phần</label>
                                    <input type="text" class="form-control" id="thanh_phan" name="thanh_phan" value="{{$product->thanh_phan}}">
                                </div>
                       
                          

                                <div class="form-group col-md-6 col-not-pdleft">
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
                              <div class="form-group col-md-6 col-not-pdleft">
                                   <button onclick="reply_click()" type="submit" name="update_product" class="btn btn-success">Cật nhật sản phẩm</button>
                                 <a style="color: #fff" class="btn btn-info" href="{{route('all_product')}}"> Quay lại </a> 
                              </div>
                               
                          </div>

                          <div class="col-md-4">
                      <div class="panel">
                        <div class="panel-body">
                          <div class="panel-body">
                           
                            <div   class="col-md-6 form-group ">
                                <label for="exampleInputEmail1">Hình ảnh chi tiết</label>
                                
                            </div>
                            @for($i = 1 ; $i <= 4 ; $i++)
                            <div id="cont{!!$i!!}" class="form-group col-md-12  frex-ds">
                                <label class="name-img-rigth" for="exampleInputPassword1">H{!!$i!!}</label>
                                <input  type="file" class="form-control " id="product_img{!!$i!!}" name="product_img{!!$i!!}" onchange="document.getElementById('hinh{!!$i!!}').src = window.URL.createObjectURL(this.files[0])">
                                @if($i==1)
                                    @if(!empty($product->h1))
                                    <img  src="{{URL::to('resources/img/product/'.$product->ten_file.$product->h1)}}" style="display: block;" id="hinh{!!$i!!}"  name="hinh1" width="60" height="75"  />
                                    @else 
                                    <img style="display: block;" id="hinh{!!$i!!}" name="hinh1"  width="60" height="75" />
                                    @endif
                                @endif


                                 @if($i==2)
                                     @if(!empty($product->h2))
                                     <img  src="{{URL::to('resources/img/product/'.$product->ten_file.$product->h2)}}" style="display: block;" id="hinh{!!$i!!}" name="hinh2"  width="60" height="75" />
                                     @else 
                                     <img  style="display: block;" id="hinh{!!$i!!}" name="hinh2" width="60" height="75" />
                                     @endif

                                 @endif

                                 @if($i==3)
                                     @if(!empty($product->h3))
                                     <img  src="{{URL::to('resources/img/product/'.$product->ten_file.$product->h3)}}" style="display: block;" id="hinh{!!$i!!}" name="hinh3" width="60" height="75" />
                                     @else 
                                     <img  style="display: block;" id="hinh{!!$i!!}"name="hinh3"  width="60" height="75" />
                                     @endif
                                   
                                 @endif
                                 @if($i==4)
                                     @if(!empty($product->h4))
                                     <img  src="{{URL::to('resources/img/product/'.$product->ten_file.$product->h4)}}" style="display: block;" id="hinh{!!$i!!}" name="hinh4"  width="60" height="75" />
                                     @else 
                                     <img  style="display: block;" id="hinh{!!$i!!}"  name="hinh4" width="60" height="75" />
                                     @endif
                                @endif
                                
                                <a id="rmv{!!$i!!}" class="active styling-edit" ui-toggle-class="" href="#">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                                <script type="text/javascript">
                                    document.getElementById('rmv{!!$i!!}').addEventListener('click', function () {
                                        document.getElementById('product_img{!!$i!!}').value = '';
                                        document.getElementById('hinh{!!$i!!}').src = "";
                                       
                                    });
                                   
                                     
                                </script>
                            </div>
                            @endfor
                            <script type="text/javascript">
                                function reply_click()
                                    {   
                                        var as = [];
                                        for (var i = 1; i <5; i++ ){
                                               $('#cont'+i).children('img').each(function () {
                                                 as[i] = $(this).attr('src');
                                            
                                            }); 

                                           document.getElementById("as"+i).value=as[i];
                                             }
                                      
                                           
                                            
                                         
                                     }
                            </script>
                            
                        </div>

                    </div>
                </div>
            </div>
                            </form>
                            </div>

                        </div>
                       
                    </section>

            </div>
          
        </div>
        @endsection