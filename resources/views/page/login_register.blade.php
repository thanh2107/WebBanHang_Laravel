@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Đăng nhập</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="">Login</a> 
		</div>
	</div>
</div>
<!-- Page info end -->

<!-- login_register section -->
<div class="mb-5 mt-5 ">
	<div class="container">
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-login">
					<h2>Đăng nhập</h2>
					<form>
						<p class="row-login"> 
							<label>Tên đặng nhập hoặc email
								<span class="required">*</span>
							</label>
							<input class="input-login" type="text" name="username" id="username">
						</p>	
						<p class="row-login"> 
							<label>Mật khẩu
								<span class="required">*</span>
							</label>
							<input class="input-login" type="password" name="password" id="password">
						</p>	
						<p class="row-login">
							<button type="submit" class="float-right m-0" name="login" value="Log in">Đăng nhập</button>

							<span class="inline">
								<span class="style-checkbox">
									<input class="float-left cbox" name="rememberme	" type="checkbox" id="rememberme" value="forever">
									<label for="rememberme" class="	checkbox"></label>
									<span>Remember me</span>
								</span>
							</span>
						</p>
						<p class="woocommerce-LostPassword lost_password">
							<a href="https://bomsister.vn/my-account/lost-password/">Quên mật khẩu?</a>
						</p>


					</form>
				</div>


			</div>
			<div class="col-sm-6" >
				<div class="form-register">
					<h2>Đăng kí</h2>
					<form>
						<p class="row-login"> 
							<label>Tên đặng nhập hoặc email
								<span class="required">*</span>
							</label>
							<input class="input-login" type="text" name="username" id="username">
						</p>	
						<p class="row-login"> 
							<label>Mật khẩu
								<span class="required">*</span>
							</label>
							<input class="input-login" type="password" name="password" id="password">
						</p>	
						<p class="row-login"> 
							<label>Xác nhận mật khẩu
								<span class="required">*</span>
							</label>
							<input class="input-login" type="password" name="confirmpassword" id="confirmpassword">
						</p>
						<p class="row-login">
							<button type="submit" class="float-right m-0" name="login" value="Log in">Đăng ký</button>
						</p>
						


					</form>
				</div>
			</div>   	
		</div>


	</div>
</div>

<!-- login_register section emd -->
@endsection