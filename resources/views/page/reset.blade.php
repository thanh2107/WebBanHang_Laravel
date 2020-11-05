@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Lấy lại mật khẩu</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('login')}}">Login</a> 
		</div>
	</div>
</div>
<!-- Page info end -->
  <?php
         $message = Session::get('message');
         if($message){

            echo '<span class="alert alert-info">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        @if(count($errors)>0 && Session::get('message_add') == 'add_slide')
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>    
            @endforeach
        </div>
        @endif
<!-- login_register section -->
<div class="mb-5 mt-5 ">
	<div class="container">
		<div class="row">
			
			<div class="col-sm-6" >
				<div class="form-register">
					<h2>Lấy lại mật khẩu</h2>
					<form id="register" action="{{route('post-reset-password')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="token" value="{{ $code }}">
								
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
							<label>Mật khẩu mới
								<span class="required">*</span>
							</label>
							<input  required="" class="input-login" type="password" name="password" id="password">
						</p>	
						<p class="row-login"> 
							<label>Xác nhận mật khẩu
								<span class="required">*</span>
							</label>
							<input required="" class="input-login" type="password" name="confirmpassword" id="confirmpassword">
						</p>
						<p class="row-login">
							<button type="submit" class="float-right m-0" name="register" value="register">Reset Password</button>
						</p>
					</form>
				</div>
			</div>   	
		</div>


	</div>
</div>

<!-- login_register section emd -->
@endsection