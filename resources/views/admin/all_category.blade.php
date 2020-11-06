
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
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
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category as $category)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$category ->ten_LSP}}</td>
            <td><span class="text-ellipsis">{{$category ->mo_ta}}</span></td>
            <td>
              @if($category->trang_thai==0)
              <span class="text-ellipsis">Ẩn</span>
              @else
              <span class="text-ellipsis">Hiển thị</span>
              @endif
            </td>
            <td>
              <a href="{{route('edit_category',$category->id_loai_san_pham)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o fa-check text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có muốn chắc chắn xoá danh mục [{{$category->ten_LSP}}] ?')" href="{{route('delete_category',$category->id_loai_san_pham)}}" class="active styling-edit" ui-toggle-class="">
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
          <small class="text-muted inline m-t-sm m-b-sm">showing {{count($all_category)}}items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_category->render() !!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection