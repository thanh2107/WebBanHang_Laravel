
@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Thêm slide

         </header>
         <?php
         $message = Session::get('message');
         if($message){

            echo '<span class="alert alert-info">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        @if(count($errors)>0 && Session::get('message_add') == 'add_slide')
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>    
            @endforeach
        </div>
        @endif
        <div class="panel-body">


            <div class="position-center">
                <form role="form" name="mainForm" action="{{'save-slide'}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên slide</label>
                        <input type="text" class="form-control" id="slide_name" name="slide_name" placeholder="Tên slide" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" id="tittle_name" name="tittle_name" placeholder="Tên danh mục" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>
                        <textarea style="resize: none " rows="8" class="form-control" id="contten_slide" name="contten_slide" placeholder="Nội dung"></textarea> 
                    </div>
                    <div class="form-group col-md-4 col-not-pdleft">
                        <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="slide_img" required="" name="slide_img"   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>

                    <div style="margin-bottom: 0;" class="form-group col-md-8">
                        <img  style="display: block;" id="blah" alt="your image" width="320" height="125" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Link silde :</label>
                       
                    
                
                    </div>

                    <div class="form-group col-md-12 col-not-pdleft">

                        <div class="form-group col-md-6">
                            <label  class="block">
                                <input     class="rd3" type="radio" name="rads" value="1">Danh mục</label>
                           <select disabled="true" id="catelogy"  name="catelogy" class="form-control input-sm m-bot15 input_size">
                               <option value="" selected disabled hidden>Choose here</option>
                               @foreach($catelogy as $type)
                               <option value="{{$type->id_loai_san_pham}}">{{$type->ten_LSP}}</option>
                               @endforeach          
                           </select>
                       </div>
                       <div class="form-group col-md-6">
                        <label class="block">
                            <input  class="rd3" type="radio" name="rads" value="2">Sản Phẩm</label>
                        <select disabled="true" id="product" name="product" class="form-control input-sm m-bot15 input_size">
                           <option value="" selected disabled hidden>Choose here</option>
                           @foreach($product as   $sp)
                           <option value="{{$sp->id}}">{{$sp->ten_san_pham}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>
                   

                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="slide_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>

                    <button type="submit" name="add_slide" class="btn btn-info">Thêm slide</button>
                </form>
                <script type="text/javascript">
                   document.mainForm.onclick = function(){
                    var radVal = document.mainForm.rads.value;
                    if(radVal == 1) 
                    {
                        document.getElementById("product").disabled= true;
                        document.getElementById("catelogy").disabled= false;
                      
                    }
                    if(radVal == 2)
                    {
                         
                         document.getElementById("product").disabled= false;
                         document.getElementById("catelogy").disabled= true;
                    }
                      

                }
            </script>
                   <span id="result"></span>
            </div>

        </div>
    </section>

</div>

</div>
@endsection