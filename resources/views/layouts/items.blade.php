@foreach($items as $item)
                  <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
	                  <a href="{{route('item', $item->id)}}">
                    <img class="card-img" src="img/product/product2.png" alt=""></a>
                    <ul class="card-product__imgOverlay">
	                    @if($item->in_cart)
	                    <li id="{{$item->id}}cartRemoveButton"><a><button onclick="cartRemove({{$item->id}});"><i class="ti-check"></i></button></a></li><li id="{{$item->id}}cartAddButton" hidden="true"><a><button onclick="cartAdd({{$item->id}});"><i class="ti-shopping-cart"></i></button></a></li>
	                    @else
	                    <li id="{{$item->id}}cartRemoveButton" hidden="true"><a><button onclick="cartRemove({{$item->id}});"><i class="ti-check"></i></button></a></li><li id="{{$item->id}}cartAddButton"><a><button onclick="cartAdd({{$item->id}});"><i class="ti-shopping-cart"></i></button></a></li>
	                    @endif
	                    @if($item->is_liked)
	                    <li id="{{$item->id}}likeRemoveButton"><a onclick="likesRemove({{$item->id}})"><button><i class="ti-close"></i></button></a></li><li id="{{$item->id}}likeAddButton" hidden="true"><a onclick="likesAdd({{$item->id}})"><button><i class="ti-heart"></i></button></a></li>
	                    @else
	                    <li id="{{$item->id}}likeRemoveButton" hidden="true"><a onclick="likesRemove({{$item->id}})"><button><i class="ti-close"></i></button></a></li><li id="{{$item->id}}likeAddButton"><a onclick="likesAdd({{$item->id}})"><button><i class="ti-heart"></i></button></a></li>
	                    @endif
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>{{$item->category}}</p>
                    <h4 class="card-product__title"><a href="{{route('item', $item->id)}}">{{$item->title}}</a></h4>
                    <p class="card-product__price">${{$item->price}}</p>
                  </div>
                </div>
              </div>
                
@endforeach
</div>

{{ $items->links() }}
