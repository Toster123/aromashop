@extends('layouts.master')

@section('begin')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Category</title>
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
					<h1 id="klkl">Shop Category</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
	                  <li class="filter-list"><input checked onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'category')); ajaxQuery();" class="pixel-radio" type="radio" id="allCategories" name="brand"><label for="men">All<span> (3600)</span></label></li>
                    <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=clocks')); ajaxQuery();" value="ff" class="pixel-radio" type="radio" id="clocks" name="brand"><label for="clocks">Clocks<span> (3600)</span></label></li>
                    <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=phones')); ajaxQuery();" class="pixel-radio" type="radio" id="phones" name="brand"><label for="Phones">Phones<span> (3600)</span></label></li>
                    <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=laptops')); ajaxQuery();" class="pixel-radio" type="radio" id="laptops" value="ii" name="brand"><label for="laptops">Laptops<span> (3600)</span></label></li>
                    
                    <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'category'), 'category=cars')); ajaxQuery();" class="pixel-radio" type="radio" name="brand"><label id="cars" for="Cars">Cars<span> (3600)</span></label></li>
                    
                  </ul>
                </form>
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">Product Filters</div>
            <div class="common-filter">
              <div class="head">Brands</div>
              <form action="#">
                <ul>
	                <li class="filter-list"><input checked onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'brand')); ajaxQuery();" class="pixel-radio" type="radio" id="allBrands" name="brand"><label for="apple">All<span>(29)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'brand'), 'brand=apple')); ajaxQuery();" class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'brand'), 'brand=asus')); ajaxQuery();" class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'brand'), 'brand=sumsung')); ajaxQuery();" class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Color</div>
              <form action="#">
                <ul>
	                
	                
	                <li class="filter-list"><input checked onclick="history.pushState({}, '', removeURLParameter(window.location.href, 'color')); ajaxQuery();" class="pixel-radio" type="radio" id="allColors" name="color"><label for="black">All<span>(29)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'color'), 'color=black')); ajaxQuery();" class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'color'), 'color=white')); ajaxQuery();" class="pixel-radio" type="radio" id="white" name="color"><label for="gold">White<span>(19)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'color'), 'color=red')); ajaxQuery();" class="pixel-radio" type="radio" id="red" name="color"><label for="gold">Red<span>(19)</span></label></li>
                  <li class="filter-list"><input onclick="history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'color'), 'color=blue')); ajaxQuery();" class="pixel-radio" type="radio" id="blue" name="color"><label for="gold">Blue<span>(19)</span></label></li>
                  
                  
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Price</div>
              <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                  <div class="price">Price:</div>
                  <span>$</span>
                  <div id="lower-value"></div>
                  <div class="to">to</div>
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
            <div class="sorting">Sort By:</div>
            <div class="sorting">
              <select id="sort" onchange="sortBy();">
	            <option id="sortPop" value="pop">Popylarity(by Default)</option>
                <option id="sortPriceDescend" value="priceInDes">Price(in Descending order)</option>
                <option id="sortPriceAscend" value="priceInAsc">Price(in Ascending order)</option>
                <option id="sortRaiting" value="raiting">Raiting</option>
                <option id="sortReviews" value="reviews">Number of reviews</option>
              </select>
            </div>
            <div class="sorting mr-auto">
              <select>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
              </select>
            </div>
            <div>
	            
              <div class="input-group filter-bar-search">
                <input id="search" type="text" placeholder="Search">
                <div class="input-group-append">
                  <button type="button" onclick="if (document.getElementById('search').value !== '') {history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'term'), 'term=' + document.getElementById('search').value));} else {history.pushState({}, '', removeURLParameter(window.location.href, 'term'));} ajaxQuery();"><i class="ti-search"></i></button>
                </div>
              </div>
	            
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          
          
          
          
          
          
          <!-- ---------------------- -->
          <section class="lattest-product-area pb-40 category-list">
            <div id="items" class="row">
	            
	            
              <!--
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product2.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Beauty</p>
                    <h4 class="card-product__title"><a href="#">Women Freshwash</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product3.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Decor</p>
                    <h4 class="card-product__title"><a href="#">Room Flash Light</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product4.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Decor</p>
                    <h4 class="card-product__title"><a href="#">Room Flash Light</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product5.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Accessories</p>
                    <h4 class="card-product__title"><a href="#">Man Office Bag</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product6.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Kids Toy</p>
                    <h4 class="card-product__title"><a href="#">Charging Car</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product7.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Accessories</p>
                    <h4 class="card-product__title"><a href="#">Blutooth Speaker</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div> 
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product8.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Kids Toy</p>
                    <h4 class="card-product__title"><a href="#">Charging Car</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="img/product/product1.png" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Accessories</p>
                    <h4 class="card-product__title"><a href="#">Quartz Belt Watch</a></h4>
                    <p class="card-product__price">$150.00</p>
                  </div>
                </div>
              </div>
            </div> -->
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->		  

	<!-- ================ top product area start ================= -->	
	<section class="related-product-area">
		<div class="container">
			<div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Top <span class="section-intro__style">Product</span></h2>
      </div>
			<div class="row mt-30">
        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-1.png') }}" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-2.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-3.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-4.png') }}" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-5.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-6.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-7.png') }}" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-8.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-9.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-1.png') }}" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-2.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="{{ asset('img/product/product-sm-3.png') }}" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</section>
	<!-- ================ top product area end ================= -->		

