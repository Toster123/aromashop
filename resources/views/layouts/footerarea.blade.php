<!-- ================ Subscribe section start ================= -->
<section class="subscribe-position">
    <div class="container">
        <div class="subscribe text-center">
            <h3 class="subscribe__title">{{__('links.get_update_from_anywhere')}}</h3>
            <p>{{__('links.get_update_text')}}</p>
            <div id="mc_embed_signup">
                <form target="_blank" action="" method="post" class="subscribe-form form-inline mt-5 pt-1">
                    <div class="form-group ml-sm-auto">
                        <input class="form-control mb-1" type="email" name="email" placeholder="{{__('user.email_adress')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = {{__('user.email_adress')}}" >
                        <div class="info"></div>
                    </div>
                    <button class="button button-subscribe mr-auto mb-1" type="submit">{{__('user.subscribe')}}</button>

                </form>
            </div>

        </div>
    </div>
</section>
<!-- ================ Subscribe section end ================= -->


<!--================ Start footer Area  =================-->
<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">{{__('links.our_mission')}}</h4>
                        <p>
                            {{__('links.our_mission_content')}}
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">{{__('links.main_links')}}</h4>
                        <ul class="list">
                            <li><a href="{{ route('/') }}">{{__('links.home')}}</a></li>
                            <li><a href="{{ route('store') }}">{{__('links.store')}}</a></li>
                            <li><a href="{{ route('contact') }}">{{__('links.contacts')}}</a></li>
                            <li><a href="{{ route('cart') }}">{{__('links.cart')}}</a></li>
                            <li><a href="{{ route('likes') }}">{{__('links.likes')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">{{__('links.trending_products')}}</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            @foreach($footerTrandingItems as $item)
                                <li><a href="{{ route('item', $item->id) }}"><img src="{{ asset($item->img_href) }}" height="70px" width="70px" alt=""></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">{{__('links.contact_us')}}</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                {{__('links.head_office')}}
                            </p>
                            <p>{{__('links.head_office_address')}}</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                {{__('links.phone_number')}}
                            </p>
                            <p>
                                +123 456 7890
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                free@infoexample.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a target="_blank">Ilya</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->
