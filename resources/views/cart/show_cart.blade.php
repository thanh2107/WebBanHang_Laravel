
@extends('home')
@section('content')

<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Your cart</h4>
		<div class="site-pagination">
			<a class="url-1" href="{{route('trang-chu')}}">Trang chủ /</a> 
			<a href="{{URL::to('show-cart')}}" >Giỏ hàng</a>
		</div>
	</div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<?php
$content =Cart::content();


?>
{{-- echo  '<pre>';
	print_r($content);
	echo  '<pre>';	 --}}
		<section class="cart-section spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="cart-table">
							<h3>Giỏ hàng của bạn</h3>
							<div class="cart-table-warp">
								<table>
									<thead>
										<tr>
											<th class="product-th">Sản Phẩm</th>
											<th class="quy-th">Màu</th>
											<th class="size-th">Size</th>
											<th class="quy-th">Số lượng</th>
											<th class="total-th">Giá</th>

										</tr>
									</thead>
									<tbody>
										@foreach($content as $v_content)

										<tr>
											<td class="product-col">
												<img src="{{URL::to('resources/img/product/'.$v_content->options->image)}}" alt="">
												<div class="pc-title">
													<h4>{{$v_content->name}}</h4>
													@if($v_content->weight > 0)
													<p  class="p-price1 " style="margin-bottom: 0;color: #F51167;	">{{number_format($v_content->weight)}}₫</p>
													<span class="sale1">{{number_format($v_content->price)}}₫</span>
													@else
													<p class="p-price">{{number_format($v_content->price)}}₫</p>

													@endif
												</div>
											</td>

											<td class="size-col"><h4>
												@foreach($color as $cl)
												@if($cl->id ==  strval($v_content->options->color))
												{{$cl->mau}}
												@endif
												@endforeach
											</h4></td>
											<td class="size-col">
												<h4>
														@foreach($size as $sz)
												@if($sz->id ==  strval($v_content->options->size))
												{{$sz->ten_size}}
												@endif
												@endforeach
													
												</h4></td>

											<td class="quy-col">
												<div class="quantity">
													<form action="{{'update-cart-quantity'}}"method="post">
														{{csrf_field()}}
														<input  class="quatity_input"  type="text" name="quantity_cart" value="{{$v_content->qty}}">
														<input  type="hidden" name="row_card" value="{{$v_content->rowId}}">
														<input type="submit"  value="cật nhật">
													</form>
												</div>
											</td>
											<td class="total-col"><?php
											
												$subtotal = $v_content->weight * $v_content->qty;
												echo number_format($subtotal).'₫';


											?></td>
											<td>
												<a href="{{URL::to('delete-to-cart',$v_content->rowId)}}" class="btn btnde99"><i class="fa fa-close"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="total-cost">
								<?php
								if(Cart::count()>0){
									$v_content->price = $v_content->weight;
								}?>
								<h6>Tổng tiền<span>
								{{number_format( floatval(implode(explode(',',Cart::subtotal()))))}}₫</span></h6> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 card-right">
						<form class="promo-code-form">
							<input type="text" placeholder="Nhập mã giảm giá">
							<button>Gửi</button>
						</form>
						<a href="{{URL::to('check-login')}}" class="site-btn">Tiến hành thanh toán</a>
						<a href="{{route('trang-chu')}}" class="site-btn sb-dark">Tiếp tục mua sắm</a>
					</div>
				</div>
			</div>
		</section>
		<!-- cart section end -->

		@endsection