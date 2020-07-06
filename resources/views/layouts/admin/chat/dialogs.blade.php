    @foreach($dialogs as $dialog)

        <div onclick="selectDialog({{$dialog->id}});" id="dialog{{$dialog->id}}" class="chat_list">
            <div class="chat_people">
                <div class="chat_img"> <img src="{{Storage::url($dialog->user->photo_href)}}" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>{{$dialog->user->name}}<p>{{$dialog->user->email}}</p><span class="chat_date">
                            @if(!$dialog->seen)
                            <div class="new-message" id="newMessage{{$dialog->id}}"></div>
                                @endif
                        </span></h5>
                    <p id="lastMessage{{$dialog->id}}">
                        @if(!$dialog->messages->isEmpty())
                        @if(!$dialog->getLastMessage()->images->isEmpty())
                            @if($dialog->getLastMessage()->images->count() > 1)
                                {{$dialog->getLastMessage()->images->count()}}
                            @endif
                                <i class="ti-image"></i>
                        @endif{{$dialog->getLastMessage()->content}}
                            @endif
                    </p>
                </div>
            </div>
        </div>

        @endforeach
