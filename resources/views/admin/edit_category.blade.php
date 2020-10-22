
@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cật nhật danh mục sản phẩm

                        </header>
                                <div class="panel-body">


                            <div class="position-center">
                                <form role="form" action="{{route('update_category',$category_product->id_loai_san_pham)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" required="" value="{{$category_product->ten_LSP}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" id="category_name_desc" name="category_name_desc" >{{$category_product->mo_ta}}</textarea> 
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15">
                                      @if($category_product->trang_thai==0)
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                        @else
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                              
                                <button type="submit" name="update_category" class="btn btn-success">Cật nhật danh mục</button>
                               <a style="color: #fff" class="btn btn-info" href="{{route('all_category')}}"> Quay lại </a> 
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>
        @endsection