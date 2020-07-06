@foreach($reviews as $review)
    @if($loop->iteration < 8)
        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                        <img height="70" src="{{ asset($review->item->img_href) }}" alt="">
                </div>
                <div class="media-body">
                    <h4>{{$review->item->title}}</h4>
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
    @else
        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreReviews({{$review->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
        @break
    @endif
@endforeach
