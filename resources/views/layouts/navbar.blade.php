<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('/') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item @if(Route::currentRouteNamed('/')) active @endif"><a class="nav-link" href="{{ route('/') }}">{{__('links.home')}}</a></li>


                        <li class="nav-item submenu dropdown @if(Route::currentRouteNamed('store')) active @endif">
                            <a class="nav-link" href="{{ route('store') }}">{{__('links.store')}}</a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                <li class="nav-item"><a class="nav-link" href="{{route('store') . '?category=' . $category->title}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item @if(Route::currentRouteNamed('contact')) active @endif"><a class="nav-link" href="{{ route('contact') }}">{{__('links.contacts')}}</a></li>

                            @guest

                        <li class="nav-item submenu dropdown @if(Route::currentRouteNamed('register') ||
                        Route::currentRouteNamed('login') ||
                        Route::currentRouteNamed('tracking') ||
                        Route::currentRouteNamed('cart') ||
                        Route::currentRouteNamed('likes')) active @endif">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">{{__('links.account')}}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{__('links.register')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{__('links.login')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">{{__('links.cart')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('likes') }}">{{__('links.likes')}}</a></li>
                            </ul>
                        </li>
						@endguest

                        <li class="nav-item submenu dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">{{Config::get('app.locale')}}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('setlocale', 'ru') }}">Ru</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('setlocale', 'en') }}">En</a></li>
                            </ul>
                        </li>

                    </ul>




                    <ul class="nav-shop">
                        <li class="nav-item"><a class="nav-link" href="{{ route('likes') }}"><button><i class="ti-heart"></i></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"><button><i class="ti-shopping-cart"></i><span id="cartCount" class="nav-shop__circle">3</span></button></a></li>
                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('chat', Auth::id()) }}"><button><i class="ti-comments"></i><span id="cartCount" class="nav-shop__circle">3</span></button></a></li>
                            @endauth
                    </ul>


                       @auth


                       <ul class="nav nav-shop navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item submenu dropdown">

                                    <img id="img_photo" width="80" src="{{Storage::url(Auth::user()->photo_href)}}" alt="Image"
                                         class="img-fluid rounded-circle avatar-nav img-thumbnail">

                                <a id="navbarDropdown " class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->name}}
                            	</a>
                        <ul class="dropdown-menu">

                                <li class="nav-item"><a class="nav-link" href="{{ route('profile', Auth::id()) }}">{{__('links.profile')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('tracking') }}">{{__('links.tracking')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">{{__('links.cart')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('likes') }}">{{__('links.likes')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">{{__('links.logout')}}</a></li>

                            </ul>
                    </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->
