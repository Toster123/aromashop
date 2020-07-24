@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - Home</title>
    <link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
    <link rel="stylsheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@endsection

@section('content')

<main class="site-main">

    <!--================ Hero banner start =================-->
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{ asset('img/home/hero-banner.png') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>{{__('basic.shop_is_fun')}}</h4>
                        <h1>{{__('basic.browse_our_popular_products')}}</h1>
                        <p>{{__('basic.store_description')}}</p>
                        <a class="button button-hero" href="{{route('store')}}">{{__('basic.browse_now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
        <div class="owl-carousel owl-theme hero-carousel">

            @foreach($categories as $category)
            <div class="hero-carousel__slide">
                <img width="633px" height="550px" src="{{ asset($category->img_href) }}" alt="" class="img-fluid">
                <a href="{{route('store') . '?category=' . $category->title}}" class="hero-carousel__slideOverlay">
                    <h3>{{$category->title}}</h3>
                    <p>{{$category->description}}</p>
                </a>
            </div>
                @endforeach

        </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    @include('layouts.includes.trandingProducts')
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="offer__content text-center">
                        <h3>{{__('basic.up_to_50_off')}}</h3>
                        <h4>{{__('basic.winter_sale')}}</h4>
                        <p>{{__('basic.hurry_up_to_buy_long-desired_products_at_a_discount')}}</p>
                        <a class="button button--active mt-3 mt-xl-4" href="{{route('store')}}">{{__('basic.shop_now')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ offer section end ================= -->

    @include('layouts.includes.bestDiscount')

    <!-- ================ Best Selling item  carousel ================= -->
    <!-- <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Best Discount in the market</p>
                <h2>Best <span class="section-intro__style">Discount</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product1.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product2.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product3.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product4.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product1.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product2.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product3.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product4.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================ Best Selling item  carousel end ================= -->

    <!-- ================ Blog section start ================= -->

    <!-- ================ Blog section end ================= -->

@include('layouts.includes.browsinghistory')

</main>

@endsection

@section('end')
<script type="text/javascript">
    var cartAddUrl = '{{action("UserController@cartAdd")}}';
    var cartRemoveUrl = '{{action("UserController@cartRemoveWithoutCount")}}';
    var likesAddUrl = '{{action("UserController@likesAdd")}}';
    var likesRemoveUrl = '{{action("UserController@likesRemove")}}';
</script>
<script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/skrollr.min.js') }}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('vendors/mail-script.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/ajaxCartLikes.js') }}"></script>
</body>
</html>

@endsection
