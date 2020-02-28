<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Đăng nhập hệ thống</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
	<link rel="shortcut icon" href="{{ asset('public/backend/img/logoicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/login_admin/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
                <form action="{{ route('post.administration') }}" method="POST" class="login100-form validate-form flex-sb flex-w">
                    @csrf
					<span class="login100-form-title p-b-51">Login</span>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100 form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    @if (session()->has('error'))
                        {!! session()->get('error') !!}
                    @endif
					
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
					</div>
                    

					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_token">
							<label class="label-checkbox100" for="ckb1">
								Nhớ tôi
							</label>
						</div>

						<div><a href="#" class="txt1">Quên mật khẩu?</a></div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">Đăng nhập</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
    <!--===============================================================================================-->
	<script src="{{ asset('public/frontend/login_admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
	<script src="{{ asset('public/frontend/login_admin/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('public/frontend/login_admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>