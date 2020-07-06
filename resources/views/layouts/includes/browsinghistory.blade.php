@if(!empty($browsingHistory))
@if($browsingHistory->count() <= 4)

            <section class="section-margin calc-60px">
        <div class="container">
	         <div class="section-intro pb-60px">
                <p>{{__('includes.what_you_were_looking_for')}}</p>
                <h2>{{__('includes.browsing')}} <span class="section-intro__style">{{__('includes.history')}}</span></h2>
            </div>
            <div class="row">
            @foreach($browsingHistory as $item)



                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <a href="{{ route('item', $item->id) }}">
                                @if(is_null($item->img_href))
                                <img class="card-img" height="255" src="{{ asset('storage/errors/item_no_img.png') }}" alt="">
                                @else
                                <img class="card-img" height="255" src="{{ asset($item->img_href) }}" alt="">
                                @endif
                            </a>

                            <ul class="card-product__imgOverlay">
                                @if($item->in_cart)
                                    <li class="cartRemoveButton{{$item->id}}"><a><button onclick="cartRemove({{$item->id}});"><i class="ti-check"></i></button></a></li><li class="cartAddButton{{$item->id}}" hidden="true"><a><button onclick="cartAdd({{$item->id}});"><i class="ti-shopping-cart"></i></button></a></li>
                                @else
                                    <li class="cartRemoveButton{{$item->id}}" hidden="true"><a><button onclick="cartRemove({{$item->id}});"><i class="ti-check"></i></button></a></li><li class="cartAddButton{{$item->id}}"><a><button onclick="cartAdd({{$item->id}});"><i class="ti-shopping-cart"></i></button></a></li>
                                @endif
                                @if($item->is_liked)
                                    <li class="likeRemoveButton{{$item->id}}"><a onclick="likesRemove({{$item->id}})"><button><i class="ti-close"></i></button></a></li><li class="likeAddButton{{$item->id}}" hidden="true"><a onclick="likesAdd({{$item->id}})"><button><i class="ti-heart"></i></button></a></li>
                                @else
                                    <li class="likeRemoveButton{{$item->id}}" hidden="true"><a onclick="likesRemove({{$item->id}})"><button><i class="ti-close"></i></button></a></li><li class="likeAddButton{{$item->id}}"><a onclick="likesAdd({{$item->id}})"><button><i class="ti-heart"></i></button></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>{{$item->category->title}}</p>
                            <h4 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{$item->title}}</a></h4>
                            @if($item->discount == 0)
                                <p class="card-product__price">${{$item->price}}</p>
                            @else
                                <p><s>${{$item->price}}</s> <strong>-{{$item->discount}}%</strong></p><p style="color: firebrick;" class="card-product__price">${{$item->getPriceWithDiscount()}}</p>
                            @endif                        </div>
                    </div>
                </div>

            @endforeach
            </div>
        </div>
            </section>
            @else

            <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>{{__('includes.what_you_were_looking_for')}}</p>
                <h2>{{__('includes.browsing')}} <span class="section-intro__style">{{__('includes.history')}}</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
	            @foreach($browsingHistory as $item)

	            <div class="card text-center card-product">
                    <div class="card-product__img">
                        <a href="{{ route('item', $item->id) }}"><img class="card-img" src="{{ asset('img/product/product1.png') }}" alt=""></a>

                            <ul class="card-product__imgOverlay">
                                <li><a href="{{ route('cartAdd', $item->id) }}"><button><i class="ti-shopping-cart"></i></button></a></li>

								<li><a href="{{ route('likesAdd', $item) }}"><button><i class="ti-heart"></i></button></a></li>
                            </ul>
                    </div>
                    <div class="card-body">
                        <p>{{$item->category}}</p>
                        <h4 class="card-product__title"><a href="{{ route('item', $item->id) }}">{{$item->title}}</a></h4>
                        <p class="card-product__price">${{$item->price}}</p>
                    </div>
                </div>

	            @endforeach


	            <!--
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product1.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product2.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product3.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product4.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product1.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product2.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product3.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{ asset('img/product/product4.png') }}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                    -->


            </div>
        </div>
    </section>
    @endif
    @endif
