@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Order Tracking</title>
	<link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	@endsection

@section('content')
  
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Order Tracking</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Tracking Box Area =================-->
  @auth
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
	                  
                      <thead>
                          <tr>
                              <th scope="col">Order Id</th>
                              <th scope="col">Order Status</th>
                              <th scope="col">Total</th>
                          </tr>
                      </thead>
                      <tbody>
	                      @if(isset($orders))
	                      @if(empty($orders))
	                      @else
	                      @foreach($orders as $order)
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
                          @endif
                          @endif
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  @endauth
  @guest
  <section class="tracking_box_area section-margin--small">
      <div class="container">
          <div class="tracking_box_inner">
              <p>To track your order please enter your Order ID in the box below and press the "Track" button. This
                  was given to you on your receipt and in the confirmation email you should have received.</p>
              <form class="row tracking_form" action="#" method="post" novalidate="novalidate">
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" id="order" name="order" placeholder="Order ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Order ID'">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Billing Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Billing Email Address'">
                  </div>
                  <div class="col-md-12 form-group">
                      <button type="submit" value="submit" class="button button-tracking">Track Order</button>
                  </div>
              </form>
          </div>
      </div>
  </section>
  @endguest
  <!--================End Tracking Box Area =================-->





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