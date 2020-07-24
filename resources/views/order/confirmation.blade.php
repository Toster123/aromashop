@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.confirmation')}}</title>
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
					<h1>{{__('links.confirmation')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cart')}}">{{__('links.cart')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('links.confirmation')}}</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

  <!--================Order Details Area =================-->
  <section class="order_details section-margin--small">
    <div class="container">
      <p class="text-center billing-alert">{{__('order.thank_you_for_order')}}</p>
        @if($order->payment_method == 2 && !$order->paid)
        <p class="text-center billing-alert">{{__('order.please_pay')}} <a href="#">{{__('order.click_here_to_proceed_to_payment.')}}</a></p>
        @endif
        <div class="row mb-5">
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">{{__('order.order_info')}}</h3>
            <table class="order-rable">
              <tr>
                <td>{{__('order.order_id')}}</td>
                <td>{{$order->id}}</td>
              </tr>
              <tr>
                <td>{{__('order.date')}}</td>
                <td>{{$order->placed_at}}</td>
              </tr>
              <tr>
                <td>{{__('order.total')}}</td>
                <td>
                    @if(!$order->coupons->isEmpty())
                        <p><s>${{$order->getFullPriceAtTheTimeOfRegistration()}}</s></p><p style="color:firebrick;">${{$order->getPriceWithCoupons()}}</p>
                    @else
                        <p>${{$order->getFullPriceAtTheTimeOfRegistration()}}</p>
                    @endif
                </td>
              </tr>
              <tr>
                <td>{{__('order.payment_method')}}</td>
                <td>@if($order->payment_method == 1) {{__('order.payment_upon_receipt')}} @elseif($order->payment_method == 2) {{__('order.paypal')}} @endif</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">{{__('order.billing_details')}}</h3>
            <table class="order-rable">
              <tr>
                <td>{{__('order.full_name')}}</td>
                <td>{{$order->full_name}}</td>
              </tr>
              <tr>
                <td>{{__('order.email_adress')}}</td>
                <td>{{$order->email}}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">{{__('order.shipping_details')}}</h3>
            <table class="order-rable">
              <tr>
                <td>{{__('order.delivery_method')}}</td>
                <td>@if($order->delivery_method == 1) {{__('order.pickup')}} @elseif($order->delivery_method == 2) {{__('order.delivery')}} @endif</td>
              </tr>

                @if($order->delivery_method == 2)
              <tr>
                <td>{{__('order.adress')}}</td>
                <td>{{$order->adress}}</td>
              </tr>
              <tr>
                  <td>{{__('order.must_delivered_at')}}</td>
                  <td>{{$order->must_delivered_at}}</td>
              </tr>
                @endif

            </table>
          </div>
        </div>
      </div>
      <div class="order_details_table">
        <h2>{{__('order.order_details')}}</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">{{__('order.product')}}</th>
                <th scope="col">{{__('order.quantity')}}</th>
                <th scope="col">{{__('order.total')}}</th>
              </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
              <tr>
                <td>
                  <p><a href="{{route('item', $item->id)}}">{{$item->title}}</a></p>
                </td>
                <td>
                  <h5>x {{$item->pivot->count}}</h5>
                </td>
                <td>
                  <p>${{$item->pivot->price}}</p>
                </td>
              </tr>
              @endforeach
                <tr>
                <td>
                  <h4>{{__('order.subtotal')}}</h4>
                </td>
                <td>
                  <h5></h5>
                </td>
                <td>
                    @if(!$order->coupons->isEmpty())
                        <p><s>${{$order->getFullPriceAtTheTimeOfRegistration()}}</s></p><p style="color:firebrick;">${{$order->getPriceWithCoupons()}}</p>
                    @else
                        <p>${{$order->getFullPriceAtTheTimeOfRegistration()}}</p>
                    @endif
                </td>
              </tr>
              <tr>
                <td>
                  <h4>{{__('order.shipping')}}</h4>
                </td>
                <td>
                  <h5></h5>
                </td>
                <td>
                  <p>Flat rate: $50.00</p>
                </td>
              </tr>
              <tr>
                <td>
                  <h4>{{__('order.total')}}</h4>
                </td>
                <td>
                  <h5></h5>
                </td>
                <td>
                    @if(!$order->coupons->isEmpty())
                        <h4><s>${{$order->getFullPriceAtTheTimeOfRegistration()}}</s></h4><h4 style="color:firebrick;">${{$order->getPriceWithCoupons()}}</h4>
                    @else
                        <h4>${{$order->getFullPriceAtTheTimeOfRegistration()}}</h4>
                    @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!--================End Order Details Area =================-->
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
