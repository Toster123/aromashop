<div class="incoming_msg" id="{{$message->id}}">
<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
<div class="received_msg">
    <div class="received_withd_msg">
        <p>{{$message->content}}
        </p>
        @if(!$message->images->isEmpty())
            <div class="images_scroll incoming_imgs">
                @foreach($message->images as $image)
                    <img class="image" height="140" src="{{Storage::url($image->img_href)}}" alt="">
                @endforeach
            </div>
        @endif
        <span class="time_date">{{$message->user->name}} {{date_format($message->created_at, 'H:i d.m.Y')}}</span></div>
</div>
</div>
