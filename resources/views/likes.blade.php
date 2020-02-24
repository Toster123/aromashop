@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Cart</title>
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
					<h1>Likes</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Likes</li>
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
                              <th scope="col">Product</th>
                              <th scope="col">Raiting</th>
                              <th scope="col">Price</th>
                              <th scope="col">Unlike</th>
                          </tr>
                      </thead>
                      <tbody>
	                      
	@if(isset($items))
	                      @auth
	                      @foreach($items->items as $item)
                          <tr id="{{$item->id}}item">
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <a href="{{ route('item', $item->id) }}"><img src="{{ asset('img/cart/cart1.png') }}" alt=""></a>
                                      </div>
                                      <div class="media-body">
	                                      
                                          <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}</a></h4>
	                                      
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
                                  <h5>${{ $item->price }}</h5>
                              </td>
                              <td>
	                              
							  <a class="icon_btn" onclick="likesRemove({{$item->id}});"><i class="ti-close"></i></a>

                              </td>
                              
                              
                              <!-- <td>
                                   <div class="product_count">
                                      <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                          class="input-text qty">
                                      <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                          class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                      <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                          class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                  </div> 
                              </td> -->
                              <td>
                                  <!-- <img src="img/delete.png" alt=""> -->
                              </td>
                          </tr>
                          @endforeach
                          @endauth
                          @guest
                          @foreach($items as $item)
                          <tr id="{{$item->id}}item">
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <a href="{{ route('item', $item->id) }}"><img src="{{ asset('img/cart/cart1.png') }}" alt=""></a>
                                      </div>
                                      <div class="media-body">
	                                      
                                          <h5 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{ $item->title }}</a></h4>
	                                      
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
                                  <h5>${{ $item->price }}</h5>
                              </td>
                              <td>
	                              <a class="icon_btn" onclick="likesRemove({{$item->id}});"><i class="ti-close"></i></a>
                              </td>
                              
                              
                              <!-- <td>
                                   <div class="product_count">
                                      <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                          class="input-text qty">
                                      <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                          class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                      <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                          class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                  </div> 
                              </td> -->
                              <td>
                                  <!-- <img src="img/delete.png" alt=""> -->
                              </td>
                          </tr>
                          @endforeach
                          @endguest
                          @endif
                              
                          
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
	  function likesRemove (itemId) {
		  
		  $.ajax({
			  url: '{{action("LikesController@likesRemove")}}' + '?itemId=' + itemId,
			  type: 'GET',
			  
			  success: function (response) {
				  
				  document.getElementById(itemId + "item").remove();
				  
			  }
		  })
		  
	  }
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