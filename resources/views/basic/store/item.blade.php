@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.single')}}</title>
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
					<h1>{{__('links.single')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('links.single')}}</li>
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
							<img width="555px" class="img-fluid" src="{{asset($item->img_href)}}" alt="">
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
						<h3>{{$item->title}}</h3>
                        @if($item->discount == 0)
                            <h2>${{$item->price}}</h2>
                            @else
                            <h2 style="color: firebrick">${{$item->getPriceWithDiscount()}}</h2><p><s>{{__('items.old_price')}}: ${{$item->price}}</s></p>
                        @endif

						<ul class="list">
							<li><a class="active"><span>{{__('items.category')}}</span> : {{$item->category->title}}</a></li>
							<li><a><span>{{__('items.availibility')}}</span> :
								@if($item->quantity !== 0)
								{{__('items.in_stock')}}
								@else
								{{__('items.not_available')}}
								@endif</a></li>
						</ul>
                        <br>
						<div class="product_count">
                            @if($item->quantity !== 0)
                            @if($item->in_cart)
                                <a class="button primary-btn cartRemoveButton{{$item->id}}" onclick="cartRemove({{$item->id}});">{{__('items.in_cart')}}</a>
                                <a hidden="true" class="button primary-btn cartAddButton{{$item->id}}" onclick="cartAdd({{$item->id}});">{{__('items.add_to_cart')}}</a>
                            @else
                                <a class="button primary-btn cartAddButton{{$item->id}}" onclick="cartAdd({{$item->id}});">{{__('items.add_to_cart')}}</a>
                                <a hidden="true" class="button primary-btn cartRemoveButton{{$item->id}}" onclick="cartRemove({{$item->id}});">{{__('items.in_cart')}}</a>
                            @endif
                            @else
                                    <h6>{{__('items.subscribe_to_this_product')}}</h6>
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="" method="post" class="subscribe-form form-inline mt-5 pt-1">
                                        <div class="form-group ml-sm-auto">
                                            <input class="form-control mb-1" type="email" name="email" placeholder="{{__('user.email_adress')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = {{__('user.email_adress')}}" >
                                            <div class="info"></div>
                                        </div>
                                        <button class="button button-subscribe mr-auto mb-1" type="submit">{{__('user.subscribe')}}</button>
                                    </form>

                                </div>
                            @endif
						</div>
						<div class="card_area d-flex align-items-center">


                            @if($item->is_liked)
                                <a class="likeRemoveButton{{$item->id}}" class="icon_btn" onclick="likesRemove({{$item->id}});"><i class="ti-close"></i></a>
                                <a class="likeAddButton{{$item->id}}" class="icon_btn" hidden="true" onclick="likesAdd({{$item->id}});"><i class="lnr lnr lnr-heart"></i></a>
                            @else
                                <a class="likeAddButton{{$item->id}}" class="icon_btn" onclick="likesAdd({{$item->id}});"><i class="lnr lnr lnr-heart"></i></a>
                                <a class="likeRemoveButton{{$item->id}}" class="icon_btn" hidden="true" onclick="likesRemove({{$item->id}});"><i class="ti-close"></i></a>
                            @endif
						</div>
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
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('items.description')}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">{{__('items.specifications')}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">{{__('items.comments')}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">{{__('items.reviews')}}</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{{$item->description}}</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<!-- ----- -->
								@foreach($item->specs as $spec)
								<tr>
									<td>
										<h5>{{$spec->title}}</h5>
									</td>
									<td>
										<h5>{{$spec->value}}</h5>
									</td>
								</tr>
								@endforeach
                            </tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								@foreach($item->comments as $comment)
                                    @if($loop->iteration < 6)
								<div class="review_item">
									<div class="media">
                                        <a href="{{ route('profile', $comment->user->id) }}">
										<div class="d-flex">
											<img src="{{ asset($comment->user->photo_href) }}" alt="">
										</div>
                                        </a>
										<div class="media-body">
                                            <a href="{{ route('profile', $comment->user->id) }}">
                                            <h4 id="commname">{{$comment->user->name}}</h4>
                                            </a>
											<h5>{{date_format($comment->created_at, 'H:i d.m.Y')}}</h5>

											<a class="reply_btn" onclick="var name = '{{$comment->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>

										</div>
									</div>
									<p>{{$comment->content}}</p>
								</div>
								@foreach($comment->answers as $answer)
                                            @if($loop->iteration < 4)
								<div class="review_item reply">
									<div class="media">
                                        <a href="{{ route('profile', $answer->user->id) }}">
                                        <div class="d-flex">
											<img src="{{ asset($answer->user->photo_href) }}" alt="">
										</div>
                                        </a>
										<div class="media-body">
                                            <a href="{{ route('profile', $answer->user->id) }}">
                                            <h4>{{$answer->user->name}}</h4>
                                            </a>
											<h5>{{date_format($answer->created_at, 'H:i d.m.Y')}}</h5>
											<a class="reply_btn" onclick="var name = '{{$answer->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>
										</div>
									</div>
									<p>{{$answer->content}}</p>
								</div>
                                            @elseif($comment->answers->count() > 3)
                                                <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreAnswers({{$answer->id}}, {{$comment->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
                                                @break
                                            @endif
                                    @endforeach

                                    @elseif($item->comments->count() > 5)
                                    <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreComments({{$comment->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
                                    @break
                                    @endif
                                @endforeach


							</div>
						</div>

						@auth
						<div class="col-lg-6">
							<div class="review_box">
								<h4>{{__('items.post_a_comment')}}</h4>
								<form class="row contact_form" action="{{ route('commentAdd', $item->id) }}" method="post" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="col-md-12">
										<div class="form-group">
											<div hidden="true" id="answer_field" class="input-group">
        <span class="input-group-btn">
          <button onclick="document.getElementById('answer_field').hidden = true; document.getElementById('commentid').value = 0;" class="btn btn-default" type="button"><i class="ti-close"></i></button>
        </span>
        <input type="text" class="form-control" id="ansname" name="name" value="" placeholder="Readonly input here…" readonly>
</div>

											<input hidden="true" type="text" class="form-control" id="commentid" name="commentid" value="0" readonly>
										</div>
									</div>


									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="{{__('items.message')}}"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">{{__('items.submit')}}</button>
									</div>
								</form>
							</div>
						</div>
						@endauth
						@guest
						<div class="col-lg-6">
							<div class="review_box">
								<h4>{{__('items.create_an_account_or_log_in_to_post_a_comments')}}</h4>

								<a class="button button--active button-review" href="login.html">{{__('items.login_now')}}</a><a class="button button--active button-review" href="login.html">{{__('items.register_now')}}</a>

							</div>
						</div>
						@endguest
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>{{__('items.overall')}}</h5>
										<h4>{{ number_format((float)$item->getOverall()[0], 1, '.', '') }}</h4>
										<h6>({{number_format((float)$item->getOverall()[1], 0, '.', '')}} {{trans_choice('items.reviews_count', number_format((float)$item->getOverall()[1], 0, '.', ''))}})</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>{{__('items.based_on')}} {{number_format((float)$item->getOverall()[1], 0, '.', '')}} {{trans_choice('items.reviews_count', number_format((float)$item->getOverall()[1], 0, '.', ''))}}</h3>
										<ul class="list">

											<li><a>5 {{trans_choice('items.stars', 5)}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>



											<li><a>4 {{trans_choice('items.stars', 4)}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="ti-star"></i> 01</a></li>



											<li><a>3 {{trans_choice('items.stars', 3)}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="ti-star" ></i><i class="ti-star"></i> 01</a></li>



											<li><a>2 {{trans_choice('items.stars', 2)}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="ti-star"></i><i
													 class="ti-star"></i><i class="ti-star"></i> 01</a></li>



											<li><a>1 {{trans_choice('items.stars', 1)}} <i class="fa fa-star"></i><i class="ti-star"></i><i class="ti-star"></i><i
													 class="ti-star"></i><i class="ti-star"></i> 01</a></li>



										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								@foreach($item->reviews as $review)
                                    @if($loop->iteration < 5)
								<div class="review_item">
									<div class="media">
                                        <a href="{{ route('profile', $review->user->id) }}">
                                        <div class="d-flex">
											<img src="{{ asset($review->user->photo_href) }}" alt="">
										</div>
                                        </a>
										<div class="media-body">
                                            <a href="{{ route('profile', $review->user->id) }}">
											<h4>{{$review->user->name}}</h4>
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
                                    @elseif($item->reviews->count() > 4)
                                        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreReviews({{$review->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
                                        @break
                                        @endif
								@endforeach

							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								@auth
								<h4>{{__('items.add_a_review')}}</h4>

								<p>{{__('items.your_rating')}}:</p>
								<ul class="list">
									<li id="fa-st1"><a><i onclick="


										document.getElementById('fa-st2').hidden = true;
										document.getElementById('ti-st2').hidden = false;

										document.getElementById('fa-st3').hidden = true;
										document.getElementById('ti-st3').hidden = false;

										document.getElementById('fa-st4').hidden = true;
										document.getElementById('ti-st4').hidden = false;

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 1;
										return false;
											" class="fa fa-star"></i></a></li>

									<li id="fa-st2"><a onclick="

										document.getElementById('fa-st3').hidden = true;
										document.getElementById('ti-st3').hidden = false;

										document.getElementById('fa-st4').hidden = true;
										document.getElementById('ti-st4').hidden = false;

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 2;
										return false;
											"><i class="fa fa-star"></i></a></li>

									<li id="ti-st2" hidden="true"><a onclick="

										document.getElementById('fa-st2').hidden = false;
										document.getElementById('ti-st2').hidden = true;

										document.getElementById('fa-st3').hidden = true;
										document.getElementById('ti-st3').hidden = false;

										document.getElementById('fa-st4').hidden = true;
										document.getElementById('ti-st4').hidden = false;

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 2;
										return false;
											"><i class="ti-star"></i></a></li>

									<li id="fa-st3"><a onclick="

										document.getElementById('fa-st4').hidden = true;
										document.getElementById('ti-st4').hidden = false;

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 3;
										return false;
											"><i class="fa fa-star"></i></a></li>

									<li id="ti-st3" hidden="true"><a onclick="

										document.getElementById('fa-st2').hidden = false;
										document.getElementById('ti-st2').hidden = true;

										document.getElementById('fa-st3').hidden = false;
										document.getElementById('ti-st3').hidden = true;

										document.getElementById('fa-st4').hidden = true;
										document.getElementById('ti-st4').hidden = false;

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 3;
										return false;
											"><i class="ti-star"></i></a></li>

									<li id="fa-st4"><a onclick="

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 4;
										return false;
											"><i class="fa fa-star"></i></a></li>

									<li id="ti-st4" hidden="true"><a onclick="

										document.getElementById('fa-st2').hidden = false;
										document.getElementById('ti-st2').hidden = true;

										document.getElementById('fa-st3').hidden = false;
										document.getElementById('ti-st3').hidden = true;

										document.getElementById('fa-st4').hidden = false;
										document.getElementById('ti-st4').hidden = true;

										document.getElementById('fa-st5').hidden = true;
										document.getElementById('ti-st5').hidden = false;

										document.getElementById('rating').value = 4;
										return false;
											"><i class="ti-star"></i></a></li>

									<li id="fa-st5"><a onclick="

										document.getElementById('rating').value = 5;
										return false;
											"><i class="fa fa-star"></i></a></li>

									<li id="ti-st5" hidden="true"><a onclick="

										document.getElementById('fa-st2').hidden = false;
										document.getElementById('ti-st2').hidden = true;

										document.getElementById('fa-st3').hidden = false;
										document.getElementById('ti-st3').hidden = true;

										document.getElementById('fa-st4').hidden = false;
										document.getElementById('ti-st4').hidden = true;

										document.getElementById('fa-st5').hidden = false;
										document.getElementById('ti-st5').hidden = true;

										document.getElementById('rating').value = 5;
										return false;
											"><i class="ti-star"></i></a></li>

								</ul>

                <form action="{{ route('reviewAdd', $item->id) }}" method="post" class="form-contact form-review mt-3">
	                @csrf
	                <!--
                  <div class="form-group">
                    <input class="form-control" name="name" type="text" placeholder="Enter your name" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Enter email address" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                  </div>
                  -->
                  <input hidden="true" id="rating" name="rating" value="5">
                  <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="{{__('items.message')}}"></textarea>
                  </div>
                  <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-review">{{__('items.submit')}}</button>
                  </div>
                </form>
                @endauth
                @guest


								<h4>{{__('items.create_an_account_or_log_in_to_post_a_reviews')}}</h4>

								<a class="button button--active button-review" href="login.html">{{__('items.login_now')}}</a><a class="button button--active button-review" href="login.html">{{__('items.register_now')}}</a>



                @endguest
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<!--================ Start related Product area =================-->

            @include('layouts.includes.trandingProducts')

            @include('layouts.includes.browsinghistory')

    <!--================ end related Product area =================-->



@endsection

@section('end')
    <script type="text/javascript">
        var moreCommentsUrl = '{{action("ItemController@moreComments", isset($item->id) ? $item->id : 0)}}';
        var moreAnswersUrl = '{{action("ItemController@moreAnswers", $item->id)}}';
        var moreReviewsUrl = '{{action("ItemController@moreReviews", isset($item->id) ? $item->id : 0)}}';

        var userId = '@if(isset($user->id)) "&userId=" {{$user->id}} @endif';

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
    <script src="{{ asset('js/item.js') }}"></script>

</body>
</html>

@endsection
