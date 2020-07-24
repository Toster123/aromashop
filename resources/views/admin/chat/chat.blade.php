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
    <script type="text/javascript">
        var getDialogUrl = '{{action("UserController@getDialog")}}';
        var moreMessagesUrl = '{{action("UserController@moreMessagesForAdmin")}}';
        var getDialogsUrl = '{{action("UserController@getDialogs")}}';
        var messageNoPhotoUrl = '{{Storage::url("errors/message_no_photo.png")}}';
        var sendMessageUrl = '{{action("UserController@sendMessageFromAdmin")}}';
        var searchDialogsTypeaheadUrl = '{{url("/search/dialogs")}}';
        var searchDialogsUrl = '{{action("UserController@searchDialogs")}}';
        var authId = {{Auth::id()}};
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="{{ asset('js/admin/chat.js') }}"></script>
</body>
</html>

@endsection
