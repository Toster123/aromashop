@foreach($reviews as $review)
    @if($loop->iteration < 5)
        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                    <img src="{{ asset('img/product/review-1.png') }}" alt="">
                </div>
                <div class="media-body">
                    <h4>{{$review->user->name}}</h4>
                    @switch($review->rating)
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
                </div>
            </div>
            <p>{{$review->content}}</p>
        </div>
    @elseif($item->reviews->count() > 4)
        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreReviews({{$review->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
        @break
    @endif
@endforeach
