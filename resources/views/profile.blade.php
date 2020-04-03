@extends('layouts.master')

@section('begin')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - Product Details</title>
    <link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@endsection

@section('content')


    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>{{$user->name}}</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            @if($user->photo_href)
                                <img class="img-fluid" src="{{Storage::url($user->photo_href)}}" alt="">
                                @else
                                <img class="img-fluid" src="{{asset('storage/errors/user_no_photo.png')}}" alt="">
                                @endif
                        </div>
                        <!-- <div class="single-prd-item">
                            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        @if($user->auth)
                            <form method="post" enctype="multipart/form-data" action="{{route('saveUserChanges', $user->id)}}">
                                @csrf
                                <div class="col-md-6 form-group p_star">
                                    <h4>Name</h4>
                                    <input type="text" class="form-control" value="{{$user->name}}" placeholder="Name" name="name">
                                    <span class="placeholder" data-placeholder="Name"></span>
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <h4>Photo</h4>
                                    <input accept="image/*" type="file" class="form-control"name="photo">
                                    <span class="placeholder" data-placeholder="Last name"></span>
                                </div>
                            <div class="col-md-6 form-group p_star">

                                <button class="button primary-btn" type="submit">Save</button>
                            </div>
                            </form>
                        @else
                        <h3>{{$user->name}}</h3>
                        <h2>city</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Registered at</span> : {{$user->created_at}}</a></li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @if($user->auth)
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Delivery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Orders</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                       aria-selected="false">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                @if($user->auth)
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="billing_details">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Personal Data</h3>
                                <form class="row contact_form" action="{{route('saveUserChanges', $user->id)}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Phone number">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Phone number if we can't get through">
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn primary-btn">Save</button>
                                    </div>
                                </form>

                                    <form class="row contact_form" action="{{route('saveUserChanges', $user->id)}}" method="post" novalidate="novalidate">
                                        @csrf
                                    <div class="col-md-12 form-group mb-0">
                                        <div class="creat_account">
                                            <h3>Shipping Details</h3>
                                        </div>
                                        <div id="deliverySelected">
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="company" name="company" placeholder="Street">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="company" name="company" placeholder="House number">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="company" name="company" placeholder="Entrance">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="company" name="company" placeholder="Floor">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" id="company" name="company" placeholder="Apartment number">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="btn primary-btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    @if($user->orders->isEmpty())
                                            <p>
                                                You did not have orders
                                            </p>
                                    @else
                                        <h4>Orders</h4>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($user->orders as $order)
                                                    <tr>
                                                        <td>
                                                            <div class="media">
                                                                <div class="d-flex">

                                                                </div>
                                                                <div class="media-body">
                                                                    <a href="{{ route('order', $order->id) }}"><p>№{{ $order->id }}</p></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5>{{ 0 }}</h5>
                                                        </td>

                                                        <td>
                                                            <h5>${{ 0 }}</h5>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                @endif

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="comment_list">

                                @if($user->reviews->isEmpty())
                                    <p>
                                        @if($user->auth)
                                            You
                                        @else
                                            This user
                                        @endif
                                        did not write comments
                                    </p>
                                @endif

                                @foreach($user->comments as $comment)

                                    <div class="review_item">
                                        <div class="media">
                                            <div class="d-flex">
                                                @if($comment->item->img_href)
                                                <img height="70" src="{{ asset($comment->item->img_href) }}" alt="">
                                                    @else
                                                    <img height="70" src="{{ asset('storage/errors/item_no_img.png') }}" alt="">
                                                    @endif
                                            </div>
                                            <div class="media-body">
                                                <h4 id="commname">{{$comment->item->title}}</h4>
                                                <h5>12th Feb, 2018 at 05:56 pm</h5>

{{--                                                <a class="reply_btn" onclick="var name = '{{$comment->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>--}}

                                            </div>
                                        </div>
                                        <p>{{$comment->message}}</p>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>





                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                    @if($user->reviews->isEmpty())
                            <p>
                                @if($user->auth)
                                    You
                                @else
                                    This user
                                @endif
                                    did not write reviews
                            </p>
                            @endif
                            <div class="review_list">
                                @foreach($user->reviews as $review)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="d-flex">
                                                @if($review->item->img_href)
                                                <img height="70" src="{{ asset($review->item->img_href) }}" alt="">
                                                    @else
                                                    <img height="70" src="{{ asset('storage/errors/item_no_img.png') }}" alt="">
                                                    @endif
                                            </div>
                                            <div class="media-body">
                                                <h4>{{$review->item->title}}</h4>
                                                @switch($review->rating)
                                                    @case(5)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    @break
                                                    @case(4)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="ti-star"></i>
                                                    @break
                                                    @case(3)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="ti-star"></i>
                                                    <i class="ti-star"></i>
                                                    @break
                                                    @case(2)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="ti-star"></i>
                                                    <i class="ti-star"></i>
                                                    <i class="ti-star"></i>
                                                    @break
                                                    @case(1)
                                                    <i class="fa fa-star"></i>
                                                    <i class="ti-star"></i>
                                                    <i class="ti-star"></i>
                                                    <i class="ti-star"></i>
                                                    <i class="ti-star"></i>
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>
                                        <p>{{$review->content}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!--================ Start related Product area =================-->
    <section class="related-product-area section-margin--small mt-0">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Top <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row mt-30">
                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-1.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-2.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-3.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-4.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-5.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-6.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-7.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-8.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-9.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-1.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-2.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="{{ asset('img/product/product-sm-3.png') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('layouts.browsinghistory')


    </section>
    <!--================ end related Product area =================-->



@endsection

@section('end')
    <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/mail-script.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">
        function cartAdd (itemId) {

            $.ajax({
                url: '{{action("CartController@cartAdd")}}' + '?itemId=' + itemId,
                type: 'GET',

                success: function (response) {

                    $(".cartAddButton" + itemId).attr('hidden', true);
                    $(".cartRemoveButton" + itemId).attr('hidden', false);
                    console.log(itemId);
                }
            })


        }
        function cartRemove (itemId) {

            $.ajax({
                url: '{{action("CartController@cartRemoveWithoutCount")}}' + '?itemId=' + itemId,
                type: 'GET',

                success: function (response) {

                    $(".cartAddButton" + itemId).attr('hidden', false);
                    $(".cartRemoveButton" + itemId).attr('hidden', true);

                }
            })

        }
        function likesAdd (itemId) {

            $.ajax({
                url: '{{action("LikesController@likesAdd")}}' + '?itemId=' + itemId,
                type: 'GET',

                success: function (response) {

                    $(".likeAddButton" + itemId).attr('hidden', true);
                    $(".likeRemoveButton" + itemId).attr('hidden', false);

                }
            })

        }
        function likesRemove (itemId) {

            $.ajax({
                url: '{{action("LikesController@likesRemove")}}' + '?itemId=' + itemId,
                type: 'GET',

                success: function (response) {

                    $(".likeAddButton" + itemId).attr('hidden', false);
                    $(".likeRemoveButton" + itemId).attr('hidden', true);

                }
            })

        }
    </script>

</body>
</html>

@endsection
