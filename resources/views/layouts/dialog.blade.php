 <div class="msg_history" id="scrollchat">
        @include('layouts.adminMessages')
    </div>
    <div class="type_msg">
        <div class="input_msg_write">
            <form id="messageSendForm" enctype="multipart/form-data">
                @csrf
                <div class="write_msg">
                    <input id="message" name="message" type="text" placeholder="Type a message">
                </div>
                <input id="photos" multiple name="photos[]" type="file">
                <button class="msg_send_btn" type="submit"><i class="ti-angle-right" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
