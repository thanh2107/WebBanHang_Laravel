
@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm

                        </header>
                        <?php
                        $message = Session::get('message');
                        if($message){

                            echo '<span class="alert alert-info">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        @if(count($errors)>0 && Session::get('message_add') == 'add_category')
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>    
                            @endforeach
                        </div>
                        @endif
                                <div class="panel-body">


                            <div class="position-center">
                                <form role="form" action="{{'save_category'}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Tên danh mục" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none " rows="8" class="form-control" id="category_name_desc" name="category_name_desc" placeholder="Mô tả danh mục"></textarea> 
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                              
                                <button type="submit" name="add_category" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>
        @endsection