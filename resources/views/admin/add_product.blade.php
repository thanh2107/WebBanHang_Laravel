
@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Thêm sản phẩm

         </header>
         <?php
         $message = Session::get('message');
         if($message){

            echo '<div  class="alert alert-info">'.$message.'</div>';
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
                <form role="form" action="{{'save_product'}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Tên sản phẩm" required="">
                    </div>
                    <div class="col-md-6 form-group col-not-pdleft">
                        <label for="exampleInputEmail1">Giá</label>
                        <input type="number" class="form-control" id="gia_sanpham" name="gia_sanpham" required="">
                    </div>
                    <div class="col-md-6 form-group col-not-pdleft">
                        <label for="exampleInputEmail1">Giá khuyến mãi</label>
                        <input type="number" value="0" class="form-control" id="gia_khuyen_mai_sanpham" name="gia_khuyen_mai_sanpham" >
                    </div>
                    <div class="form-group col-md-4 col-not-pdleft">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <select name="category_product" class="form-control input-sm m-bot15 input_size">
                            @foreach($all_category_product as   $type)
                            <option value="{{$type->id_loai_san_pham}}">{{$type->ten_LSP}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5 col-not-pdleft">
                        <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="product_img" required="" name="product_img"   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div style="margin-bottom: 0;" class="form-group col-md-1">
                        <img  style="display: block;" id="blah" alt="your image" width="75" height="100" />
                    </div>
                    <div class="form-group col-not-pdleft">
                        <label for="exampleInputPassword1">Mô tả chung sản phẩm</label>
                        <textarea style="resize: none " rows="8" class="form-control" id="product_desc" name="product_desc" placeholder="Mô tả sản phẩm" required=""></textarea> 
                    </div>
                    <div class="form-group col-md-6 col-not-pdleft">
                        <label for="exampleInputEmail1">Kiểu mẫu </label>
                        <input type="text" class="form-control" id="kieu_mau" name="kieu_mau">
                    </div>
                    <div class="form-group col-md-6 col-not-pdleft" >
                        <label for="exampleInputEmail1">Phong cách</label>
                        <input type="text" class="form-control" id="phong_cach" name="phong_cach">
                    </div>
                    <div class="form-group col-md-6 col-not-pdleft">
                        <label for="exampleInputEmail1">Thành phần</label>
                        <input type="text" class="form-control" id="thanh_phan" name="thanh_phan">
                    </div>



                    <div class="form-group col-md-6 col-not-pdleft">
                        <label for="exampleInputPassword1">Sản phẩm mới</label>
                        <select name="product_status_new" class="form-control input-sm m-bot15">

                           <option value="1">Hiển thị</option>
                           <option value="0">Ẩn</option>

                       </select>
                   </div>
                   <div class="form-group col-md-12 col-not-pdleft">
                    <button type="submit" name="action" value="add_product" class="btn btn-success">Thêm sản phẩm</button>
                </div>
                    </div>
                    <div class="col-md-4">
                      <div class="panel">
                        <div class="panel-body">
                          <div class="panel-body">
                           
                            <div class="col-md-6 form-group ">
                                <label for="exampleInputEmail1">Hình ảnh chi tiết</label>
                                
                            </div>

                            @for($i = 1 ; $i <= 4 ; $i++)
                            <div  class="form-group col-md-12  frex-ds">
                                <label class="name-img-rigth" for="exampleInputPassword1">H{!!$i!!}</label>
                                <input  type="file" class="form-control " id="product_img{!!$i!!}" name="product_img{!!$i!!}" onchange="document.getElementById('hinh{!!$i!!}').src = window.URL.createObjectURL(this.files[0])">
                                <img  style="display: block;" id="hinh{!!$i!!}"  width="60" height="75" />
                                <a id="rmv{!!$i!!}" class="active styling-edit" ui-toggle-class="" href="#">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                                <script type="text/javascript">
                                    document.getElementById('rmv{!!$i!!}').addEventListener('click', function () {
                                        document.getElementById('product_img{!!$i!!}').value = '';
                                        document.getElementById('hinh{!!$i!!}').src = ""

                                    });
                                </script>
                            </div>
                            @endfor
                            
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