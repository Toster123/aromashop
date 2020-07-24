@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.order')}} №{{$order->id}}</title>
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
					<h1>{{__('links.order')}} №{{$order->id}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('tracking')}}">{{__('links.tracking')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('links.order')}} №{{$order->id}}</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->



  <!--================Cart Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                       aria-selected="false">{{__('order.info')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">{{__('order.items')}}</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">


                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @if($order->status_id == 1)
                                <form class="row contact_form" action="{{route('orderUpdate', $order->id)}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="col-lg-12">
                                        <h4>{{__('order.billing_details')}}</h4>
                                        <br>
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" id="full" name="full_name" value="{{$order->full_name}}" placeholder="{{__('order.full_name')}}">
                                        </div>


                                        <div class="col-md-6 form-group p_star">
                                            <input type="email" class="form-control" id="company" name="email" value="{{$order->email}}" placeholder="{{__('order.email_adress')}}">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <p>{{__('order.we_will_contact_you')}}</p>
                                        </div>

                                        <div class="col-md-12 form-group mb-0">
                                            <div class="creat_account">
                                                <h4>{{__('order.shipping_details')}}</h4>
                                                <br>
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <select name="payment_method" class="country_select">
                                                    <option value="1" @if($order->payment_method == 1) selected @endif>{{__('order.payment_upon_receipt')}}</option>
                                                    <option value="2" @if($order->payment_method == 2) selected @endif>{{__('order.paypal')}}</option>
                                                </select>

                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <select id="shippingOption" name="delivery_method" class="country_select" onchange="Selected(this);">
                                                    <option value="1" @if($order->delivery_method == 1) selected @endif>{{__('order.pickup')}}</option>
                                                    <option value="2" @if($order->delivery_method == 2) selected @endif>{{__('order.delivery')}}</option>
                                                </select>

                                            </div>
                                            <br/>
                                            <br/>
                                            <div id="deliverySelected">
                                                <div class="col-md-12 form-group">
                                                    <p>{{__('order.adress')}}</p>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <input type="text" class="form-control" id="adress" name="adress" value="{{$order->adress}}" placeholder="{{__('order.adress')}}">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <p>{{__('order.delivery_date')}}</p>
                                                </div>

                                                <div class="col-md-6 form-group p_star">
                                                    <input type="date" class="form-control" id="date" value="{{$order->must_delivered_at}}" name="must_delivered_at">
                                                </div>
                                            </div>
                                            <div id="pickupSelected">
                                                <div class="col-md-12 form-group">
                                                    <p>{{__('order.pickup_date')}} 02/29/2020</p>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group p_star">
                                                <input class="form-control" name="notes" id="message" value="{{$order->notes}}" placeholder="{{__('order.notes')}}">
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="submit" style="background-color: #f0f0f0" value="submit" class="btn primary-btn">{{__('order.save_changes')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <div class="col-lg-12">
                                    <h4>{{__('order.billing_details')}}</h4>
                                    <br>
                                    <div class="col-md-12 form-group">
                                        <p>{{__('order.full_name')}}: {{$order->full_name}}</p>
                                    </div>

                                    @if(!is_null($order->email))
                                    <div class="col-md-6 form-group p_star">
                                        <p>{{__('order.email_adress')}}: {{$order->email}}</p>
                                    </div>
                                    @endif
                                    <div class="col-md-12 form-group mb-0">
                                        <div class="creat_account">
                                            <h4>{{__('order.shipping_details')}}</h4>
                                            <br>
                                        </div>
                                        <div class="col-md-12 form-group p_star">
                                            <p>{{__('order.payment_method')}}: {{$order->payment_method == 1 ? __('order.payment_upon_receipt') : __('order.paypal')}}</p>
                                        </div>
                                        <div class="col-md-12 form-group p_star">
                                            <p>{{__('order.delivery_method')}}: {{$order->delivery_method == 1 ? __('order.pickup') : __('order.delivery')}}</p>
                                        </div>
                                        @if($order->delivery_method == 2)
                                            <div class="col-md-12 form-group">
                                                <p>{{__('order.adress')}}: {{$order->adress}}</p>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <p>{{__('order.delivery_date')}}: {{$order->must_delivered_at}}</p>
                                            </div>
                                        @elseif($order->delivery_method == 1)
                                            <div class="col-md-12 form-group">
                                                <p>{{__('order.pickup_date')}} 02/29/2020</p>
                                            </div>
                                        @endif
                                        @if(!is_null($order->notes))
                                        <div class="col-md-12 form-group p_star">
                                            <p>{{__('order.order_notes')}}: {{$order->notes}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>


                            @endif
                        </div>

                    </div>
                </div>





                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="container">
                        <div class="cart_inner">
                            <div class="table-responsive">
                                <table class="table">
                                    @if(isset($order))
                                        <thead>
                                        <tr>
                                            <th scope="col">{{__('order.product')}}</th>
                                            <th scope="col">{{__('order.price')}}</th>
                                            <th scope="col">{{__('order.quantity')}}</th>
                                            <th scope="col">{{__('order.total')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <div class="cart-item-image">
                                                            <a href="{{ route('item', $item->id) }}">
                                                                    <img width="150" src="{{ asset($item->img_href) }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">

                                                            <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}</a></h4>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5>${{ $item->pivot->price }}</h5>
                                                </td>
                                                <td>
                                                    {{ $item->pivot->count }}
                                                </td>
                                                <td>
                                                    <h5>${{ $item->pivot->count * $item->pivot->price }}</h5>
                                                </td>
                                            </tr>

                                        @endforeach
                                        @endif

                                        <tr>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <h5>{{__('order.subtotal')}}</h5>
                                            </td>

                                            <td>
                                                @if(!$order->coupons->isEmpty())
                                                <s><h5>${{$order->getFullPriceAtTheTimeOfRegistration()}}</h5></s><h5 style="color: firebrick">${{$order->getPriceWithCoupons()}}</h5>
                                                    @else
                                                    <h5>${{$order->getFullPriceAtTheTimeOfRegistration()}}</h5>
                                                @endif
                                            </td>

                                        </tr>

                                        @if($order->status_id == 1 && !$order->paid)
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
                                                        <input type="text" name="code" placeholder="{{__('order.coupon_code')}}">
                                                        <button class="primary-btn" type="submit">{{__('order.apply')}}</button>
                                                        <a class="button disabled">{{__('order.have_a_coupon')}}</a>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                            @endif
                                        @if(!$order->coupons->isEmpty())
                                            <tr>
                                                <td class="d-none d-md-block"></td>
                                                <td></td>
                                                <td></td>
                                                <td><h5>{{__('order.coupons')}}</h5></td>
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
                                                                    <li><p>{{$coupon->title}}@if($order->status_id == 1 && !$order->paid)<a href="{{route('removeCoupon', ['id' => $order->id, 'code' => $coupon->code])}}"><i class="ti-close"></i></a> @endif </p></li>
                                                                </nobr>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>




    <section class="order_details section-margin--small">
        <div class="container">
            <p class="text-center billing-alert">{{__('order.your_order_status_is')}} {{$order->status->title}}</p>
            <div class="row mb-5">
                @php
                    $count = 0
                @endphp
                @foreach($statuses as $status)
                    @if($status->id !== 3 || ($order->payment_method == 2 && $order->paid))

                    @php
                        $count++
                    @endphp
                <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div @if($order->status_id !== 6 && $status->id !== 5 && $order->status_id >= $status->id) style="background-color: #3B48DF;" @endif @if($order->status_id == 5 && $order->status_id == $status->id) style="background-color: #1c7430;" @endif @if($order->status_id == 6 && $order->status_id == $status->id) style="background-color: firebrick;" @endif class="confirmation-card">
                        <h3 class="billing-title">{{$status->title}}</h3>
                        <p>{{$status->description}}</p>
                    </div>
                </div>

                @if($count % 3 == 0)
            </div>
        </div>
        <div class="container">
            <div class="row mb-5">
                @endif
                @endif

                @endforeach

            </div>
        </div>
    </section>








{{--      <div class="container">--}}
{{--          <div class="cart_inner">--}}
{{--              <div class="table-responsive">--}}
{{--                  <table class="table">--}}
{{--	                  @if(isset($order))--}}
{{--                      <thead>--}}
{{--                          <tr>--}}
{{--                              <th scope="col">Product</th>--}}
{{--                              <th scope="col">Price</th>--}}
{{--                              <th scope="col">Quantity</th>--}}
{{--                              <th scope="col">Total</th>--}}
{{--                          </tr>--}}
{{--                      </thead>--}}
{{--                      <tbody>--}}
{{--	                      @foreach($order->items as $item)--}}
{{--                          <tr>--}}
{{--                              <td>--}}
{{--                                  <div class="media">--}}
{{--                                      <div class="d-flex">--}}
{{--                                          <a href="{{ route('item', $item->id) }}">--}}
{{--                                            @if(is_null($item->img_href))--}}
{{--                                            <img width="150" src="{{ asset('storage/errors/item_no_img.png') }}" alt="">--}}
{{--                                            @else--}}
{{--                                            <img width="150" src="{{ asset($item->img_href) }}" alt="">--}}
{{--                                            @endif--}}
{{--                                          </a>--}}
{{--                                      </div>--}}
{{--                                      <div class="media-body">--}}

{{--                                          <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}</a></h4>--}}

{{--                                      </div>--}}
{{--                                  </div>--}}
{{--                              </td>--}}
{{--                              <td>--}}
{{--                                  <h5>${{ $item->pivot->price }}</h5>--}}
{{--                              </td>--}}
{{--                              <td>--}}
{{--	                              {{ $item->pivot->count }}--}}
{{--                              </td>--}}
{{--                              <td>--}}
{{--                                  <h5>${{ $item->getPriceForCount() }}</h5>--}}
{{--                              </td>--}}
{{--                          </tr>--}}

{{--                          @endforeach--}}
{{--                          @endif--}}
{{--                          <tr class="bottom_button">--}}
{{--                              <td>--}}
{{--                                  <a class="button" href="#">Update Cart</a>--}}
{{--                              </td>--}}
{{--                              <td>--}}

{{--                              </td>--}}
{{--                              <td>--}}

{{--                              </td>--}}
{{--                              <td>--}}
{{--                                  <div class="cupon_text d-flex align-items-center">--}}
{{--                                      <input type="text" placeholder="Coupon Code">--}}
{{--                                      <a class="primary-btn" href="#">Apply</a>--}}
{{--                                      <a class="button" href="#">Have a Coupon?</a>--}}
{{--                                  </div>--}}
{{--                              </td>--}}
{{--                          </tr>--}}
{{--                          <tr>--}}
{{--                              <td>--}}

{{--                              </td>--}}
{{--                              <td>--}}

{{--                              </td>--}}
{{--                              <td>--}}
{{--                                  <h5>Subtotal</h5>--}}
{{--                              </td>--}}

{{--                              <td>--}}
{{--                                  <h5>${{$order->getFullPriceAtTheTimeOfRegistration()}}</h5>--}}
{{--                              </td>--}}

{{--                          </tr>--}}

{{--                          <tr class="out_button_area">--}}
{{--                              <td class="d-none-l">--}}

{{--                              </td>--}}
{{--                              <td class="">--}}

{{--                              </td>--}}
{{--                              <td>--}}
{{--                              <td>--}}
{{--                                  <div class="checkout_btn_inner d-flex align-items-center">--}}
{{--                                      <a class="gray_btn" href="#">Continue Shopping</a>--}}
{{--                                      <a class="primary-btn ml-2" href="#">Proceed to checkout</a>--}}
{{--                                  </div>--}}
{{--                              </td>--}}
{{--                          </tr>--}}

{{--                      </tbody>--}}
{{--                  </table>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--      </div>--}}
  <!--================End Cart Area =================-->





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
