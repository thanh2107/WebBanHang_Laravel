
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục slide
    </div>
    <div class="row w3-res-tb">
      
       <div class="col-sm-3  ">
        <div class="input-group">
          <span class="input-group-btn">
            
            <a href="{{route('add-slide')}}" class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus-square-o pads" ></i>Thêm silde</a>
          </span>
        </div>
      </div>
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
            <th>Tên slide</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Trạng thái</th>
            <th>Hình ảnh</th>
            <th>Đường dẫn</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_slide as $slide)
          <tr>
             <td>{{$slide ->ten_slide}}</td>
            <td>{{$slide ->tieu_de}}</td>
            <td><span class="text-ellipsis">{{$slide ->noi_dung}}</span></td>
            <td>
              @if($slide->trang_thai==0)
              <span class="text-ellipsis">Ẩn</span>
              @else
              <span class="text-ellipsis">Hiển thị</span>
              @endif
            </td>
              <td><span class="text-ellipsis"> <img src="resources/img/slide/{{$slide->img}}" height="75" width="192"></span></td>
              <td>Đường dẫn</td>
            <td>
              <a href="{{route('edit-slide',$slide->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o fa-check text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có muốn chắc chắn xoá danh mục [{{$slide->ten_slide}}] ?')" href="{{route('delete-slide',$slide->id)}}" class="active styling-edit" ui-toggle-class="">
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of {{count($all_slide)}}</small>
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