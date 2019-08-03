@extends('frontend.layouts.app')

@section('contents')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
						<h1>REGISTER ACCOUNT</h1>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<!--<li><a href="#">Shop</a></li>-->
							<li><a href="#">Register</a></li>
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
						<h3>register an account</h3>
						<form  method="POST" action="{{ route('register') }}"> 
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-6 no-padding-left">
								<div class="first-name">
									<label for="your-first-name">first name <span class="required">*</span></label><br>
	                                <input id="name" type="text" class=" your-first-name {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
									
								</div>
							</div>
							
							<div class="col-md-6 no-padding-right no-padding-left">
								<div class="last-name">
									<label for="your-last-name">Last name <span class="required">*</span></label><br>
									<input type="text" name="your-last-name" value="" class="your-last-name" id="your-last-name">
								</div>
							</div>
							
							<div class="col-md-6 no-padding-left">
								<div class="email">
									<label for="phone">Phone Number<span class="required">*</span></label><br>
	                                <input id="phone" type="text" class="your-phone {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
							
							<div class="col-md-6 no-padding-left">
								<div class="email">
									<label for="your-email1">Email address <span class="required">*</span></label><br>
	                                <input id="email" type="email" class="your-email {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
							<!--
							<div class="col-md-6 no-padding-left">
								<div class="recapture-text">
									<label for="confirm-email">Confirm email address <span class="required">*</span></label><br>
									<input type="email" name="your-email" value="" class="your-email" id="confirm-email">	
								</div>
							</div>
							-->
	
                            <div class="col-md-6  no-padding-left">
                                <div class="recapture-text">
                                    <label for="password" class="">{{ __('Password') }}<span class="required">*</span></label>
                                    <input id="password" type="password" class="your-email {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 no-padding-left">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}<span class="required">*</span></label>
                                <input id="password-confirm" type="password" class="your-email" name="password_confirmation" required>
                            </div>

							
							
							<!--
							<div class="col-md-6 no-padding-left">						
								<div class="recapture-text">
									<label for="recapture">enter the capture <span class="required">*</span></label><br>
									<div class="col-md-6 no-padding-left">
										<input type="text" name="recapture" value="" class="recapture" id="recapture">
									</div>
									<div class="col-md-6 no-padding-left no-padding-right">
										<p>d0fnU</p>
									</div>
								</div>
							</div>
							-->
							
							<div class="clear-fix"></div>
							
							<div class="col-md-6 no-padding-left">	
								<div class="cupon-code">
							        <input type="submit" name="checkout" value="Register" class="btn-black calculate">
						        </div>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
