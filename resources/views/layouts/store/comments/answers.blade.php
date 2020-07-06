@foreach($answers as $answer)
    @if($loop->iteration < 4)
        <div class="review_item reply">
            <div class="media">
                <div class="d-flex">
                    <img src="{{ asset('img/product/review-2.png') }}" alt="">
                </div>
                <div class="media-body">
                    <h4>{{$answer->user->name}}</h4>
                    <h5>12th Feb, 2018 at 05:56 pm</h5>
                    <a class="reply_btn" onclick="var name = '{{$answer->user->name}}'; var hidden = document.getElementById('commentid'); hidden.value = {{$commentId}}; var result = document.getElementById('ansname'); document.getElementById('answer_field').hidden = false; result.value = name; return false;">Reply</a>
                </div>
            </div>
            <p>{{$answer->content}}</p>
        </div>
    @else
        <button style="background-color: #CDCFD6; border-color: #CDCFD6" onclick="moreAnswers({{$answer->id}}, {{$commentId}}, this);" type="button" class="btn btn-secondary btn-lg btn-block">more...</button>
        @break
    @endif
@endforeach
