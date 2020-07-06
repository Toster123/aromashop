{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}




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


        <!--================Login Box Area =================-->
        <section class="login_box_area section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login_form_inner">
                            <h3>{{__('user.password_reset')}}</h3>
                            <form method="post" class="row login_form" action="{{ route('password.update') }}" id="contactForm">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="col-md-12 form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="name" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="name" name="password" required placeholder="{{__('user.new_password')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('user.new_password')}}'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="name" name="password_confirmation" required placeholder="{{__('user.confirm_password')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('user.confirm_password')}}'">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="button button-login w-100">{{__('user.signin')}}</button>
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
