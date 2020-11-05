@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Đăng nhập</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('login')}}">Login</a> 
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
					<form  id="login"action="{{route('login')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						@if(count($errors)>0 && Session::get('last_auth_attempt') == 'login')
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
								{{$err}}<br>
								@endforeach
							</div>
						@endif
						@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}
						</div>
						@endif
						<p class="row-login"> 
							<label>Email or username
								<span class="required">*</span>
							</label>
							<input class="input-login" type="text" name="email" id="email">
								<input type="hidden" name="level" value="0">
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
							<a href="{{route('reset-password')}}">Quên mật khẩu?</a>
						</p>
					</form>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-register">
					<h2>Đăng ký</h2>
					<form id="register" action="{{route('register')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
								
								@if(count($errors)>0 && Session::get('last_auth_attempt') == 'register')
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
								{{$err}}<br>
								@endforeach

							</div>
							@endif
						@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
						@endif
						<p class="row-login"> 
							<label>Email
								<span class="required">*</span>
							</label>
							<input class="input-login" type="text" name="email" id="email">
						</p>	
						<p class="row-login"> 
							<label>Username
								<span class="required">*</span>
							</label>
							<input class="input-login" type="text" name="username" id="username">
						</p>	
				
							<p class="row-login"> 
							<label>Số điện thoại
								<span class="required">*</span>
							</label>
							<input class="input-login" type="text" name="phone" id="phone">
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
							<button type="submit" class="float-right m-0" name="register" value="register">Đăng ký</button>
						</p>
						


					</form>
				</div>
			</div>   	
		</div>


	</div>
</div>

<!-- login_register section emd -->
@endsection