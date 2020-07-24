@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - {{__('links.store')}}</title>
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
					<h1 id="klkl">{{__('links.store')}}</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('/')}}">{{__('links.home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('links.store')}}</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">{{__('items.browse_categories')}}</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
	                  <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', removeURLParameter(window.location.href, 'category')); getItems();" class="pixel-radio" type="radio" name="category" @if(!app('request')->input('category')) checked @endif><label>All</label></li>
                    @foreach($categories as $category)
                    <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category={{$category->title}}')); getItems();" class="pixel-radio" type="radio" name="category" @if(app('request')->input('category') == $category->title) checked @endif><label>{{$category->title}}</label></li>
                    @endforeach

                    <!--
                    <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=phones')); getItems();" class="pixel-radio" type="radio" id="phones" name="brand"><label for="Phones">Phones<span> (3600)</span></label></li>
                    <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=laptops')); getItems();" class="pixel-radio" type="radio" id="laptops" value="ii" name="brand"><label for="laptops">Laptops<span> (3600)</span></label></li>

                    <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=cars')); getItems();" class="pixel-radio" type="radio" name="brand"><label id="cars" for="Cars">Cars<span> (3600)</span></label></li>
                  -->
                  </ul>
                </form>
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">{{__('items.product_filters')}}</div>
            <div class="common-filter">
              <div class="head">{{__('items.brands')}}</div>
              <form action="#">
                <ul>
	                <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', removeURLParameter(window.location.href, 'brand')); getItems();" class="pixel-radio" type="radio" name="brand" @if(!app('request')->input('brand')) checked @endif><label>All</label></li>
                  @foreach($brands as $brand)
                  <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'brand'), 'brand={{$brand->title}}')); getItems();" class="pixel-radio" type="radio" name="brand" @if(app('request')->input('brand') == $brand->title) checked @endif><label>{{$brand->title}}</label></li>
                  @endforeach

                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">{{__('items.color')}}</div>
              <form action="#">
                <ul>


	                <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', removeURLParameter(window.location.href, 'color')); getItems();" class="pixel-radio" type="radio" name="color" @if(!app('request')->input('color')) checked @endif><label>All</label></li>
                  @foreach($colors as $color)
                  <li class="filter-list"><input onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'color'), 'color={{$color->title}}')); getItems();" class="pixel-radio" type="radio" name="color"><label for="black" @if(app('request')->input('color') == $color->title) checked @endif>{{$color->title}}</label></li>
                  @endforeach



                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">{{__('items.price')}}</div>
              <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                  <div class="price">{{__('items.from')}}:</div>
                  <span>$</span>
                  <div id="lower-value"></div>
                  <div class="to">{{__('items.to')}}</div>
                  <span>$</span>
                  <div id="upper-value"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting">{{__('items.sort_by')}}:</div>
            <div class="sorting">
              <select id="sort" onchange="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); sortBy();">
	            <option id="sortPop" value="pop">{{__('items.popularity')}}{{__('items.by_default')}}</option>
                <option id="sortPriceDescend" value="priceInDes">{{__('items.by_price')}}{{__('items.in_descending_order')}}</option>
                <option id="sortPriceAscend" value="priceInAsc">{{__('items.by_price')}}{{__('items.in_ascending_order')}}</option>
                <option id="sortRaiting" value="raiting">{{__('items.raiting')}}</option>
                <option id="sortReviews" value="reviews">{{__('items.number_of_reviews')}}</option>
              </select>
            </div>
            <div class="sorting mr-auto">
            </div>
            <div>

              <div class="input-group filter-bar-search">
                <input id="search" type="text" placeholder="{{__('items.search')}}">
                <div class="input-group-append">
                  <button type="button" onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'page')); if (document.getElementById('search').value !== '') {history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'term'), 'term=' + document.getElementById('search').value));} else {history.pushState({}, '', removeURLParameter(window.location.href, 'term'));} getItems();"><i class="ti-search"></i></button>
                </div>
              </div>

            </div>
          </div>


          <section class="lattest-product-area pb-40 category-list">
            <div id="items" class="row">
                <!-- -->
            </div>
          </section>

        </div>
      </div>
    </div>
  </section>
@include('layouts.includes.trandingProducts')


@include('layouts.includes.browsinghistory')

@endsection

@section('end')
{{--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}

  <script type="text/javascript">
      var getItemsUrl = '{{action("StoreController@store")}}';
      var searchItemsUrl = '{{url("/search")}}';

      var cartAddUrl = '{{action("UserController@cartAdd")}}';
      var cartRemoveUrl = '{{action("UserController@cartRemoveWithoutCount")}}';
      var likesAddUrl = '{{action("UserController@likesAdd")}}';
      var likesRemoveUrl = '{{action("UserController@likesRemove")}}';

      var priceMin = @if(app('request')->input('priceMin')) {{app('request')->input('priceMin')}} @else 0 @endif;
      var priceMax = @if(app('request')->input('priceMax')) {{app('request')->input('priceMax')}} @else 10000 @endif;
  </script>
  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/skrollr.min.js') }}"></script>
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors/nouislider/nouislider.min.js') }}"></script>
  <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('vendors/mail-script.js') }}"></script>
  <script src="{{ asset('js/store.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/ajaxCartLikes.js') }}"></script>
</body>
</html>

@endsection
