
@extends('home')
@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>CHI TIẾT SẢN PHẨM</h4>
			
			<div class="site-pagination url-1">
				<a class="url-1" href="{{route('trang-chu')}}">Home /</a> 
				<span> Thời trang /</span>
			</div>
			<div class="site-pagination url-1">
				<a class="url-1" href="">{{$sanpham->loai_san_pham->ten_LSP}} /</a> 
			</div>
			<div class="site-pagination url-1">
				<span class="url-1" href="">{{$sanpham->ten_san_pham}} </span> 
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="{{route('danh_muc')}}"> &lt;&lt; Trở lại danh mục</a>
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
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h2:''}}"><img src="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h2:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h3))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h3:''}}"><img src="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h3:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h4))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h4:''}}"><img src="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h4:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h5))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h5:''}}"><img src="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h5:''}} "alt=""></div>
								@endif
								@if(!empty($hinh->hinh_sp->h6))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h6:''}}"><img src="resources/img/product/{{$sanpham->id}}/{{!empty($hinh->hinh_sp) ? $hinh->hinh_sp->h6:''}} "alt=""></div>
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
									
								<p>{{$sanpham ->mo_ta}}<br>
								Phong cách: {{$sanpham ->phong_cach}}<br>
								Kiểu mẫu: {{$sanpham ->kieu_mau}}<br>
								Thành Phần: {{$sanpham ->thanh_phan}}</p>
								
		
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
				<h2>SẢN PHẨM LIÊN QUAN</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($sanpham_lienquan as $sl)
					<div class="product-item">
						<div class="pi-pic" onclick="window.location='{{route('chi-tiet-san-pham',$sl->id)}}';">
							@if($sl->gia_khuyen_mai > 0)
							<div class="tag-sale">ON SALE</div>
							@endif
							<img src="resources/img/product/{{$sl->hinh}}" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							
							@if($sl->gia_khuyen_mai > 0)
								<h6 class="sale">{{number_format($sl->gia_khuyen_mai)}}₫</h6>
								<p>{{$sl->ten_san_pham}} </p>
								<br>
								<span>{{number_format($sl->gia)}}₫</span>
							@else
								<h6>{{number_format($sl->gia)}}₫</h6>
								<p>{{$sl->ten_san_pham}} </p>
							@endif
							
						</div>
					</div>

					@endforeach
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->
@endsection