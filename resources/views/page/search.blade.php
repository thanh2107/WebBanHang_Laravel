
@extends('home')
@section('content')
	



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>Sản Phẩm tìm kiếm</h2>
			</div>						
			<div class="row">
				@foreach($search_product as $sl)
				<div class="col-lg-3 col-sm-6"> 
					<div class="product-item">
						<div class="pi-pic"  onclick="window.location='{{route('chi-tiet-san-pham',$sl->id)}}';">
								
							@if($sl->gia_khuyen_mai > 0)
							<div class="tag-sale">ON SALE</div>
							@endif
							<img src="resources/img/product/{{$sl->hinh}}" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>THÊM VÀO GIỎ</span></a>
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
				</div>
				@endforeach
				
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">TẢI THÊM</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="resources/img/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>STRIPED SHIRTS</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->
	@endsection