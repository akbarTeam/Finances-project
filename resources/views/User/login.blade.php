
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Finance Admin panal</title>
	<!-- Favicon-->
	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	<!-- Plugins Core Css -->
	<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
	<!-- Custom Css -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/pages/authentication.css') }}" rel="stylesheet" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background: green; !improtant">
			<div class="wrap-login100">
				<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title p-b-45">
						Login
					</span>


					<div class="wrap-input100">
						<input class="input100" type="text" value="{{ old('username') }}" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">username</span>

                            @error('username')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror

					</div>



					<div class="wrap-input100" >
						<input class="input100" type="password" value="{{ old('password') }}" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>

                        @error('password')
                        <div class="text-danger">{{ $message }} </div>

                        @enderror
					</div>


					<div class="flex-sb-m w-full p-t-15 p-b-20">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" name="remember" type="checkbox" value="1"> Remember me
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
                    <br>
                    <div>
                        @include('App.message.error')
                    </div>

					<div class="text-center p-t-45 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fab fa-facebook-f"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fab fa-twitter"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../../assets/images/pages/bg-01.png');">
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('assets/js/app.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/examples/pages.js') }}"></script>
</body>
</html>
