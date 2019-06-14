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
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/wow-master/animate.css')}}" />
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
            
            <div id="fullpage" class="fullpage_wrapper">
                <section class="section section1">
                    <div class="welcome-section" data-type="background" data-speed="5">
                        <div class="container">
                            <div class="row">
                                <div class="center-height text-center col-md-10 col-md-offset-1">
                                    <div class="animated fadeInDown">
                                        <h1 class="home-heading">
                                            <span class="word-rotate">
                                                <span class="words-box">
                                                    @if (Config::get('app.locale') == 'ar')
                                                    <span>X</span>
                                                    <span>X</span>
                                                    <span>X</span>
                                                    @else
                                                    <span>أكس</span>
                                                    <span>أكس</span>
                                                    <span>أكس</span>
                                                    @endif
                                                </span>
                                            </span>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('slider_en')}}
                                            @else
                                            {{$data->get('slider_ar')}}
                                            @endif
                                        </h1>
                                    </div><!--End animated-->
                                </div><!--End center-height-->
                            </div><!--End Row-->
                        </div><!--End container-->
                    </div><!--End Welcome-Home-->
                </section><!--End Home Section-->
                <section class="section section-lg colored about">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 section-img">
                                <div class="absolute-img">
                                    <img src="{{asset('storage/uploads/static').'/'.$data->get('image')}}" alt="...">
                                </div><!-- End Absolute-Img -->
                            </div><!-- End col -->
                            <div class="col-md-8 col-md-offset-4">
                                <div class="about-box">
                                    <div class="about-box-head">
                                        <h3 class="title">
                                            @if (Config::get('app.locale') == 'en')
                                            Who We Are?
                                            @else
                                            من نحن؟
                                            @endif
                                        </h3>
                                    </div><!-- End About-Box-Head -->
                                    <div class="about-box-body">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('about_en')}}
                                            @else
                                            {{$data->get('about_ar')}}
                                            @endif
                                        </p>
                                    </div><!-- End About-Box-Body -->
                                </div><!-- End About-Box -->
                                <div class="about-box">
                                    <div class="about-box-head">
                                        <h3 class="title">
                                            @if (Config::get('app.locale') == 'en')
                                            Our Vision
                                            @else
                                            رؤيتنا
                                            @endif
                                        </h3>
                                    </div><!-- End About-Box-Head -->
                                    <div class="about-box-body">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('vision_en')}}
                                            @else
                                            {{$data->get('vision_ar')}}
                                            @endif
                                        </p>    
                                    </div><!-- End About-Box-Body -->
                                </div><!-- End About-Box -->
                            </div><!-- End col -->
                        </div><!-- End row -->
                    </div><!-- End container -->
                </section><!-- End Section -->
                <section class="section section-lg services">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="section-head">
                                        @if (Config::get('app.locale') == 'en')
                                        <h3 class="section-title"><span class="blue">What</span> we offer?</h3>
                                        @else
                                        <h3 class="section-title"><span class="blue">ماذا</span> نقدم لك؟</h3>
                                        @endif
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('offers_en')}}
                                            @else
                                            {{$data->get('offers_ar')}}
                                            @endif
                                        </p>
                                    </div><!-- End Section-Head -->
                                </div><!-- End col -->
                                <div class="col-md-8">
                                    <div class="section-contnt">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="service-box">
                                                    <div class="service-box-img green-overlay">
                                                        <img src="{{asset('assets/site/images/mobadrat-img.jpg')}}" alt="...">
                                                    </div><!-- End Service-Box-Img -->
                                                    <div class="service-box-content">
                                                        <img src="{{asset('assets/site/images/icons/01.png')}}" alt="...">
                                                        <a class="title title-sm" href="{{URL::to('/initiatives')}}">
                                                            @if (Config::get('app.locale') == 'en')
                                                            Initiatives
                                                            @else
                                                            المبادرات
                                                            @endif
                                                        </a>
                                                        <p>
                                                            @if (Config::get('app.locale') == 'en')
                                                            {{$data->get('initiatives_en')}}
                                                            @else
                                                            {{$data->get('initiatives_ar')}}
                                                            @endif
                                                        </p>
                                                    </div><!-- End Service-Box-Content -->
                                                </div><!-- End Service-Box -->
                                                <div class="service-box">
                                                    <div class="service-box-img yellow-overlay">
                                                        <img src="{{asset('assets/site/images/service-img.jpg')}}" alt="...">
                                                    </div><!-- End Service-Box-Img -->
                                                    <div class="service-box-content">
                                                        <img src="{{asset('assets/site/images/icons/02.png')}}" alt="...">
                                                        <a class="title title-sm" href="{{URL::to('/services')}}">
                                                            @if (Config::get('app.locale') == 'en')
                                                            Services
                                                            @else
                                                            الخدمات
                                                            @endif
                                                        </a>
                                                        <p>
                                                            @if (Config::get('app.locale') == 'en')
                                                            {{$data->get('services_en')}}
                                                            @else
                                                            {{$data->get('services_ar')}}
                                                            @endif
                                                        </p>
                                                    </div><!-- End Service-Box-Content -->
                                                </div><!-- End Service-Box -->
                                            </div><!-- End col -->
                                            <div class="col-md-6">
                                                <div class="service-box lg-item">
                                                    <div class="service-box-img blue-overlay">
                                                        <img src="{{asset('assets/site/images/consult-img.jpg')}}" alt="...">
                                                    </div><!-- End Service-Box-Img -->
                                                    <div class="service-box-content">
                                                        <img src="{{asset('assets/site/images/icons/03.png')}}" alt="...">
                                                        <a class="title title-sm" href="{{URL::to('/consultations')}}">
                                                            @if (Config::get('app.locale') == 'en')
                                                            Consultations
                                                            @else
                                                            الاستشارات
                                                            @endif
                                                        </a>
                                                        <p>
                                                            @if (Config::get('app.locale') == 'en')
                                                            {{$data->get('consulting_en')}}
                                                            @else
                                                            {{$data->get('consulting_ar')}}
                                                            @endif
                                                        </p>
                                                    </div><!-- End Service-Box-Content -->
                                                </div><!-- End Service-Box -->
                                            </div><!-- End col -->
                                        </div><!-- End row -->
                                    </div><!-- End Section-Content -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                <section class="section contact">
                    <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="section-head">
                                        @if (Config::get('app.locale') == 'en')
                                        <h3 class="section-title"><span class="blue">Contact</span>us any time</h3>         
                                        @else                    
                                        <h3 class="section-title"><span class="blue">تواصل</span>معنا فى اى وقت</h3>
                                        @endif
                                        <ul class="social-list">
                                            <li>
                                                <a href="{{$contact->get('twitter')}}">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('instagram')}}">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$contact->get('youtube')}}">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                        </ul><!-- End Social-List -->
                                    </div><!-- End Section-Head -->
                                </div><!-- End col -->
                                <div class="col-lg-8">
                                    <div class="contact-form">
                                        <form class="form" action="{{route('site.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;" id="submit_form">
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
                                                        <button type="submit" class="custom-btn button-submit addBTN">@if (Config::get('app.locale') == 'en') Send Message @else ارسال رسالة @endif</button>
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
            </div>

        </div><!-- End Wrapper -->
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
        <!-- JS Base & Vendors
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
        <script src="{{asset('assets/site/js/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/form-wizard.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/process.js')}}" type="text/javascript"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOC5i-INlIfcU00BvVyAodJaZslaTf_ak"></script>
        <script src="{{asset('assets/site/js/google.js')}}" type="text/javascript"></script>
    </body>
</html>