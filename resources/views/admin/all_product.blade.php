
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
        <?php
                        $message = Session::get('message');
                        if($message){

                            echo '<span class="alert alert-danger errorI">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
      </div>
      <div class="col-sm-3  searchGO">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá bán</th>
            <th>Giá khuyến mãi</th>
            <th>Danh mục</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Kiểu mẫu</th>
            <th>Phong cách</th>
            <th>Thành phần</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$product ->ten_san_pham}}</td>
            <td><span class="text-ellipsis">{{$product ->mo_ta}}</span></td>
            <td><span class="text-ellipsis">{{number_format($product->gia)}}₫</span></td>
            <td>
              @if($product ->gia_khuyen_mai ==0)
              <span class="text-ellipsis">null</span>
              @else
              <span class="text-ellipsis">{{number_format($product ->gia_khuyen_mai)}}₫</span>
              @endif
            </td>
            <td><span class="text-ellipsis">{{$product->loai_san_pham->ten_LSP}}</span></td>
            <td><span class="text-ellipsis"> <img src="resources/img/product/{{$product->hinh}}" height="100" width="75"></span></td>
            <td>                
              @if($product->moi==1)  {{-- bằng 1 là sp mới --}}
              <span class="text-ellipsis">Mới</span>
              @else\
              <span class="text-ellipsis">Na</span>
              @endif
           </td>
            <td><span class="text-ellipsis">{{$product->kieu_mau}}</span></td>
            <td><span class="text-ellipsis">{{$product->phong_cach}}</span></td>
            <td><span class="text-ellipsis">{{$product->thanh_phan}}</span></td>
            
            <td>
              <a href="{{route('edit_product',$product->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o fa-check text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có muốn chắc chắn xoá sản phẩm [{{$product->ten_san_pham}}] ?')" href="{{route('delete_product',$product->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
             </a>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of {{count($all_product)}} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
        @endsection