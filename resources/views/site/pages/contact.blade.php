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
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.css')}}">

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
                                        {{$data->get('contact_head_en')}}
                                        @else
                                        {{$data->get('contact_head_ar')}}
                                        @endif
                                    </h3>
                                    <p class="section-subtitle">
                                        @if (Config::get('app.locale') == 'en')
                                        {{$data->get('contact_content_en')}}
                                        @else
                                        {{$data->get('contact_content_ar')}}
                                        @endif
                                    </p>
                                </div><!--End center-height-->
                            </div><!--End Row-->
                        </div><!--End container-->
                    </div><!--End Welcome-Home-->
                </section><!--End Home Section-->
                <section class="section contact">
                    <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="contact-info">
                                        <div class="contact-widget">
                                            <div class="contact-icon">
                                                <img src="{{asset('assets/site/images/icons/contact-icon-1.png')}}">
                                            </div><!-- End Contact-Widget-Head -->
                                            <div class="contact-body">
                                                @if (Config::get('app.locale') == 'ar')
                                                <span> الهاتف </span>
                                                @else
                                                <span> Phone </span>
                                                @endif
                                                <span class="text-en"> {{$contact->get('phone')}}</span>
                                            </div><!-- End Contact-Body -->
                                        </div><!-- End Contact-Widget -->
                                        <div class="contact-widget">
                                            <div class="contact-icon">
                                                <img src="{{asset('assets/site/images/icons/contact-icon-2.png')}}">
                                            </div><!-- End Contact-Widget-Head -->
                                            <div class="contact-body">
                                                @if (Config::get('app.locale') == 'ar')
                                                <span> البريد الالكتروني </span>
                                                @else
                                                <span> E-mail Address </span>
                                                @endif
                                                <span class="text-en"> {{$contact->get('email')}} </span>
                                            </div><!-- End Contact-Body -->
                                        </div><!-- End Contact-Widget -->
                                        <div class="contact-widget">
                                            <div class="contact-icon">
                                                <img src="{{asset('assets/site/images/icons/contact-icon-3.png')}}">
                                            </div><!-- End Contact-Widget-Head -->
                                            <div class="contact-body">
                                                @if (Config::get('app.locale') == 'ar')
                                                <span> العنوان :</span>
                                                <span> {{$contact->get('address_ar')}}</span>
                                                @else
                                                <span> Address :</span>
                                                <span> {{$contact->get('address_en')}}</span>
                                                @endif
                                            </div><!-- End Contact-Body -->
                                        </div><!-- End Contact-Widget -->              
                                        <ul class="social-list">
                                            <li>
                                                <a href="{{$contact->get('facebook')}}">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('twitter')}}">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('google')}}">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('linkedin')}}">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul><!-- End Social-List -->
                                    </div><!-- End Contact-Info -->
                                </div><!-- End col -->
                                <div class="col-sm-8">
                                    <div class="contact-form">
                                        <form class="form" action="{{route('site.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Full Name @else الاسم بالكامل @endif" name="name" data-msg-required="من فضلك أدخل اسمك" aria-required="true" aria-invalid="true">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Email Address @else البريد الالكترونى @endif" name="email" data-msg-required="من فضلك أدخل بريدك الالكترونى" aria-required="true" aria-invalid="true">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="7" placeholder=" @if (Config::get('app.locale') == 'en') Message @else الرسالة @endif" name="message" data-msg-required="من فضلك أكتب رسالتك" aria-required="true" aria-invalid="true"></textarea>
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-lg-12">
                                                        <button type="submit" class="custom-btn addBTN">@if (Config::get('app.locale') == 'en') Send Message @else ارسال رسالة @endif</button>
                                                </div><!-- End col -->
                                            </div><!-- End row -->
                                        </form><!-- End Form -->
                                    </div><!-- End Contact-Form -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                        <div class="clearfix"></div>
                    <div class="map-wrap">
                        <div id="map"></div>
                    </div><!--End map-wrap-->
                    <div class="copy-right">
                            <div class="container">
                                <div class="text-center">
                                    @if (Config::get('app.locale') == 'ar')
                                        © جميع الحقوق محفوظة لصالح <a href="#">اوشن اكس</a>
                                    @else
                                        © All Rights Reserved for <a href="#">OceanX</a>
                                    @endif
                                </div>
                            </div><!-- End container -->
                        </div><!--End Copy-Right -->   
                </section><!-- End Section -->

            </div><!--End main-->    
        </div><!--End wrapper-->
        @yield('modals')
        @yield('templates')
        <!-- common edit modal with ajax for all project -->
                <div id="common-modal" class="modal fade" role="dialog">
                    <!-- modal -->
                </div>

                <!-- delete with ajax for all project -->
                <div id="delete-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                    </div>
                </div>
                <script id="template-modal" type="text/html" >
                    <div class = "modal-content" >
                        <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                        <div class = "modal-header" >
                            <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                            <h4 class = "modal-title bold" >Delete item?</h4>
                        </div>
                        <div class = "modal-body" >
                            <p >Are you sure?</p>
                        </div>
                        <div class = "modal-footer" >
                            <a
                                href = "{url}"
                                id = "delete" class = "btn btn-danger" >
                                <li class = "fa fa-trash" > </li> Delete
                            </a>

                            <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                                <li class = "fa fa-times" > </li> Cancel</button >
                        </div>
                    </div>
                </script>
                
                @include('site.templates.alerts')
                @include('site.templates.delete-modal')

                <form action="#" id="csrf">{!! csrf_field() !!}</form>
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
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOC5i-INlIfcU00BvVyAodJaZslaTf_ak"></script>
        <script src="{{asset('assets/site/js/google.js')}}" type="text/javascript"></script>
        
        <!-- site-js
        ========================== -->
        <script src="{{asset('assets/site/js/process.js')}}"></script>
        <script src="{{asset('assets/site/js/form-wizard.js')}}"></script>
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}"></script>
        <script src="{{asset('assets/site/process.js')}}"></script>
    </body>
</html>