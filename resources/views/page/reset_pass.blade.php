@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Quên mật khẩu</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('login')}}">Login</a> 
		</div>
	</div>
</div>
<!-- Page info end -->
@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}
						</div>
						@endif
<!-- login_register section -->
<div class="mb-5 mt-5 ">
	<div class="container">
		<div class="row">
				
			<div class="col-sm-6" >
				<div class="form-register">
					<h2>Quên mật khẩu</h2>
					<form id="register" action="{{route('send_email_verify')}}" method="post" >
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
							<label>Email tài khoản
								<span class="required">*</span>
							</label>
							<input  class="input-login" type="text" name="email" id="email">
						<p class="row-login">
							<button type="submit" class="float-right m-0" name="register" value="register">Gửi mã xác nhận</button>
						</p>

				</form>
				</div>
			</div>   	
		</div>


	</div>
</div>

<!-- login_register section emd -->
@endsection