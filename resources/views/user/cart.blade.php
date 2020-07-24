@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.cart')}}</title>
	<link rel="icon" href="{{ asset('img/Fevicon.png')}}" type="image/png">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css')}}">

  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
  @endsection

@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>{{__('links.cart')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('links.cart')}}</li>
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
                              <th scope="col">{{__('user.price')}}</th>
                              <th scope="col">{{__('user.quantity')}}</th>
                              <th scope="col">{{__('user.total')}}</th>
                          </tr>
                      </thead>
                      <tbody>
                      @if(isset($order))
                          @auth
	                      @foreach($order->items as $item)
                          <tr id="{{$item->id}}item">
                              <td>
                                  <div class="media">
                                      <div class="cart-item-image">
                                          <a href="{{ route('item', $item->id) }}">
                                            <img width="150" src="{{ asset($item->img_href) }}" alt="">
                                          </a>
                                      </div>
                                      <div class="media-body">

                                          <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}
                                              @if($item->quantity < $item->pivot->count)
                                                  <p style="color: firebrick">({{__('user.not_availible')}})</p>
                                                  @endif
                                              </a></h5>

                                      </div>
                                  </div>
                              </td>
                              <td>
                                  @if($item->discount == 0)
                                  <h5>${{ $item->price }}</h5>
                                      @else
                                      <h5 style="color: firebrick;">${{ $item->getPriceWithDiscount() }}</h5> <p><s>${{$item->price}}</s></p>
                                  @endif
                              </td>
                              <td>
                                  <div class="product_count">
                                      <input disabled type="text" name="qty" id="{{$item->id}}count" maxlength="12" value="{{ $item->pivot->count }}" title="Quantity:"
                                          class="input-text qty">

                                      <a onclick="cartAdd({{$item->id}});"><button class="increase items-count"><i class="lnr lnr-chevron-up"></i></button></a>


                                      <a onclick="cartRemove({{$item->id}});"><button class="reduced items-count" type="submit"><i class="lnr lnr-chevron-down"></i></button></a>

                                  </div>
                              </td>
                              <td>
                                  <h5>${{ $item->getPriceForCount() }}</h5>
                              </td>
                          </tr>

                          @endforeach
                          @endauth
                          @endif

                          @if(isset($items))
                          @guest
                          @php $subtotal = 0 @endphp
                          @foreach($items as $item)
                          <tr id="{{$item->id}}item">
                              <td>
                                  <div class="media">
                                      <div class="cart-item-image">
                                          <a href="{{ route('item', $item->id) }}">
                                                  <img width="150" src="{{ asset($item->img_href) }}" alt="">
                                          </a>
                                      </div>
                                      <div class="media-body">
                                          <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}
                                              @if($item->quantity < $item->count)
                                                  <p style="color: firebrick">({{__('user.not_availible')}})</p>
                                              @endif
                                              </a></h5>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  @if($item->discount == 0)
                                      <h5>${{ $item->price }}</h5>
                                  @else
                                      <h5 style="color: firebrick;">${{ $item->getPriceWithDiscount() }}</h5> <p><s>${{$item->price}}</s> <strong>-{{$item->discount}}%</strong></p>
                                  @endif                              </td>
                              <td>
                                  <div class="product_count">
                                      <input disabled type="text" name="qty" id="{{$item->id}}count" maxlength="12" value="{{ $item->count }}" title="Quantity:"
                                          class="input-text qty">

                                      <a onclick="cartAdd({{$item->id}});"><button class="increase items-count" type="submit"><i class="lnr lnr-chevron-up"></i></button></a>


                                      <a onclick="cartRemove({{$item->id}});"><button class="reduced items-count" type="submit"><i class="lnr lnr-chevron-down"></i></button></a>

                                  </div>
                              </td>
                              <td>
	                              @php $subtotal += $item->getPriceWithDiscount() * $item->count @endphp
                                  <h5>${{ $item->getPriceWithDiscount() * $item->count }}</h5>

                              </td>
                          </tr>

                          @endforeach
                          @endguest
                          @endif

                          @auth
                          <tr class="bottom_button">
                              <td>
                              </td>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <form method="POST" action="{{route('setCoupon', $order->id)}}">
                                      @csrf
                                      <div class="cupon_text d-flex align-items-center">
                                          <input type="text" name="code" placeholder="{{__('user.coupon_code')}}">
                                          <button class="primary-btn" type="submit">{{__('user.apply')}}</button>
                                          <a class="button disabled">{{__('user.have_a_coupon')}}</a>
                                      </div>
                                  </form>
                              </td>
                          </tr>
                          @if(!$order->coupons->isEmpty())
                      <tr>
                          <td class="d-none d-md-block"></td>
                          <td></td>
                          <td></td>
                          <td><h5>{{__('user.coupons')}}</h5></td>
                      </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                  <div class="shipping_box">
                                      <ul class="list">
                                          @foreach($order->coupons as $coupon)
                                              <nobr>
                                                      <li><p>{{$coupon->title}}<a href="{{route('removeCoupon', ['id' => $order->id, 'code' => $coupon->code])}}"><i class="ti-close"></i></a></p></li>
                                              </nobr>
                                              @endforeach
                                      </ul>
                                  </div>
                              </td>
                          </tr>
                              @endif
                          @endauth
                            <tr>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>{{__('user.subtotal')}}</h5>
                              </td>
                              @auth
                              <td>
                                  @if(isset($order))
                                          @if(!$order->coupons->isEmpty())
                                          <s><p>${{$order->getFullPrice()}}</p></s><h5 style="color: firebrick">${{$order->getPriceWithCoupons()}}</h5>
                                              @else
                                          <h5>${{$order->getFullPrice()}}</h5>
                                              @endif
                                      @else
                                          <h5>$0</h5>
                                      @endif
                              </td>
                              @endauth
                              @guest
                              <td>
                                  <h5>@if(isset($subtotal))
	                                  ${{$subtotal}}
	                                  @else
	                                  $0
	                                  @endif
	                                  </h5>
                              </td>
                              @endguest
                          </tr>

                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>
                              </td>

                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="primary-btn ml-2" href="{{route('checkout')}}">{{__('user.proceed_to_checkout')}}</a>
                                  </div>
                              </td>
                          </tr>

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
      var cartAddUrl = '{{action("UserController@cartAdd")}}';
      var cartRemoveUrl = '{{action("UserController@cartRemoveWithoutCount")}}';
  </script>
  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('vendors/skrollr.min.js')}}"></script>
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{ asset('vendors/mail-script.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
  <script src="{{ asset('js/cart.js')}}"></script>
</body>
</html>

@endsection
