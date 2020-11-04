
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách đơn hàng
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
            
            <th>Mã</th>
            <th>Tên người đặt</th>
            <th>Tổng giá tiền</th>
            <th>Phương thức thanh toán</th>
            <th>Ngày đặt hàng</th>
             <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $order)
          <tr>
            <td>{{$order->id_hoa_don}}</td>
            <td>{{$order->user->name}}</td>
            <td><span class="text-ellipsis">{{number_format($order ->tong_tien)}}₫</span></td>
            <td><span class="text-ellipsis">{{$order ->thanh_toan}}</span></td>
            <td><span class="text-ellipsis">{{$order ->ngay_mua}}</span></td>
            <td><span class="text-ellipsis">{{$order ->trang_thai}}</span></td>
            <td>
              <a href="{{route('view-order',$order->id_hoa_don)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye fa-check text-success text-active"></i>
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of {{count($all_order)}} items</small>
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