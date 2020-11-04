
@extends('home')
@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>CHI TIẾT SẢN PHẨM</h4>
			
			<div class="site-pagination url-1">
				<a class="url-1" href="{{route('trang-chu')}}">Trang chủ/</a> 
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
			<?php
         $message = Session::get('message');
         if($message){

            echo '<div  class="alert alert-danger">'.$message.'</div>';
            Session::put('message',null);
        }
        ?>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="resources/img/product/{{$sanpham->hinh}}" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="resources/img/product/{{$sanpham->hinh}}"><img src="resources/img/product/{{$sanpham->hinh}}" alt=""></div>
					
								@if(!empty($sanpham->h1))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h1}}"><img src="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h1}}"alt=""></div>
								@endif
								@if(!empty($sanpham->h2))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h2}}"><img src="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h2}}"alt=""></div>
								@endif
								@if(!empty($sanpham->h3))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h3}}"><img src="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h3}}"alt=""></div>
								@endif
								@if(!empty($sanpham->h4))	
								<div class="pt" data-imgbigurl="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h4}}"><img src="resources/img/product/{{$sanpham->ten_file}}/{{$sanpham->h4}}"alt=""></div>
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
				
					
					<table style="max-width: 60%" class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Màu</th>
      <th scope="col">Size</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($color_product as $mau)
	 <tr>
      <td>{{$mau->mau_sp->mau}}</td>
      <td> 	@foreach($chitietsp as $detail)
      		@if($detail->id_mau==$mau->mau_sp->id && $detail->soluong>0)
      		{{$detail->size_sp->ten_size}}
      		@endif
      		@endforeach

      </td>
     
    </tr>
	@endforeach

  </tbody>
</table>


				
					<form role="form" action="{{route('add-cart',$sanpham->id)}}" method="post">
 						{{csrf_field()}}
                    <div class="fw-size-choose">
						<p>Màu</p>
						 <select  name="color_products" class="form-control w-25 qq2p">
                           @if(!empty($color_product))
							@foreach($color_product as $mau)
                            <option value="{{$mau->mau_sp->id}}">{{$mau->mau_sp->mau}}</option>
                            @endforeach
                           @endif
                        </select>
					</div>
					<div class="fw-size-choose">
						<p>Size</p>
						@if(!empty($size_product))
							@foreach($size_product as $sz)
							<div class="sc-item">
								<input required value="{{$sz->size_sp->id}}" type="radio" name="size_products" id="{{$sz->size_sp->ten_size}}">
								<label for="{{$sz->size_sp->ten_size}}">{{$sz->size_sp->ten_size}}</label>	
							</div>
							@endforeach
						@endif
					</div>
											
					<div class="quantity">
						<p>Số lượng</p>
                        <div class="pro-qty"><input name="qty" type="text" value="1">
                        	
                        </div>
                    </div>

			
					<button type="submit" name="action" value="add_cart" class="site-btn">Thêm vào giỏ hàng</button>
					<button type="submit" name="action" value="buy_now" class="site-btn sb-dark">Mua ngay</button>
					
					</form>
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
								<a href="{{route('chi-tiet-san-pham',$sl->id)}}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
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