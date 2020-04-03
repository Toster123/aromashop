<div class="inbox_people">
    <div class="headind_srch">
        <div class="recent_heading">
            <h4>Recent</h4>
        </div>
        <div class="srch_bar">
            <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
        </div>
    </div>
    <div class="inbox_chat">

        @foreach($dialogs as $dialog)

        <div onclick="selectDialog({{$dialog->id}});" id="dialog{{$dialog->id}}" class="chat_list">
            <div class="chat_people">
                <div class="chat_img"> <img src="{{Storage::url($dialog->user->photo_href)}}" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>{{$dialog->user->name}}<span class="chat_date">
                            <div class="new-message" id="newMessage{{$dialog->id}}"></div>
                        </span></h5>
                    <p>{{$dialog->getLastMessage()}}</p>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
