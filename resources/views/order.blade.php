@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Cart</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  @endsection

@section('content')

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
	                  @if(isset($items))
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                          </tr>
                      </thead>
                      <tbody>
	                      @auth
	                      @foreach($items->items as $item)
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="img/cart/cart1.png" alt="">
                                      </div>
                                      <div class="media-body">
                                          <p>{{ $item->title }}</p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5>${{ $item->price }}</h5>
                              </td>
                              <td>
	                              {{ $item->pivot->count }}
	                              <!--
                                  <div class="product_count">
                                      <input type="text" name="qty" id="sst" maxlength="12" value="{{ $item->pivot->count }}" title="Quantity:"
                                          class="input-text qty">
                                          
                                      <a href="{{ route('cartAdd', $item) }}"><button class="increase items-count"><i class="lnr lnr-chevron-up"></i></button></a>
                                      
                                      
                                      <a href="{{ route('cartRemove', $item) }}"><button class="reduced items-count" type="submit"><i class="lnr lnr-chevron-down"></i></button></a>
                                      
                                  </div>
                                  -->
                              </td>
                              <td>
                                  <h5>${{ $item->getPriceForCount() }}</h5>
                              </td>
                          </tr>
                          
                          @endforeach
                          @endauth
                          <!--
                          @guest
                          @foreach($items as $item)
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="img/cart/cart1.png" alt="">
                                      </div>
                                      <div class="media-body">
                                          <p>{{ $item->title }}</p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5>${{ $item->price }}</h5>
                              </td>
                              <td>
                                  <div class="product_count">
                                      <input type="text" name="qty" id="sst" maxlength="12" value="{{ $counts[$item->id] }}" title="Quantity:"
                                          class="input-text qty">
                                          
                                      <a href="{{ route('cartAdd', $item) }}"><button class="increase items-count" type="submit"><i class="lnr lnr-chevron-up"></i></button></a>
                                      
                                      
                                      <a href="{{ route('cartRemove', $item) }}"><button class="reduced items-count" type="submit"><i class="lnr lnr-chevron-down"></i></button></a>
                                      
                                  </div>
                              </td>
                              <td>
                                  <h5>$720.00</h5>
                              </td>
                          </tr>
                          
                          @endforeach
                          @endguest -->
                          @endif
                          <tr class="bottom_button">
                              <td>
                                  <a class="button" href="#">Update Cart</a>
                              </td>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="cupon_text d-flex align-items-center">
                                      <input type="text" placeholder="Coupon Code">
                                      <a class="primary-btn" href="#">Apply</a>
                                      <a class="button" href="#">Have a Coupon?</a>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Subtotal</h5>
                              </td>
                              <!--
                              @auth
                              <td>
                                  <h5>${{$items->getFullPrice()}}</h5>
                              </td>
                              @endauth
                              @guest
                              <td>
                                  <h5>$0</h5>
                              </td>
                              @endguest
                              -->
                          </tr>
                          <tr class="shipping_area">
                              <td class="d-none d-md-block">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Shipping</h5>
                              </td>
                              <td>
                                  <div class="shipping_box">
                                      <ul class="list">
                                          <li><a href="#">Flat Rate: $5.00</a></li>
                                          <li><a href="#">Free Shipping</a></li>
                                          <li><a href="#">Flat Rate: $10.00</a></li>
                                          <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                      </ul>
                                      
                                  </div>
                              </td>
                          </tr>
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="gray_btn" href="#">Continue Shopping</a>
                                      <a class="primary-btn ml-2" href="#">Proceed to checkout</a>
                                  </div>
                              </td>
                          </tr>

                              </td>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->





@endsection

@section('end')

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>

@endsection