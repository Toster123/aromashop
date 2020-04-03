@if(!$message->images->isEmpty())
<div class="images_scroll outgoing_imgs">
    @foreach($message->images as $image)
        <img class="image" height="140" src="{{Storage::url($image->img_href)}}" alt="">
    @endforeach
</div>
@endif
