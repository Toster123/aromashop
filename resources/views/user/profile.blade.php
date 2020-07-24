@extends('layouts.master')

@section('begin')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - {{$user->name}}</title>
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
                            <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
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
                    <div>
                        <div class="single-prd-item">
                                <img class="img-fluid" src="{{asset($user->photo_href)}}" alt="">
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
                                    <h4>{{__('user.name')}}</h4>
                                    <input type="text" class="form-control" value="{{$user->name}}" placeholder="{{__('user.name')}}" name="name">
                                    <span class="placeholder" data-placeholder="Name"></span>
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <h4>{{__('user.photo')}}</h4>
                                    <input accept="image/*" type="file" class="form-control"name="photo">
                                </div>
                            <div class="col-md-6 form-group p_star">

                                <button class="button primary-btn" type="submit">{{__('user.save')}}</button>
                            </div>
                            </form>
                        @else
                        <h3>{{$user->name}}</h3>
                        <ul class="list">
                            <li><a class="active" href="#"><span>{{__('user.registered_at')}}</span> : {{$user->created_at}}</a></li>
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
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('user.delivery')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">{{__('user.orders')}}</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                       aria-selected="false">{{__('user.comments')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">{{__('user.reviews')}}</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                @if($user->auth)
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="billing_details">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>{{__('user.delivery_date_info')}}</p>

                                <form class="row contact_form" action="{{route('saveUserChanges', $user->id)}}" method="post" novalidate="novalidate">
                                    @csrf

                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="full" name="name" value="@auth{{Auth::user()->full_name}}@endauth" placeholder="{{__('user.full_name')}}">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <input disabled type="text" class="form-control" id="company" name="company" value="@auth{{Auth::user()->email}}@endauth" placeholder="{{__('user.email_adress')}}">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <button style="background-color: #f0f0f0" type="button" class="btn primary-btn">{{__('user.change_email')}}</button>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="adress" name="adress" value="@auth{{Auth::user()->adress}}@endauth" placeholder="{{__('user.adress')}}">
                                    </div>

                                        <div class="col-md-12 text-right">
                                            <button type="submit" style="background-color: #f0f0f0" value="submit" class="btn primary-btn">{{__('user.save')}}</button>
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
                                                {{__('user.you_did_not_have_orders')}}
                                            </p>
                                    @else
                                        <h4>{{__('user.orders')}}</h4>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{__('user.order_id')}}</th>
                                            <th scope="col">{{__('user.order_status')}}</th>
                                            <th scope="col">{{__('user.total')}}</th>
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
                                                            <h5 style="color:
                                                            @switch($order->status_id)
                                                            @case(1)
                                                                gray;
                                                            @break
                                                            @case(2)
                                                                darkorange;
                                                            @break
                                                            @case(3)
                                                                dodgerblue;
                                                            @break
                                                            @case(4)
                                                                dodgerblue;
                                                            @break
                                                            @case(5)
                                                                green;
                                                            @break
                                                            @case(6)
                                                                darkred;
                                                            @break
                                                            @endswitch
                                                                ">{{ $order->status->title }}</h5>
                                                        </td>

                                                        <td>
                                                            <h5>${{ $order->getFullPriceAtTheTimeOfRegistration() }}</h5>
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

                                @if($user->comments->isEmpty())
                                    <p>
                                        @if($user->auth)
                                            {{__('user.you_did_not_write_comments')}}
                                        @else
                                            {{__('user.this_user_did_not_write_comments')}}
                                        @endif
                                    </p>
                                @endif

                                @foreach($user->comments as $comment)
                                        @if($loop->iteration < 10)

                                        <div class="review_item">
                                        <div class="media">
                                            <a href="{{ route('item', $comment->item->id) }}">
                                            <div class="d-flex">
                                                <img height="70" src="{{ asset($comment->item->img_href) }}" alt="">
                                            </div>
                                            </a>
                                            <div class="media-body">
                                                <a href="{{ route('item', $comment->item->id) }}">
                                                <h4 id="commname">{{$comment->item->title}}</h4>
                                                </a>
                                                <h5>{{date_format($comment->created_at, 'H:i d.m.Y')}}</h5>

{{--                                                <a class="reply_btn" onclick="var name = '{{$comment->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>--}}

                                            </div>
                                        </div>
                                        <p>{{$comment->content}}</p>
                                    </div>
                                        @else
                                            <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreComments({{$comment->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
                                            @break
                                        @endif
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
                                    {{__('user.you_did_not_write_reviews')}}
                                @else
                                    {{__('user.this_user_did_not_write_reviews')}}
                                @endif
                            </p>
                            @endif
                            <div class="review_list">
                                @foreach($user->reviews as $review)
                                    @if($loop->iteration < 8)
                                    <div class="review_item">
                                        <div class="media">
                                            <a href="{{ route('item', $review->item->id) }}">
                                            <div class="d-flex">
                                                <img height="70" src="{{ asset($review->item->img_href) }}" alt="">
                                            </div>
                                            </a>
                                            <div class="media-body">
                                                <a href="{{ route('item', $review->item->id) }}">
                                                <h4>{{$review->item->title}}</h4>
                                                </a>
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
                                    @else
                                        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreReviews({{$review->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
                                        @break
                                    @endif
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


        @include('layouts.includes.browsinghistory')


    <!--================ end related Product area =================-->



@endsection

@section('end')
    <script type="text/javascript">
        var moreCommentsUrl = '{{action("ItemController@moreComments", isset($item->id) ? $item->id : 0)}}';
        var moreAnswersUrl = '';
        var moreReviewsUrl = '{{action("ItemController@moreReviews", isset($item->id) ? $item->id : 0)}}';

        var userId = '@if(isset($user->id)) "&userId=" {{$user->id}} @endif';
    </script>
    <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/mail-script.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/item.js') }}"></script>
</body>
</html>

@endsection
