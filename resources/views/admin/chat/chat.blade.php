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
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">

                                <form id="searchDialogsForm">
                                    @csrf

                                    <span class="input-group-addon">
                                    <button onclick="dialogsReload()" type="button"><i class="ti ti-reload" aria-hidden="true"></i></button>
                                    </span>
                                    <input autocomplete="off" type="text" class="search-bar" placeholder="Search" name="term" id="term">
                                    <span class="input-group-addon">
                                    <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                    </span>
                                </form>
                                 </div>
                        </div>
                    </div>
                    <div id="dialogs" class="inbox_chat">

                @include('layouts.admin.chat.dialogs')

                    </div>
                </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        var socket = io(':6001');
        var dialogId;
        var inSearch = false;
        function scrollDialog () {
            if (document.getElementById('scrollchat').scrollHeight !== null) {
                document.getElementById('scrollchat').scrollTop = document.getElementById('scrollchat').scrollHeight;
            }
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
                    socket.emit('dialogSelected', id);
                    dialogId = id;
                    document.getElementById('mesgs').innerHTML = dialog;
                    scrollDialog();

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
                                    let height = document.getElementById('scrollchat').scrollHeight;
                                    $('.msg_history').prepend(messages);
                                    // document.getElementById(id).scrollIntoView({block: "start", behavior: "auto"});
                                    document.getElementById('scrollchat').scrollTop = document.getElementById('scrollchat').scrollHeight - height;
                                    /*.scrollTo(0, document.getElementById(id).offsetTop - document.getElementById(id).scrollHeight);*/
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

        function dialogsReload () {
            socket.emit('dialogsReload');
            dialogId = null;
            $.ajax({
                url: "{{action('UserController@getDialogs')}}",
                type: 'GET',
                datatype: 'html',
                success: function (dialogs) {
                    inSearch = false;
                    document.getElementById('mesgs').innerHTML = '';
                    document.getElementById('dialogs').innerHTML = dialogs;
                }
            });
        }
        $(document).on('submit', '#messageSendForm', function (e) {
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

                document.getElementById('lastMessage' + dialogId).innerHTML = ''

                if (document.getElementById('photos').files.length > 0) {
                    if (document.getElementById('photos').files.length > 1) {
                        document.getElementById('lastMessage' + dialogId).insertAdjacentHTML('beforeEnd', document.getElementById('photos').files.length);
                    }
                    document.getElementById('lastMessage' + dialogId).insertAdjacentHTML('beforeEnd', '<i class="ti-image"></i>');
                }
                document.getElementById('lastMessage' + dialogId).insertAdjacentHTML('beforeEnd', document.getElementById('message').value);

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
                    success: function (data) {
                        data = JSON.parse(data);
                        $('.sent_msg:last').find('p').next('.outgoing_imgs').remove();
                        $('.sent_msg:last').find('p').after(data.images);
                        $('.sent_msg:last').find('span').html(data.date);
                        scrollDialog();
                    }
                });

            }
        });

        //search-dialogs---------------------------------------------------------

        var route = "{{url('/search/dialogs')}}";
        var data = new FormData(document.getElementById('searchDialogsForm'));
        $('#term').typeahead({
            source: function (term, process) {
                return $.ajax({
                    url: route,
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        return process(data);
                    }
                });
            }
        });

        //-

        document.getElementById('searchDialogsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            if(document.getElementById('term').value) {
                var data = new FormData(document.getElementById('searchDialogsForm'));
                $.ajax({
                    url: "{{action('UserController@searchDialogs')}}",
                    type: 'POST',
                    datatype: 'html',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (dialogs) {
                        if (dialogs) {
                            document.getElementById('dialogs').innerHTML = dialogs;
                        }
                    }
                });
            }
        });

        socket.on('userMessage', function (data) {

            if (dialogId == data.dialog_id) {
                $('#scrollchat').append(data.messageHTML);
                scrollDialog();
                if ($('#lastMessage' + dialogId)) {
                    document.getElementById('lastMessage' + dialogId).innerHTML = '';
                    if (data.count_of_images !== 0) {
                        if (data.count_of_images > 1) {
                            document.getElementById('lastMessage' + dialogId).insertAdjacentHTML('beforeEnd', data.count_of_images);
                        }
                        document.getElementById('lastMessage' + dialogId).insertAdjacentHTML('beforeEnd', '<i class="ti-image"></i>');
                    }
                    document.getElementById('lastMessage' + dialogId).insertAdjacentHTML('beforeEnd', data.message);
                }
            } else {
                if (inSearch) {
                    if ($('#dialog' + data.dialog_id)) {
                        $('#dialog' + data.dialog_id).replaceWith(data.dialogHTML);
                    }
                } else {
                    if(!data.seen) {
                        if ($('#dialog' + data.dialog_id)) {
                            $('#dialog' + data.dialog_id).remove();
                        }
                        $('.inbox_chat').prepend(data.dialogHTML);
                    } else {
                        if ($('#dialog' + data.dialog_id)) {
                            $('#dialog' + data.dialog_id).replaceWith(data.dialogHTML);
                        }
                    }
                }

            }
        });

        socket.on('adminMessage', function (data) {
            if (Number(data.user_id) !== Number({{Auth::id()}})) {
                if (dialogId == data.dialog_id) {
                    document.getElementById('lastMessage' + dialogId).innerHTML = data.message;
                    $('#scrollchat').append(data.outgoingMessageHTML);
                    scrollDialog();
                } else {
                    if ($('#lastMessage' + data.dialog_id)) {
                        document.getElementById('lastMessage' + data.dialog_id).innerHTML = '';
                        if (data.count_of_images !== 0) {
                            if (data.count_of_images > 1) {
                                document.getElementById('lastMessage' + data.dialog_id).insertAdjacentHTML('beforeEnd', data.count_of_images);
                            }
                            document.getElementById('lastMessage' + data.dialog_id).insertAdjacentHTML('beforeEnd', '<i class="ti-image"></i>');
                        }
                        document.getElementById('lastMessage' + data.dialog_id).insertAdjacentHTML('beforeEnd', data.message);
                    }
                }
            }
        });

        socket.on('dialogSelected', function (dialogId) {
            if ($('#dialog' + dialogId) && $('#newMessage' + dialogId)) {
                if (inSearch) {
                    if ($('#newMessage' + dialogId)) {
                        $('#newMessage' + dialogId).remove();
                    }
                } else {
                    $('#dialog' + dialogId).remove();
                }
            }
        });
    </script>
</body>
</html>

@endsection
