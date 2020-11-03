
@extends('home')
@section('content')

<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Thanh toán</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{URL::to('show-cart')}}">Your cart</a>
		</div>
	</div>
</div>
<!-- Page info end -->
<?php
$content =Cart::content();


?>
<?php
         $message = Session::get('message');
         if($message){

            echo '<div  class="alert alert-info">'.$message.'</div>';
            Session::put('message',null);
        }
        ?>
         @if(count($errors)>0 && Session::get('message_add') == 'message_checkout')
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>    
                            @endforeach
                        </div>
                        @endif
<!-- checkout section  -->
<section class="checkout-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-2 order-lg-1">
				<form method="post" action="{{'save-checkout'}}" class="checkout-form" name="checkout_form">
					{{csrf_field()}}
					<input value="{{floatval(implode(explode(',',Cart::subtotal())))}}" type="hidden" id="total_hidden" name="total_hidden">
					<div class="cf-title">Địa chỉ thanh toán</div>

					<div class="row address-inputs">
						<div class="col-md-6">

							<input  disabled="true"  value="{{Auth::user()->name}}"  type="text" placeholder="Tên người nhận">
						</div>
						<div class="col-md-6">
							<input required="" name="phone" type="text" placeholder="Số điện thoại">
						</div>
						<div class="col-md-12">
							<input required="" name="address" type="text" placeholder="Địa chỉ">


						</div>
						<div class="col-md-12">
							<input name="note" type="text" placeholder="Ghi chú">
						</div>

					</div>
					<div class="cf-title">Thông tin vận chuyển</div>
					<div class="row shipping-btns">
						<div class="col-6">
							<h4>Thông thường</h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input c onclick="handleClick(this);" value="1" type="radio" name="myRadios" id="ship-1">
									<label for="ship-1">Free</label>
								</div>
							</div>
						</div>
						<div class="col-6">
							<h4>Vận chuyển nhanh  </h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input onclick="handleClick(this);" value="2" type="radio" name="myRadios" id="ship-2">
									<label for="ship-2">{{number_format('20000')}}₫</label>
								</div>
							</div>
						</div>
					</div>
					<div class="cf-title">Hình thức thanh toán</div>
					{{-- <div class="col-6">
						<div class="cf-radio-btns">
							<div class="cfr-item">
								<input type="radio" name="order" id="oder-1">
								<label for="oder-1">Chuyển khoản<a href="#"><img src="img/mastercart.png" alt=""></a></label>

							</div>
						</div>
					</div> --}}
					{{-- <div class="col-6">
						<div class="cf-radio-btns">
							<div class="cfr-item">
								<input type="radio" name="order" id="oder-2">
								<label for="oder-2">Ví điện thử momo<a href="#"><img src="img/mastercart.png" alt=""></a></label>
							</div>
						</div>
					</div> --}}
					<div class="col-6">
						<div class="cf-radio-btns">
							<div class="cfr-item">
								<input   value="COD" checked="true" type="radio" name="order" id="oder-3">
								<label for="oder-3"><h4>Thanh toán khi nhận hàng</h4><a href="#"><img src="img/mastercart.png" alt=""></a></label>

							</div>
						</div>
					</div>

					<button class="site-btn submit-order-btn">Đặt hàng</button>
				</form>
			</div>
			<div class="col-lg-4 order-1 order-lg-2">
				<div class="checkout-cart">
					<a href="{{URL::to('show-cart')}}"><h3>Giỏ hàng</h3></a>
					<ul class="product-list">
						@foreach($content as $v_content)

						<li>
							<div class="pl-thumb"><img src="{{URL::to('resources/img/product/'.$v_content->options->image)}}" alt=""></div>
							<h6>{{$v_content->name}}</h6>

							@if($v_content->weight > 0)
							<p  class="p-price1 " style="margin-bottom: 0;color: #F51167;	">{{number_format($v_content->weight)}}₫ x {{$v_content->qty}}</p>
							<span class="sale1">{{number_format($v_content->weight)}}₫ </span>
							@else
							<p class="p-price">{{number_format($v_content->price)}}₫ x {{$v_content->qty}}</p>

							@endif
						</li>
						@endforeach
					</ul>
					<ul class="price-list">
						
						<li>Tổng :   {{number_format( floatval(implode(explode(',',Cart::subtotal()))))}}₫</li>
						<li>Shipping<p id="ship"></p></li>
						
						<li class="total">Total 	<h3 id="total">{{number_format( floatval(implode(explode(',',Cart::subtotal()))))}}₫</h3>
							</li>
					<script type="text/javascript">
							function handleClick(myRadio) {
								if(myRadio.value ==1)
								{
										 document.getElementById("ship").innerHTML = "Free";
										 document.getElementById("total").innerHTML = "{{number_format( floatval(implode(explode(',',Cart::subtotal()))))}}₫";
										  document.getElementById("total_hidden").value = "{{ floatval(implode(explode(',',Cart::subtotal())))}}";
								}
								else{
									if(myRadio.value==2){
										 document.getElementById("ship").innerHTML = "{{number_format('20000')}}₫";
										 document.getElementById("total").innerHTML = "{{number_format( floatval(implode(explode(',',Cart::subtotal())))+20000)}}₫";
										  document.getElementById("total_hidden").value = "{{floatval(implode(explode(',',Cart::subtotal())))+20000}}";
									}
								}
							
							}

						</script>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- checkout section end -->
@endsection