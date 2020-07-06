@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.tracking')}}</title>
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
					<h1>{{__('links.tracking')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('links.tracking')}}</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


  <!--================Tracking Box Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      @if(!is_null($orders))

                      <thead>
                          <tr>
                              <th scope="col">{{__('order.order_id')}}</th>
                              <th scope="col">{{__('order.order_status')}}</th>
                              <th scope="col">{{__('order.total')}}</th>
                          </tr>
                      </thead>
                      <tbody>
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
                          @else
                              <p>Having an account you can create and track orders</p>
                          @endif
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
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
