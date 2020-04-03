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
    <link rel="stylesheet" href="{{ asset('css/chatAdmin.css') }}">
</head>
<body>
@endsection

@section('content')


    <!-- ================ start banner area ================= -->
    <div class="container">
        <div class="messaging">
            <div class="inbox_msg">

                @include('layouts.dialogs')

                <div id="mesgs" class="mesgs">
                    <!--messages-->
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
    <script>

        var dialogId;
        function scrollDialog () {
            document.getElementById('scrollchat').scrollTop = document.getElementById('scrollchat').scrollHeight;
        }
        function selectDialog (id) {
            $('.chat_list').removeClass('active_chat');
            $('#dialog' + id).addClass('active_chat');
            $('#newMessage' + id).remove();
            dialogId = id;
            $.ajax({
                url: "{{action('UserController@getDialog')}}" + '?dialogId=' + id,
                type: 'GET',
                datatype: 'html',
                success: function (dialog) {
                    dialogId = id;
                    document.getElementById('mesgs').innerHTML = dialog;
                    scrollDialog();
                    //скролл до низа

                    var is_loading = false;
                    $('.msg_history').scroll(function () {
                        if (!is_loading && $('.msg_history').scrollTop() < 1) {
                            is_loading = true;
                            $.ajax({
                                url: "{{action('UserController@moreMessagesForAdmin')}}" + '?message=' + $('.msg_history').find(':first-child').attr('id') + '&dialogId=' + id,
                                type: 'GET',
                                datatype: 'html',
                                success: function (messages) {
                                    var id = $('.msg_history').find(':first-child').attr('id');
                                    $('.msg_history').prepend(messages);
                                    document.getElementById(id).scrollIntoView({block: "start", behavior: "auto"});
                                    if ($('.msg_history').find(':first-child').attr('id') !== 'last') {
                                        is_loading = false;
                                    }

                                }
                            })
                        }
                    });



                }
            });
        }

        $(document).on('submit', 'form', function (e) {
            e.preventDefault();
            if (document.getElementById('photos').value || document.getElementById('message').value) {
                $('.msg_history').append(`
                <div class="outgoing_msg">
            <div class="sent_msg">
                <p>` + document.getElementById('message').value + `
                </p>

                <span class="time_date"> 11:01 AM    |    Today</span>
            </div>
        </div>`);

                scrollDialog();

                var formData = new FormData(document.getElementById('messageSendForm'));
                formData.append('dialogId', dialogId);
                document.getElementById('messageSendForm').reset();

                //ajax...
                $.ajax({
                    url: "{{action('UserController@sendMessageFromAdmin')}}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (images) {
                        console.log(images);
                            $('.sent_msg:last').find('p').after(images);
                            scrollDialog();
                    }
                });

            }
        });
    </script>
</body>
</html>

@endsection
