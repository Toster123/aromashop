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
					<h1>Shop Single</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
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
							<img class="img-fluid" src="{{ asset('img/category/s-p1.jpg') }}" alt="">
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
						<h2>${{$item->price}}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : {{$item->category}}</a></li>
							<li><a href="#"><span>Availibility</span> : 
								@if($item->availibility)
								in Stock
								@else
								not available
								@endif</a></li>
						</ul>
						<p>{{$item->description}}</p>
						<div class="product_count">
              
							<a class="button primary-btn" href="{{ route('cartAdd', $item->id) }}">Add to Cart</a>    
							<a class="button button-header" href="{{ route('cartAdd', $item->id) }}">Buy in 1 click</a>          
						</div>
						<div class="card_area d-flex align-items-center">
							
							<a class="icon_btn" href="{{ route('likesAdd', $item->id) }}"><i class="lnr lnr lnr-heart"></i></a>
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
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
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
										<h5>{{$spec->spec_name}}</h5>
									</td>
									<td>
										<h5>{{$spec->spec_value}}</h5>
									</td>
								</tr>
								@endforeach
								<!-- ---- -->
								<!-- <tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								@foreach($item->comments as $comment)
								
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{ asset('img/product/review-1.png') }}" alt="">
										</div>
										<div class="media-body">
											<h4 id="commname">{{$comment->user->name}}</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											
											<a class="reply_btn" onclick="var name = '{{$comment->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>
											
										</div>
									</div>
									<p>{{$comment->message}}</p>
								</div>
								@foreach($comment->answers as $answer)
								
								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="{{ asset('img/product/review-2.png') }}" alt="">
										</div>
										<div class="media-body">
											<h4>{{$answer->user->name}}</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" onclick="var name = '{{$answer->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>
										</div>
									</div>
									<p>{{$answer->content}}</p>
								</div>
								@endforeach
								@endforeach
								
								
							</div>
						</div>
						
						@auth
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Post a comment</h4>
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
											
											<input hidden="true" type="text" class="form-control" id="commentid" name="commentid" value="0" placeholder="Readonly input here…" readonly>
										</div>
									</div>
									
									
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
									</div>
								</form>
							</div>
						</div>
						@endauth
						@guest
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Create an Account or Log in to post a comments</h4>
								
								<a class="button button--active button-review" href="login.html">Login Now</a><a class="button button--active button-review" href="login.html">Register Now</a>
								
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
										<h5>Overall</h5>
										<h4>{{ number_format((float)$item->getOverall()[0], 1, '.', '') }}</h4>
										<h6>({{number_format((float)$item->getOverall()[1], 0, '.', '')}} Reviews)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on {{number_format((float)$item->getOverall()[1], 0, '.', '')}} Reviews</h3>
										<ul class="list">
											
											<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
													 
													 
													 
											<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="ti-star"></i> 01</a></li>
													 
													 
													 
											<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="ti-star" ></i><i class="ti-star"></i> 01</a></li>
													 
													 
													 
											<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="ti-star"></i><i
													 class="ti-star"></i><i class="ti-star"></i> 01</a></li>
													 
													 
													 
											<li><a href="#">1 Star <i class="fa fa-star"></i><i class="ti-star"></i><i class="ti-star"></i><i
													 class="ti-star"></i><i class="ti-star"></i> 01</a></li>
													 
													 
													 
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								@foreach($item->reviews as $review)
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{ asset('img/product/review-1.png') }}" alt="">
										</div>
										<div class="media-body">
											<h4>{{$review->user->name}}</h4>
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
								@auth
								<h4>Add a Review</h4>
								
								<p>Your Rating:</p>
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
								<p>Outstanding</p>
								
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
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                  </div>
                  <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-review">Submit Now</button>
                  </div>
                </form>
                @endauth
                @guest
                
							
								<h4>Create an Account or Log in to post a reviews</h4>
								
								<a class="button button--active button-review" href="login.html">Login Now</a><a class="button button--active button-review" href="login.html">Register Now</a>
								
							
						
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
</body>
</html>

@endsection