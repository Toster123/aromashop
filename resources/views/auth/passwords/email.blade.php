{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if ($errors->has('confirmation') > 0 )--}}
{{--    <div class="alert alert-danger" role="alert">--}}
{{--        {!! $errors->first('confirmation') !!}--}}
{{--    </div>--}}
{{--@endif--}}
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
                            <form method="post" class="row login_form" action="{{ route('password.email') }}" id="contactForm">
                                @csrf
                                <div class="col-md-12 form-group">
                                    <input type="email" class="form-control" id="name" name="email" placeholder="{{__('user.email_adress')}}" value="{{ old('email') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('user.email_adress')}}'">
                                </div>
                                @if (session('status'))
                                <div class="alert alert-success col-md-12 form-group" role="alert">
                                    {{__('user.letter_sent')}}
                                </div>
                                @endif
                                @if ($errors->has('confirmation') > 0 )
                                    <div class="alert alert-danger" role="alert">
                                        {!! $errors->first('confirmation') !!}
                                    </div>
                                @endif
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="button button-login w-100">{{__('user.send')}}</button>
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
