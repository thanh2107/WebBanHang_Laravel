
	@extends('home')
	@section('content')

	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="panel-heading">
					<h3>  Danh sách đơn hàng</h3>
				</div>
				<div class="row w3-res-tb">
					

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
									<a href="{{route('view-order-customer',$order->id_hoa_don)}}" class="active styling-edit" ui-toggle-class="">
										<i class="fa fa-eye fa-check text-success text-active"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

	@endsection