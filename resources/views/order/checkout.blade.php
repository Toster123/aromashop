@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.checkout')}}</title>
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
					<h1>{{__('links.checkout')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cart')}}">{{__('links.cart')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('links.checkout')}}</li>
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
        <div class="col-lg-8">
	    @guest
        <div class="returning_customer">
            <div class="check_title">
                <h2>{{__('order.please')}}, <a href="{{route('register')}}">{{__('order.create_an_account')}}</a> {{__('order.or')}} <a href="{{route('login')}}">{{__('order.login')}}</a> {{__('order.to_place_an_order')}}</h2>
            </div>
        </div>
            <br>
        @endguest
        @auth
            <form method="POST" action="{{route('setCoupon', $order->id)}}">
                @csrf
        <div class="cupon_area">
            <div class="check_title">
                    <h2>{{__('order.have_a_coupon')}}</h2>
            </div>
            <div class="col-md-6 form-group p_star">
            <input type="text" name="code" placeholder="{{__('order.coupon_code')}}">
            </div>
            <button class="button button-coupon">{{__('order.apply')}}</button>
        </div>
            </form>
        @endauth
        </div>
        <div class="billing_details">
            <div class="row">
                <form class="row contact_form" action="{{route('confirmation')}}" method="post" novalidate="novalidate">
                    @csrf
                <div class="col-lg-8">
                    @auth
                        @if(!$order->coupons->isEmpty())
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{__('order.coupon')}}</th>
                                        <th scope="col">{{__('order.code')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->coupons as $coupon)
                                        <tr>
                                            <td>
                                                <p>{{$coupon->title}}</p>
                                            </td>
                                            <td>
                                                <p>{{$coupon->code}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        @endif
                    @endauth
                    <h3>{{__('order.billing_details')}}</h3>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="full" name="full_name" value="@auth{{Auth::user()->full_name}}@endauth" placeholder="{{__('order.full_name')}}">
                        </div>


                        <div class="col-md-12 form-group">
                            <br>
                            <p>{{__('order.email_adress')}}</p>
                        </div>

                        <div class="col-md-6 form-group p_star">
                            <input type="email" class="form-control" id="company" name="email" value="@auth{{Auth::user()->email}}@endauth" placeholder="{{__('order.email_adress')}}">
                        </div>

                        <div class="col-md-12 form-group">
                            <p>{{__('order.we_will_contact_you')}}</p>
                        </div>

                        <div class="col-md-12 form-group mb-0">
                            <div class="creat_account">
                                <h3>{{__('order.shipping_details')}}</h3>
                            </div>
                            <div class="col-md-12 form-group p_star">
                            <select id="shippingOption" name="delivery_method" class="country_select" onchange="Selected(this);">
                                <option value="1">{{__('order.pickup')}}</option>
                                <option value="2">{{__('order.delivery')}}</option>
                            </select>

                        	</div>
                        	<br/>
                            <br/>
                        	<div id="deliverySelected">
                        	<div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="adress" name="adress" value="@auth{{Auth::user()->adress}}@endauth" placeholder="{{__('order.adress')}}">
                            </div>
                                <div class="col-md-12 form-group">
                                <p>{{__('order.delivery_date')}}</p>
                                </div>

                                <div class="col-md-6 form-group p_star">
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        	</div>
                            <div id="pickupSelected">
                                <div class="col-md-12 form-group">
                                <p>{{__('order.pickup_date')}} {{date("d.m.Y", strtotime("+7 day"))}}</p>
                                </div>
                            </div>

                        	<div class="col-md-12 form-group p_star">
                            <textarea class="form-control" name="notes" id="message" rows="1" placeholder="{{__('order.notes')}}"></textarea>
                        	</div>
                        </div>
                </div>
                <div class="col-lg-4">
                    <form>
                        <div class="order_box">
                        <h2>{{__('order.your_order')}}</h2>
                        <ul class="list">
                            <li><a href="#"><h4>{{__('order.product')}} <span>{{__('order.total')}}</span></h4></a></li>

                                @auth
                                    @if(!$order->items->isEmpty())
                                    @foreach($order->items as $item)
                                        <li><a href="#">{{$item->title}} <span class="middle">x {{$item->pivot->count}}</span> <span class="last">
                                                    @if($item->quantity < $item->pivot->count)
                                                        <p style="color: firebrick">{{__('order.not_availible')}}</p>
                                                    @else
                                                        ${{$item->getPriceWithDiscount() * $item->pivot->count}}
                                                    @endif
                                                </span></a></li>
                                    @endforeach
                        </ul>
                        <ul class="list list_2">
                            @if(!$order->coupons->isEmpty())
                            <li><a href="#">{{__('order.subtotal')}} <span><s>${{$order->getFullPrice()}}</s><span style="color: firebrick">${{$order->getPriceWithCoupons()}}</span></span></a></li>
                            <li><a href="#">{{__('order.shipping')}} <span>Flat rate: $50.00</span></a></li>
                                <li><a href="#">{{__('order.total')}} <span><s>${{$order->getFullPrice()}}</s><span style="color: firebrick">${{$order->getPriceWithCoupons()}}</span></span></a></li>
                                @else
                                <li><a href="#">{{__('order.subtotal')}} <span>${{$order->getFullPrice()}}</span></a></li>
                                <li><a href="#">{{__('order.shipping')}} <span>Flat rate: $50.00</span></a></li>
                                <li><a href="#">{{__('order.total')}} <span>${{$order->getFullPrice()}}</span></a></li>
                            @endif
                        </ul>
                        @else
                            <li><a>{{__('order.no_items_in_cart')}}</a></li>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">{{__('order.subtotal')}} <span>$0</span></a></li>
                                <li><a href="#">{{__('order.shipping')}} <span>Flat rate: $50.00</span></a></li>
                                <li><a href="#">{{__('order.total')}} <span>$0</span></a></li>
                            </ul>
                        @endif
                                @endauth


                            @guest
                            @php $fullPrice = 0 @endphp
                            @if(!empty($items))
                            @foreach($items as $item)
                            <li><a href="#">{{$item->title}} <span class="middle">x {{$item->count}}</span> <span class="last">
                                        @if($item->quantity < $item->count)
                                            <p style="color: firebrick">{{__('order.not_availible')}}</p>
                                        @else
                                            ${{$item->getPriceWithDiscount() * $item->count}}
                                        @endif
                                    </span></a></li>
	                            @php $fullPrice += $item->getPriceWithDiscount() * $item->count @endphp
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">{{__('order.subtotal')}} <span>${{$fullPrice}}</span></a></li>
                            <li><a href="#">{{__('order.shipping')}} <span>Flat rate: $50.00</span></a></li>
                            <li><a href="#">{{__('order.total')}} <span>${{$fullPrice}}</span></a></li>
                        </ul>
                            @else
                                            <li><a>{{__('order.no_items_in_cart')}}</a></li>
                                            </ul>
                                            <ul class="list list_2">
                                                <li><a href="#">{{__('order.subtotal')}} <span>$0</span></a></li>
                                                <li><a href="#">{{__('order.shipping')}} <span>Flat rate: $50.00</span></a></li>
                                                <li><a href="#">{{__('order.total')}} <span>$0</span></a></li>
                                            </ul>
                            @endif
                                @endguest

                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" value="1" name="payment_method">
                                <label for="f-option5">{{__('order.payment_upon_receipt')}}</label>
                                <div class="check"></div>
                            </div>
                            <p>{{__('order.payment_upon_receipt_description')}}</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" value="2" name="payment_method">
                                <label for="f-option6">{{__('order.paypal')}} </label>
                                <img src="{{ asset('img/product/card.jpg') }}" alt="">
                                <div class="check"></div>
                            </div>
                            <p>{{__('order.paypal_description')}}</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="accept">
                            <label for="f-option4">{{__('order.ive_read_and_accept_the')}} </label>
                            <a href="#">{{__('order.terms_&_conditions')}}</a>
                        </div>
                        <div class="text-center">
                            @auth
                            @if($order->isAvailibleItems())
                                    <button class="button button-paypal" id="submit_" type="submit">{{__('order.proceed_to_confirmation')}}</button>
                                @else
                                    <button disabled style="border-radius:30px;" class="button-paypal" id="submit" type="submit">{{__('order.proceed_to_confirmation')}}</button>
                                @endif
                            @endauth
                        @guest
                            <button disabled style="border-radius:30px;" class="button-paypal" id="submit" type="submit">{{__('order.proceed_to_confirmation')}}</button>
                        <div class="creat_account">
                            <label for="f-option4">{{__('order.please')}}, <a href="{{route('register')}}">{{__('order.create_an_account')}}</a> {{__('order.or')}} <a href="{{route('login')}}">{{__('order.login')}}</a> {{__('order.to_place_an_order')}}</label></div>
                        </div>
                        @endguest
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->



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
        if (document.getElementById('date').type != 'date') {
            document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
        }
    </script>
    <script src="{{ asset('js/checkout.js') }}"></script>

</body>
</html>
@endsection
