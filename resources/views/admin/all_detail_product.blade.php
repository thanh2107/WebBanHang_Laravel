
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết sản phẩm
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
            <th>Màu</th>
            <th>Size</th>
            <th>Tồn kho</th>
            <th>Đã bán</th>      

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($detail_product as $del)
          <tr>     
            <form role="form" action="{{route('update_detail_product',$del->id)}}" method="post">
              {{csrf_field()}}
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">{{$del->san_pham->ten_san_pham}}</span></td>
            <td><span class="text-ellipsis">{{$del->mau_sp->mau}}</span></td>
            <td><span class="text-ellipsis">{{$del->size_sp->ten_size}}</span></td>
            <td><input type="text" value="{{$del->soluong}}" name="so_luong"></td>
            <td><span class="text-ellipsis">{{$del->da_ban}}</span></td>
             <td>
              <input type="submit" value="Cật nhật " name="update_detail_product"></input>
              <a onclick="return confirm('Bạn có muốn chắc chắn xoá sản phẩm [{{$del ->san_pham->ten_san_pham}}] ?')" href="{{route('delete_detail_product',$del->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
             </a>
            </form>
            </td>

          </tr>
         @endforeach
        </tbody>
      </table>
 
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 10-30 of {{count($detail_product)}} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           
           
            {!! $detail_product->render() !!}
    
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
        @endsection