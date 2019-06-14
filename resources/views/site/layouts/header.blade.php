            <header id="header" class="header">
                <div class="container-fluid">
                    <a href="{{URL::to('/')}}" class="logo">
                        <img src="{{asset('assets/site/images/logo.png')}}" id="main-logo">
                    </a>
                    <div class="head-icon">
                        <a class="icon-bar" href="">
                            @if(Route::currentRouteName()=='site.home')
                            <img src="{{asset('assets/site/images/menu-icon.png')}}" id="icon-menu">
                            @else
                            <img src="{{asset('assets/site/images/menu-blue.png')}}" id="icon-menu">
                            @endif
                        </a>
                    </div>
                </div><!--End container-->
            </header>
            <ul id="menu">
                <li data-menuanchor="firstPage" class="active"><a href="#firstPage"><span class="menu_line d_block"></span></a></li>
                <li data-menuanchor="secondPage"><a href="#secondPage"><span class="menu_line d_block"></span></a></li>
                <li data-menuanchor="3rdPage"><a href="#3rdPage"><span class="menu_line d_block"></span></a></li>
                <li data-menuanchor="4thPage"><a href="#4thPage"><span class="menu_line d_block"></span></a></li>
            </ul>
            <div class="side-social" style="">
                <ul class="icons">
                    <li>
                        <a href="{{$contact->get('youtube')}}"><img src="{{asset('assets/site/images/youtubeblue.png')}}" alt="youtube icon" id="youtube_icon"></a>
                    </li>
                    <li>
                        <a href="{{$contact->get('instagram')}}"><img src="{{asset('assets/site/images/Instagramblue.png')}}" alt="Instagram icon" id="instagram_icon"></a>
                    </li>
                    <li>
                        <a href="{{$contact->get('twitter')}}"><img src="{{asset('assets/site/images/Twitterblue.png')}}" alt="twitter icon" id="twitter_icon"></a>
                    </li>
                    <li>
                        <a href="{{$contact->get('map')}}"><img src="{{asset('assets/site/images/Locationblue.png')}}" alt="location icon" id="location_icon"></a>
                    </li>
                </ul>
            </div>
            <div class="side-menu">
                <div class="side-menu-container">
                    <div class="icon-bar-container">
                        <a href="" class="icon-bar">
                            <div class="icon-bar-bg">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            @if (Config::get('app.locale') == 'en')
                                Menu
                            @else
                                القائمة
                            @endif
                        </a><!--End icon-bar-->
                    </div>
                    <div class="clearfix"></div>
                    <ul class="side-nav">
                        <li class="@if(Route::currentRouteName()=='site.home') active @endif">
                            <a href="{{URL::to('/')}}">{{trans('app.home')}}</a>
                        </li>
                        <li class="@if(Route::currentRouteName()=='site.about') active @endif">
                            <a href="{{URL::to('/about')}}">{{trans('app.about')}}</a>
                        </li>
                        <li class="@if(Route::currentRouteName()=='site.services') active @endif">
                            <a href="{{URL::to('/services')}}">{{trans('app.services')}}</a>
                        </li>
                        <li class="@if(Route::currentRouteName()=='site.consultations') active @endif">
                            <a href="{{URL::to('/consultations')}}">{{trans('app.consultations')}}</a>
                        </li>
                        <li class="@if(Route::currentRouteName()=='site.initiatives') active @endif">
                            <a href="{{URL::to('/initiatives')}}">{{trans('app.initiatives')}}</a>
                        </li>
                        <li class="@if(Route::currentRouteName()=='site.contact') active @endif">
                            <a href="{{URL::to('/contact')}}">{{trans('app.contact')}}</a>
                        </li>
                    </ul><!--End side-nav-->
                </div><!--End side-menu-container-->
            </div>