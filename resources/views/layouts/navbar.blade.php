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
                        <li class="nav-item active"><a class="nav-link" href="{{ route('/') }}">Home</a></li>


                        <li class="nav-item"><a class="nav-link" href="{{ route('store') }}">Store</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>


                        <li class="nav-item submenu dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
	                            @guest
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Signup</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Signin</a></li>
                                @endguest
                                <li class="nav-item"><a class="nav-link" href="{{ route('tracking') }}">Tracking</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">Cart</a></li>
                                @auth
                                <li class="nav-item"><a class="nav-link" href="{{ route('likes') }}">Likes</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                            @endauth
                            </ul>
                        </li>

                    </ul>




                    <ul class="nav-shop">
                        <li class="nav-item"><a class="nav-link" href="{{ route('likes') }}"><button><i class="ti-heart"></i></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button></a> </li>
                        <li class="nav-item"><a class="button button-header" href="">Buy Now</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->