@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Login</title>
	<link rel="icon" href="{{asset('img/Fevicon.png')}}" type="image/png">
  <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nouislider/nouislider.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
	  @endsection

@section('content')
	<!--================ Start Header Menu Area =================-->

	<!--================ End Header Menu Area =================-->

  <!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Login / Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>{{__('user.new_to_our_website')}}</h4>
							<p>{{__('user.account_description')}}</p>
							<a class="button button-account" href="{{ route('register') }}">{{__('user.create_an_account')}}</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>{{__('user.login')}}</h3>
						<form method="post" class="row login_form" action="{{ route('login') }}" id="contactForm" >
							@csrf
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="{{__('user.email_adress')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('user.email_adress')}}'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="{{__('user.password')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('user.password')}}'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">{{__('user.keep_me_logged_in')}}</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">{{__('user.signin')}}</button>
								<a href="#">{{__('user.forgot_password')}}</a>
								@if (session('confirmation'))
    <div class="alert alert-info" role="alert">
        {!! session('confirmation') !!}
    </div>
@endif

@if ($errors->has('confirmation') > 0 )
    <div class="alert alert-danger" role="alert">
        {!! $errors->first('confirmation') !!}
    </div>
@endif
@include('auth.socialNetworkAuth')
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <!--================ Start footer Area  =================-->
	<!--================ End footer Area  =================-->

@endsection

@section('end')

  <script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendors/skrollr.min.js')}}"></script>
  <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('vendors/mail-script.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
@endsection
