@extends('layouts.master')

@section('begin')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - Product Details</title>
    <link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@endsection

@section('content')


    <!-- ================ start banner area ================= -->
    <div class="container">
        <div class="messaging">
            <div class="inbox_msg">

                <div class="mesgs">
                    <div class="msg_history" id="scrollchat">


                        @include('layouts.chat.messages')

                    </div>
                    <br/>
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
                </div>
            </div>


        </div></div>
    <!--================ end related Product area =================-->



@endsection

@section('end')
    <script type="text/javascript">
        var dialogId = {{Auth::user()->dialog->id}};
        var moreMessagesUrl = '{{action("UserController@moreMessages")}}';
        var messageNoPhotoUrl = '{{Storage::url("errors/message_no_photo.png")}}';
        var sendMessageUrl = '{{action("UserController@sendMessageFromUser")}}';
    </script>
    <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/mail-script.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
</body>
</html>

@endsection
