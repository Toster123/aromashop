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
    <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/mail-script.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script type="text/javascript">
        var dialogId = {{Auth::user()->dialog->id}};
        var socket = io(':6001');
        function scrollDialog () {
            document.getElementById('scrollchat').scrollTop = document.getElementById('scrollchat').scrollHeight;
        }
        $(document).ready(
            function () {
                scrollDialog();
                var is_loading = false;
                $('.msg_history').scroll(function () {
                    if (!is_loading && $('.msg_history').scrollTop() < 1) {
                        is_loading = true;
                        $.ajax({
                            url: "{{action('UserController@moreMessages')}}" + '?message=' + $('.msg_history').find(':first-child').attr('id'),
                            type: 'GET',
                            datatype: 'html',
                            success: function (messages) {
                                var id = $('.msg_history').find(':first-child').attr('id');
                                $('.msg_history').prepend(messages);
                                // document.getElementById(id).scrollIntoView({block: "start", behavior: "auto"});
                                document.getElementById('scrollchat').scrollTop = (document.getElementById('scrollchat').scrollHeight - document.getElementById(id).offsetTop - document.getElementById(id).scrollHeight);
                                if ($('.msg_history').find(':first-child').attr('id') !== 'last') {
                                    is_loading = false;
                                }

                            }
                        });
                    }
                });
            }
        );



        //sending message---------------------------------------------------------
        $(document).on('submit', 'form', function (e) {
            e.preventDefault();
            if (document.getElementById('photos').value || document.getElementById('message').value) {
                let message = ``;
                message += `<div class="outgoing_msg"><div class="sent_msg"><p>`;
                message += document.getElementById('message').value;
                message += `</p>`;
                if (document.getElementById('photos').files.length > 0) {
                    message += `<div class="images_scroll outgoing_imgs">`;
                    for (let i = 0; i < document.getElementById('photos').files.length; i++) {
                        message += `<img class="image" height="140" src="{{Storage::url('errors/message_no_photo.png')}}" alt="">`;
                    }
                    message += `</div>`;
                }
                message += `<span class="time_date"><i class="ti-timer"></i> Sending...</span></div></div>`;

                $('.msg_history').append(message);

                scrollDialog();

                socket.emit('sendMessageQuery', dialogId);

            }
        });

        socket.on('selectedDialogs', function (response) {
            var formData = new FormData(document.getElementById('messageSendForm'));
            formData.append('seen', response);
            document.getElementById('messageSendForm').reset();

            $.ajax({
                url: "{{action('UserController@sendMessageFromUser')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    data = JSON.parse(data);
                    $('.sent_msg:last').find('p').next('.outgoing_imgs').remove();
                    $('.sent_msg:last').find('p').after(data.images);
                    $('.sent_msg:last').find('span').html(data.date);
                    scrollDialog();
                }
            });

        });

        socket.on('adminMessage', function (data) {
                $('#scrollchat').append(data.messageHTML);
                scrollDialog();
        });
    </script>
</body>
</html>

@endsection
