<section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>{{__('includes.popular_item_in_the_market')}}</p>
            <h2>{{__('includes.trending')}} <span class="section-intro__style">{{__('includes.products')}}</span></h2>
        </div>
        <div class="row">

            @foreach($popularItems as $item)

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <a href="{{ route('item', $item->id) }}">
                                    <img class="card-img" height="255" src="{{ asset($item->img_href) }}" alt="">
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
