

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="index" class="site-logo">
							<img src="resources/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Tìm kiếm trong divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="#">Đăng nhập</a> hoặc <a href="#">tạo tài khoản</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="#">Giỏ hàng</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href= "{{route('trang-chu')}}">Trang chủ</a></li>
					<li><a href="#">Đồng giá</a>
						<ul class="sub-menu">
							<li><a href="checkout.html">Đồng giá 39k-49k-59k</a></li>
							<li><a href="product.html">Đồng giá 99k</a></li>
							<li><a href="category.html">Đồng giá 149k</a></li>
							<li><a href="cart.html">Đồng giá 199k</a></li>
						</ul>	
					</li>

					<li><a href="{{route('loai-san-pham')}}">Sản phẩm</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">Phụ kiện
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Cửa hàng</a>
						<ul class="sub-menu">
							<li><a href="#">CN1: 1 CMT8 </a></li>
							<li><a href="#">CN2: 1 Lý Thường Kiệt</a></li>
							<li><a href="#">CN3: 1 Nguyễn Thị Minh Khai</a></li>
	
						</ul>
					</li>
					<li><a href="#">Sự kiện</a></li>
					<li><a href="#">Review</a></li>
					<li><a href="{{route('lien-he')}}">Liên hệ</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->