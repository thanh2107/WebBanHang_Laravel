
@extends('home')
@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>CHI TIẾT SẢN PHẨM</h4>
			<div class="site-pagination">
				<a href="{{route('trang-chu')}}">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="#"> &lt;&lt; Trở lại danh mục</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="resources/img/product/{{$sanpham->hinh}}" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="resources/img/product/{{$sanpham->hinh}}"><img src="resources/img/product/{{$sanpham->hinh}}" alt=""></div>
							@if(!empty($hinh))
					
								@if(!empty($hinh->hinh_sp->h2))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h2:''}}"><img src="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h2:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h3))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h3:''}}"><img src="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h3:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h4))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h4:''}}"><img src="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h4:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h5))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h5:''}}"><img src="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h5:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h6))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h6:''}}"><img src="resources/img/product/{{$sanpham->id_san_pham}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h6:''}} "alt=""></div>
								@endif

							@endif
				
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{$sanpham->ten_san_pham}}</h2>
					{{-- <h3 class="p-price">{{$sanpham->gia}}</h3> --}}
					@if($sanpham->gia_khuyen_mai > 0)
								<h3 class="p-price1 " style="margin-bottom: 0">{{number_format($sanpham->gia_khuyen_mai)}}₫</h3>
								<span class="sale1">{{number_format($sanpham->gia)}}₫</span>
							@else
								<h3 class="p-price">{{number_format($sanpham->gia)}}₫</h3>
							@endif
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="fw-size-choose">
						<p>Size</p>
						@if(!empty($chitietsp))
							@foreach($chitietsp as $sz)
							<div class="sc-item">
								<input type="radio" name="sc" id="{{$sz->size_sp->ten_size}}">
								<label for="{{$sz->size_sp->ten_size}}">{{$sz->size_sp->ten_size}}</label>	
							</div>
							@endforeach
						@endif
					</div>
					<div class="quantity">
						<p>Số lượng</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a href="#" class="site-btn">Thêm vào giỏ hàng</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Mô tả</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{$sanpham ->mo_ta}}</p>
								
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="resources/img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>

								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Phí vận chuyển & Hoàn trả</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">

									<h4>Miễn phí vận chuyển</h4>
									<p>
                    Giao hàng miễn phí với mức giá cố định cho các đơn hàng trên 99.000₫
                     </span></p>
									<p>Trả lại hoặc trao đổi trong vòng 30 ngày kể từ ngày giao hàng.<br>
									Yêu cầu:<br>
								1. Các mặt hàng nhận được trong vòng 30 ngày kể từ ngày giao hàng.<br>
								2. Các mặt hàng nhận được không sử dụng, không bị hư hỏng và trong gói ban đầu.<br>
								3. Phí vận chuyển trở lại được trả bởi người mua.
							</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="resources/img/product/1.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="resources/img/product/2.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{$sanpham->gia}}/h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="resources/img/product/3.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="resources/img/product/4.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="resources/img/product/6.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->
@endsection