@include('layouts.browsinghistory')

	<!-- ================ Subscribe section start ================= -->		  
  <section class="subscribe-position">
    <div class="container">
      <div class="subscribe text-center">
        <h3 class="subscribe__title">Get Update From Anywhere</h3>
        <p>Bearing Void gathering light light his eavening unto dont afraid</p>
        <div id="mc_embed_signup">
          <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
            <div class="form-group ml-sm-auto">
              <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
              <div class="info"></div>
            </div>
            <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
            <div style="position: absolute; left: -5000px;">
              <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
            </div>

          </form>
        </div>
        
      </div>
    </div>
  </section>
	<!-- ================ Subscribe section end ================= -->		  




@endsection

@section('end')
  <script type="text/javascript">
	  
	  window.addEventListener('DOMContentLoaded', function() {
		  console.log(document.getElementById('sortPop').value);
		  ajaxQuery ();
	});
	  
	  function $_getIsset(key) {
    var url = new URL(window.location.href);
    return url.searchParams.get(key) === null ? false : true;
}
	  
	  function removeURLParameter(url, parameter) {
		  
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');   
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {    
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                pars.splice(i, 1);
            }
        }
        
        if(pars.length > 0) {
            url= urlparts[0]+'?'+pars.join('&');
        } else {
            url= urlparts[0];
        }

        return url;
    } else {
        return url;
    }
    
}
	  
	  
	  
	  
	  
	  function serializeGet(obj) {
  var str = [];
  for(var p in obj)
    if (obj.hasOwnProperty(p)) {
      str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
    }
  return str.join("&");
}





