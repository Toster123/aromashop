<div class="outgoing_msg" id=@if($message->last)"last"@else"{{$message->id}}"@endif>
<div class="sent_msg">
    <p>{{$message->content}}
    </p>
    @if(!$message->images->isEmpty())
        <div class="images_scroll outgoing_imgs">
            @foreach($message->images as $image)
                <img class="image" height="140" src="{{Storage::url($image->img_href)}}" alt="">
            @endforeach
        </div>
    @endif
    <span class="time_date">{{$message->user->name}} {{date_format($message->created_at, 'H:i d.m.Y')}}</span>
</div>
</div>
