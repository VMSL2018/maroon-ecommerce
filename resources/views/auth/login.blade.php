@extends('frontend.layouts.app')

@section('contents')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!--NEW LOGIN PANEL-->
   <!-- page title -->
   <div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="page_title">
						<h1>LOGIN</h1>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ page title -->
	<div class="margin-bottom-70px">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="login">
						<h3>sign in to your account</h3>
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="col-md-6 no-padding-left">
								<div class="email">
									<label for="your-email">Email address <span class="required">*</span></label><br>
	                                <input id="email" type="email" class="your-email {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
	                                @if ($errors->has('email'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
							
							<div class="col-md-6 no-padding-right no-padding-left ">
								<div class="password">
									<label for="password">password <span class="required">*</span></label><br>
	                                <input id="password" type="password" class="password {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
	
	                                @if ($errors->has('password'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
							
							<div class="col-md-6 no-padding-left">
								<label for="remember" class="label-remember">
								<input type="checkbox"  name="remember-pass" value="" class="remember-pass" id="remember"> Remember me!</label>
							</div>
							
							<div class="col-md-6 no-padding-left">
								<a href="/password/reset">Forgot password?</a><br>
							</div>
							<div class="clear-fix"></div>
							
							<div class="col-md-6 no-padding-left">	
								<div class="cupon-code">
							        <input type="submit" name="checkout" value="Sign IN" class="btn-black calculate">
						        </div>
							</div>
						</form>
						<div class="login-method col-md-12">
							<div class="col-md-6 col-sm-6 no-padding-right no-padding-left">
								<a class="method-facebook" href="/login/facebook"><i class="fa fa-facebook"></i>Sign In with facebook</a>
							</div>
							<div class="col-md-6 col-sm-6 no-padding-left no-padding-right">
								<a class="method-google" href="/login/google"><i class="fa fa-google"></i>Sign In with Google</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

