@extends('home')
@section('content')
<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Thanh toán</h4>
			<div class="site-pagination">
				<a href="{{route('trang-chu')}}">Home</a> /
				<a href="">Checkout</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form">
						<div class="cf-title">Địa chỉ giao hàng</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Thông tin thanh toán</p>
							</div>
							<div class="col-md-5">
								<div class="cf-radio-btns address-rb">
									<div class="cfr-item">
										<input type="radio" name="pm" id="one">
										<label for="one">Nhận hàng tại nhà</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Nhận tại cửa hàng</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Tên người nhận">
								<input type="text" placeholder="Địa chỉ">
								<input type="text" placeholder="Ghi chú">
							</div>
							
							<div class="col-md-6">
								<input type="text" placeholder="Số điện thoại">
							</div>
						</div>
						<div class="cf-title">Thông tin vận chuyển</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Thông thường</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-1">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Chuyển phát nhanh</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Thanh toán</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="resources/img/paypal.png" alt=""></a></li>
							<li>Credit / Debit card<a href="#"><img src="resources/img/mastercart.png" alt=""></a></li>
							<li>Thanh toán khi nhận hàng</li>
						</ul>
						<button class="site-btn submit-order-btn">Đặt hàng</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Giỏ hàng</h3>
						<ul class="product-list">
							<li>
								<div class="pl-thumb"><img src="resources/img/cart/1.jpg" alt=""></div>
								<h6>Animal Print Dress</h6>
								<p>$45.90</p>
							</li>
							<li>
								<div class="pl-thumb"><img src="resources/img/cart/2.jpg" alt=""></div>
								<h6>Animal Print Dress</h6>
								<p>$45.90</p>
							</li>
						</ul>
						<ul class="price-list">
							<li>Tổng<span>$99.90</span></li>
							<li>Shipping<span>free</span></li>
							<li class="total">Tổng<span>$99.90</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->
	@endsection