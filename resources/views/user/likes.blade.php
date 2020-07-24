@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.likes')}}</title>
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
					<h1>{{__('links.likes')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">{{__('links.home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('links.likes')}}</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->



  <!--================Cart Area =================-->

  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">

              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">{{__('user.product')}}</th>
                              <th scope="col">{{__('user.raiting')}}</th>
                              <th scope="col">{{__('user.price')}}</th>
                              <th scope="col">{{__('user.unlike')}}</th>
                          </tr>
                      </thead>
                      <tbody>
	                      @foreach($likes as $item)
                          <tr id="{{$item->id}}item">
                              <td>
                                  <div class="media">
                                      <div class="cart-item-image">
                                          <a href="{{ route('item', $item->id) }}">
                                            <img width="150" src="{{ asset($item->img_href) }}" alt="">
                                          </a>
                                      </div>
                                      <div class="media-body">

                                          <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}</a></h5>

                                      </div>
                                  </div>
                              </td>

                              <td>
	                              @switch(number_format((float)$item->getOverall()[0], 0, '.', ''))
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
	                          </td>

                              <td>
                                  @if($item->discount == 0)
                                      <h5>${{ $item->price }}</h5>
                                  @else
                                      <h5 style="color: firebrick;">${{ $item->getPriceWithDiscount() }}</h5> <p><s>${{$item->price}}</s> <strong>-{{$item->discount}}%</strong></p>
                                  @endif                              </td>
                              <td>

							  <a class="icon_btn" style="cursor: pointer" onclick="likesRemove({{$item->id}});"><i class="ti-close"></i></a>

                              </td>

                              <td>
                                  <!-- <img src="img/delete.png" alt=""> -->
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>

          </div>
      </div>
  </section>

  <!--================End Cart Area =================-->





@endsection

@section('end')
  <script type="text/javascript">
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
  <script src="{{ asset('js/likes.js') }}"></script>
</body>
</html>

@endsection
