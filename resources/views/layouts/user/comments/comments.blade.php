@foreach($comments as $comment)
    @if($loop->iteration < 10)

        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                        <img height="70" src="{{ asset($comment->item->img_href) }}" alt="">
                </div>
                <div class="media-body">
                    <h4 id="commname">{{$comment->item->title}}</h4>
                    <h5>12th Feb, 2018 at 05:56 pm</h5>

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
