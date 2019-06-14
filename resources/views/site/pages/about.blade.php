<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Site Title
        ========================== -->
        <title>OceanX</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/site/images/icon.png')}}">
        
        <!-- Css Base And Vendor 
        ===================================-->
        @if (Config::get('app.locale') == 'ar')
            <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css')}}">
        @else
            <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">
        @endif

        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/jpinning/css/jPinning.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/fullpage/jquery.fullpage.min.css')}}" />

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @if (Config::get('app.locale') == 'en')
            <link rel="stylesheet" href="{{asset('assets/site/css/style-en.css')}}">
        @endif
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <header id="header" class="header">
                <div class="container-fluid">
                    <a href="{{URL::to('/')}}" class="logo">
                        <img src="{{asset('assets/site/images/logo.png')}}" id="main-logo">
                    </a>
                    <div class="head-icon">
                        <a class="icon-bar" href="">
                            <img src="{{asset('assets/site/images/menu-blue.png')}}" id="icon-menu">
                        </a>
                    </div>
                </div><!--End container-->
            </header>
            <!--End Header-->
            
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
            
            <div id="fullpage" class="fullpage_wrapper">
                <section class="section section1">
                    <div class="welcome-section wlecome-bg-2">
                        <div class="container">
                            <div class="row">
                                <div class="center-height col-md-6">
                                    <h3 class="title title-md">
                                        @if (Config::get('app.locale') == 'en')
                                            {{$data->get('about_head_en')}}
                                        @else
                                            {{$data->get('about_head_ar')}}
                                        @endif
                                    </h3>
                                    <p class="section-subtitle">
                                        @if (Config::get('app.locale') == 'en')
                                            {{$data->get('about_content_en')}}
                                        @else
                                            {{$data->get('about_content_ar')}}
                                        @endif
                                    </p>
                                </div><!--End center-height-->
                            </div><!--End Row-->
                        </div><!--End container-->
                    </div><!--End Welcome-Home-->
                </section><!--End Home Section-->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-content">
                                    <ul class="client-list">
                                        @foreach($clients as $client)
                                        <li>
                                            <a href="{{$client->url}}">
                                                <img src="{{asset('storage/uploads/clients').'/'.$client->image}}" alt="...">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul><!-- End Client-List -->
                                </div><!-- End Section-Content -->
                            </div><!-- End col -->
                        </div><!-- End row -->
                    </div><!-- End container -->
                </section><!-- End Section -->
            </div><!--End main-->    
        </div><!--End wrapper-->
        
        <!-- Base & Vendors
        ========================== -->        
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery.easing/jquery.easing.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jpinning/js/jPinning.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/fullpage/jquery.fullpage.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery-validation/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery-validation/js/additional-methods.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.js')}}"></script>
        <script src="{{asset('assets/site/vendor/wow-master/wow.min.js')}}"></script>     
        <script src="{{asset('assets/site/vendor/count-to/jquery.countTo.js')}}"></script>
        
        <!-- site-js
        ========================== -->
        <script src="{{asset('assets/site/js/process.js')}}"></script>
        <script src="{{asset('assets/site/js/form-wizard.js')}}"></script>
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}"></script>
    </body>
</html>