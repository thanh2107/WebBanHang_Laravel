
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
                <form  role="form" name="mainForm" action="{{route('update-slide',$slide->id)}}" method="post" >
                    {{csrf_field()}}
                    <input type="hidden" name="slide" id="_product" value="{{$slide->link_product_id}}">
                    <input type="hidden" name="link_catelogy" id="_catelogy" value="{{$slide->link_catelory_id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên slide</label>
                        <input type="text" class="form-control" id="slide_name" value="{{$slide->ten_slide}}" name="slide_name" placeholder="Tên slide" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input value="{{$slide->tieu_de}}" type="text" class="form-control" id="tittle_name" name="tittle_name" placeholder="Tên danh mục" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>
                        <textarea  style="resize: none " rows="8" class="form-control" id="contten_slide" name="contten_slide"  >{{$slide->noi_dung}}</textarea> 
                    </div>


                    <div style="margin-bottom: 0;" class="form-group col-md-12">
                        <img onload="loadImage()" src="{{URL::to('resources/img/slide/'.$slide->img)}}" style="display: block;" id="blah" alt="your image" width="640" height="250" />
                        
                    </div>
                    

                    <div class="form-group col-md-12 col-not-pdleft">
                      
                            <label class="p22" for="exampleInputPassword1">Link</label>
                             @if($slide->link_catelory_id !=0)
                                @foreach($catelogy as $cat)
                                @if($cat->id_loai_san_pham == $slide ->link_catelory_id)
                                <label  class="block">
                                    Danh mục: {{$cat->ten_LSP}}</label>
                                    @endif
                                    @endforeach
                            @endif
                            @if($slide->link_product_id !=0)
                        
                                @foreach($product as $pro)
                                @if($pro->id == $slide ->link_catelory_id)
                                <label  class="block">
                                    Danh mục: {{$pro->ten_san_pham}}</label>
                                    @endif
                                @endforeach
                            @endif
                                
                            </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="slide_status" class="form-control input-sm m-bot15">
                            @if($slide->trang_thai==0)
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                            @else
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                            @endif
                        </select>
                    </div>

                    <button type="submit" name="add_slide" class="btn btn-success">Cật nhật slide</button>
                    <a style="color: #fff" class="btn btn-info" href="{{route('all-slide')}}"> Quay lại </a> 
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