function addGet(url, get) {

  if (typeof(get) === 'object') {
      get = serializeGet(get);
  }

  if (url.match(/\?/)) {
      return url + '&' + get;
  }

  if (!url.match(/\.\w{3,4}$/) && url.substr(-1, 1) !== '/') {
    url += '/';
  }
  
  return url + '?' + get;
}
	  
	  function checkSlashInPath () {if (window.location.pathname.charAt(window.location.pathname.length - 1) == '/') {return '';} else {return '/';}}
	  
	  function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }
	  function cartAdd (itemId) {
		  
		  $.ajax({
			  url: '{{action("CartController@cartAdd")}}' + '?itemId=' + itemId,
			  type: 'GET',
			  
			  success: function (response) {
				  
				  document.getElementById(itemId + "cartAddButton").hidden = true;
				  document.getElementById(itemId + "cartRemoveButton").hidden = false;
				  
			  }
		  })
		  
		  
	  }
	  function cartRemove (itemId) {
		  
		  $.ajax({
			  url: '{{action("CartController@cartRemoveWithoutCount")}}' + '?itemId=' + itemId,
			  type: 'GET',
			  
			  success: function (response) {
				  
				  document.getElementById(itemId + "cartAddButton").hidden = false;
				  document.getElementById(itemId + "cartRemoveButton").hidden = true;
				  
			  }
		  })
		  
	  }	  
	  function likesAdd (itemId) {
		  
		  $.ajax({
			  url: '{{action("LikesController@likesAdd")}}' + '?itemId=' + itemId,
			  type: 'GET',
			  
			  success: function (response) {
				  
				  document.getElementById(itemId + "likeAddButton").hidden = true;
				  document.getElementById(itemId + "likeRemoveButton").hidden = false;
				  
			  }
		  })
		  
	  }
	  function likesRemove (itemId) {
		  
		  $.ajax({
			  url: '{{action("LikesController@likesRemove")}}' + '?itemId=' + itemId,
			  type: 'GET',
			  
			  success: function (response) {
				  
				  document.getElementById(itemId + "likeAddButton").hidden = false;
				  document.getElementById(itemId + "likeRemoveButton").hidden = true;
				  
			  }
		  })
		  
	  }
	  
	  function ajaxQuery () {
		  $.ajax({
			  url: '{{action("StoreController@ajaxItems")}}' + window.location.search,
			  type: 'GET',
			  
			  success: function (items) {
				  
				  $('#items').empty();
				  items = JSON.parse(items);
				  console.log(items);
				  items.forEach((item) => {
					  if (item.is_liked) {
						  var like = '<li id="' + item.id + 'likeRemoveButton"><a onclick="likesRemove(' + item.id + ')"><button><i class="ti-close"></i></button></a></li><li id="' + item.id + 'likeAddButton" hidden="true"><a onclick="likesAdd(' + item.id + ')"><button><i class="ti-heart"></i></button></a></li>';
					  } else {
						  var like = '<li id="' + item.id + 'likeAddButton"><a onclick="likesAdd(' + item.id + ')"><button><i class="ti-heart"></i></button></a></li><li id="' + item.id + 'likeRemoveButton" hidden="true"><a onclick="likesRemove(' + item.id + ')"><button><i class="ti-close"></i></button></a></li>';
					  }
					  
					  if (item.in_cart) {
						  
					  var buttons = '<ul class="card-product__imgOverlay"><li id="' + item.id + 'cartRemoveButton"><a><button onclick="cartRemove(' + item.id + ');"><i class="ti-check"></i></button></a></li><li id="' + item.id + 'cartAddButton" hidden="true"><a><button onclick="cartAdd(' + item.id + ');"><i class="ti-shopping-cart"></i></button></a></li>' + like + '</ul>';
					  
					  } else {
						  var buttons = '<ul class="card-product__imgOverlay"><li id="' + item.id + 'cartAddButton"><a onclick="cartAdd(' + item.id + ');"><button><i class="ti-shopping-cart"></i></button></a></li><li  id="' + item.id + 'cartRemoveButton" hidden="true"><a onclick="cartRemove(' + item.id + ');"><button><i class="ti-check"></i></button></a></li>' + like + '</ul>';

					  }
					  
					  
					  var its = '<div class="col-md-6 col-lg-4"><div class="card text-center card-product"><div class="card-product__img"><a href="' + window.location.pathname + checkSlashInPath() + item.id + '"><img class="card-img" src="{{ asset("img/product/product1.png") }}" alt=""></a>' + buttons + '</div><div class="card-body"><p>' + item.category + '</p><h4 class="card-product__title"><a href="' + item.id + '">' + item.title + '</a></h4><p class="card-product__price">$' + item.price + '</p></div></div></div>';
					  
					  document.getElementById('items').innerHTML = document.getElementById('items').innerHTML + its;
				  });
				  
				  
					  
				  
			  },
			  error: function (msg) {
				  console.log(msg);
			  }
			  
		  })
	  }
	  
	  
	  
	  function sortBy() {
		  var selectBox = document.getElementById("sort");
		  
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if(selectedValue !== 'pop') {
	    history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'sortby'), 'sortby=' + selectedValue));
    } else {
	    history.pushState({}, '', removeURLParameter(window.location.href, 'sortby'));
    }
    ajaxQuery ();
	  }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <script type="text/javascript">
	  var route = "{{url('/search')}}";
	  $('#search').typeahead({
		 source: function (term, process) {
			 return $.get(route, { term: term }, function (data) {
				return process(data); 
			 });
		 } 
	  });
  </script>
  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/skrollr.min.js') }}"></script>
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors/nouislider/nouislider.min.js') }}"></script>
  <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('vendors/mail-script.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

@endsection