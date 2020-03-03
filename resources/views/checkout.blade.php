@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Checkout</title>
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
					<h1>Product Checkout</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container">
	    @guest
        <div class="returning_customer">
            <div class="check_title">
                <h2>Returning Customer? <a href="#">Click here to login</a></h2>
            </div>
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                customer, please proceed to the Billing & Shipping section.</p>
        
            <a href="{{route('login')}}"><button value="submit" class="button button-login">login</button></a>
        
        </div>
        @endguest
        <div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="button button-coupon" href="#">Apply Coupon</a>
        </div>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="name" value="Name">
                            <span class="placeholder" data-placeholder="First name"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last" name="name" value="Surname">
                            <span class="placeholder" data-placeholder="Last name"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Phone number">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Phone number if we can't get through">
                        </div>
                        
                        
                        
                        <div class="col-md-12 form-group mb-0">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                            </div>
                            <div class="col-md-12 form-group p_star">
                            <select id="shippingOption" class="country_select" onchange="Selected(this);">
                                <option value="1">Pickup</option>
                                <option value="2">Delivery</option>
                            </select>
                            
                        	</div>
                        	<br/>
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
                        	<div class="col-md-12 form-group p_star">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        	</div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                            
                            @if(isset($order))
                            @php $fullPrice = 0 @endphp
                            @foreach($order as $item)
                            <li><a href="#">{{$item->title}} <span class="middle">x @auth{{$item->pivot->count}}@endauth
	                            @guest{{$item->count}}@endguest</span> <span class="last">${{$item->getPriceForCount() * $item->count}}</span></a></li>
	                            @php $fullPrice += $item->price @endphp
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>${{$fullPrice}}</span></a></li>
                            <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                            <li><a href="#">Total <span>${{$fullPrice}}</span></a></li>
                        </ul>
                        @else
                            <li><a href="#">No items in cart<span class="middle"></span> <span class="last"></span></a></li>
                            
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>$0</span></a></li>
                            <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                            <li><a href="#">Total <span>$0</span></a></li>
                        </ul>
                        @endif
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Payment upon receipt</label>
                                <div class="check"></div>
                            </div>
                            <p>Payment by card or cash upon receipt of the order.</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="{{ asset('img/product/card.jpg') }}" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <div class="text-center">
                          <a class="button button-paypal" href="#">Proceed to Paypal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->



@endsection

@section('end')

  <script type="text/javascript">
	  
	  
	  
	  function Selected(a) {

	    var label = a.value;

	    if (label==1) {

	        document.getElementById("deliverySelected").hidden=true;

	    } else {

	        document.getElementById("deliverySelected").hidden=false;
	    } 

	     

	}
	  
	  window.addEventListener('DOMContentLoaded', function() {
		  Selected(document.getElementById('shippingOption'));
	});
  </script>
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