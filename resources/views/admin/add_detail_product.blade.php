
@extends('admin_layout')
@section('admin_content')
<div  class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Chọn sản phẩm thêm chi tiết
         </header>
         <?php
         $message = Session::get('message');
         if($message){

            echo '<div  class="alert alert-info">'.$message.'</div>';
            Session::put('message',null);
        }
        ?>
        @if(count($errors)>0 && Session::get('message_add') == 'add_product_detail')
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>    
            @endforeach
        </div>
        @endif
        <div class="panel-body">


            <div class="col-lg-7">
                <form  role="form" action="{{'save_detail_product'}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="id_detail" name="id_detail" >
                     <div class="form-group col-md-12 col-not-pdleft">
                        <label for="exampleInputEmail1">Danh Mục</label>
                        <select required=""  id="detail_product" name="detail_product" class="form-control input-sm m-bot15 input_size" onchange="changeDeltail_product()">
                            
                             <option value="" selected disabled hidden>Choose here</option>
                            @foreach($all_category_product as $cate)
                            <option value="{{$cate->id_loai_san_pham}}">{{$cate->ten_LSP}}</option>

                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-not-pdleft">
                        <label id="name"  for="exampleInputEmail1">Sản phẩm</label>
                        <select required=""  id="product" name="product" class="form-control input-sm m-bot15 input_size" onchange="changeImg()">
                            
                             <option value="" selected disabled hidden>Choose here</option>
                            @foreach($product as $sp)
                            <option value="{{$sp->hinh}}">{{$sp->ten_san_pham}}</option>

                            @endforeach
                            
                        </select>
                    </div>
                    <div style="margin-bottom: 0;" class="form-group col-md-6">

                        <img id="img_product" style="display: block;" src="" width="170" height="200" />
                
                            <input type="hidden" id="id_product_Choose" name="id_product_Choose" >
                          
                        <script>
                        function changeDeltail_product() {
                          var x = document.getElementById("detail_product").value;
                        document.getElementById("product").style.visibility = "visible";
                        document.getElementById("name").style.visibility = "visible";

                  ;

                        }
                        function changeImg() {
                          var x = document.getElementById("product").value;
                          document.getElementById("img_product").src ="resources/img/product/"+x;
                          document.getElementById("id_product_Choose").value =""+x;
                     
                        } 
                        document.getElementById("product").style.visibility = "hidden";
                        document.getElementById("name").style.visibility = "hidden";
                           

                        </script>
                    </div>
                    <div class="col-md-6 form-group col-not-pdleft">
                        <label for="exampleInputEmail1">Màu sắc</label>
                        <select name="color_product" class="form-control input-sm m-bot15 input_size">
                            @foreach($color_product as $color)
                            <option value="{{$color->id}}">{{$color->mau}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-6 form-group col-not-pdleft">
                        <label for="exampleInputEmail1">Kích thước</label>
                        <select name="size_product" class="form-control input-sm m-bot15 input_size">
                            @foreach($size_product as $size)
                            <option value="{{$size->id}}">{{$size->ten_size}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-not-pdleft">
                        <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                        <input type="number" value="0" class="form-control" id="quantity" name="quantity">
                    </div>


                    <div class="form-group col-md-12 col-not-pdleft">
                        <button type="submit" name="action" value="add_detail_product" class="site-btn site-btn100">Thêm chi tiết sản phẩm</button>
                    </div>

                </form>
            </div>
            <div class="col-lg-5">
                <section class="panel">

                    <div id="accordion" class="accordion-area">
                        <div class="panel">
                            <div class="panel-header" id="headingThree">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Thêm kích thước và màu</button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="panel-body">
                                  <label for="exampleInputEmail1">Thêm danh sách hình mới</label>

                                  <div class="panel-body">
                                     <form  role="form" action="{{'save_color_size'}}" method="post" >
                                         {{csrf_field()}}
                                     <div class="col-md-6 form-group ">
                                        <label for="exampleInputEmail1">Tên màu</label>
                                        <input type="text" class="form-control" id="name_color" name="name_color" >
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <br>
                                        <button type="submit" name="action" value="add_color" class="btn btn-primary form-control">Thêm</button>
                                    </div>

                                    <div class="col-md-6 form-group ">
                                        <label for="exampleInputEmail1">Tên kích thước</label>
                                        <input type="text" class="form-control" id="name_size" name="name_size" >
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <br>
                                        <button type="submit" name="action" value="add_size" class="btn btn-primary form-control">Thêm</button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                
       </div>

   </section>

</div>

</div>

</section>

</div>

</div>
@endsection