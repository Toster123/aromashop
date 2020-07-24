@foreach($comments as $comment)
    @if($loop->iteration < 10)

        <div class="review_item">
            <div class="media">
                <a href="{{ route('item', $comment->item->id) }}">
                <div class="d-flex">
                        <img height="70" src="{{ asset($comment->item->img_href) }}" alt="">
                </div>
                </a>
                <div class="media-body">
                    <a href="{{ route('item', $comment->item->id) }}">
                    <h4 id="commname">{{$comment->item->title}}</h4>
                    </a>
                    <h5>{{date_format($comment->created_at, 'H:i d.m.Y')}}</h5>

                    {{--                                                <a class="reply_btn" onclick="var name = '{{$comment->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>--}}

                </div>
            </div>
            <p>{{$comment->message}}</p>
        </div>
    @else
        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreComments({{$comment->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
        @break
    @endif
@endforeach
