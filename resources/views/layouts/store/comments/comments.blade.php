@foreach($comments as $comment)
    @if($loop->iteration < 6)
        <div class="review_item">
            <div class="media">
                <a href="{{ route('profile', $comment->user->id) }}">
                <div class="d-flex">
                    <img src="{{ asset($comment->user->photo_href) }}" alt="">
                </div>
                </a>
                <div class="media-body">
                    <a href="{{ route('profile', $comment->user->id) }}">
                    <h4 id="commname">{{$comment->user->name}}</h4>
                    </a>
                    <h5>{{date_format($comment->created_at, 'H:i d.m.Y')}}</h5>

                    <a class="reply_btn" onclick="var name = '{{$comment->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>

                </div>
            </div>
            <p>{{$comment->content}}</p>
        </div>
        @foreach($comment->answers as $answer)
            @if($loop->iteration < 4)
                <div class="review_item reply">
                    <div class="media">
                        <a href="{{ route('profile', $answer->user->id) }}">
                        <div class="d-flex">
                            <img src="{{ asset($answer->user->photo_href) }}" alt="">
                        </div>
                        </a>
                        <div class="media-body">
                            <a href="{{ route('profile', $answer->user->id) }}">
                            <h4>{{$answer->user->name}}</h4>
                            </a>
                            <h5>{{date_format($answer->created_at, 'H:i d.m.Y')}}</h5>
                            <a class="reply_btn" onclick="var name = '{{$answer->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$comment->id}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>
                        </div>
                    </div>
                    <p>{{$answer->content}}</p>
                </div>
            @elseif($loop->iteration > 3)
                <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreAnswers({{$answer->id}}, {{$comment->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
                @break
            @endif
        @endforeach

    @else
        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreComments({{$comment->id}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
        @break
    @endif
@endforeach
