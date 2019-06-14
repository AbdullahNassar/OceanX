
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
        
        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" href="{{asset('assets/site/images/icon.png')}}">
        
        <!-- Base & Vendors
        ========================== -->
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/jpinning/css/jPinning.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/fullpage/jquery.fullpage.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/wow-master/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.css')}}">
        
        <!-- Site Style
        ========================== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">    
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
                                            Our Consultations
                                        @else
                                            استشاراتنا
                                        @endif
                                    </h3>
                                    
                                    <p class="section-subtitle">
                                        @if (Config::get('app.locale') == 'en')
                                            {{$data->get('consulting_content_en')}}
                                        @else
                                            {{$data->get('consulting_content_ar')}}
                                        @endif 
                                    </p>
                                </div><!--End center-height-->
                            </div><!--End Row-->
                        </div><!--End container-->
                    </div><!--End Welcome-Home-->
                </section><!--End Home Section-->
                
                <section class="section consult">
                    <div class="container">
                        <div class="steps-box">
                            <div id="form_wizard_1">
                                <form class="" action="{{route('site.consultation')}}"  enctype="multipart/form-data" method="post" onsubmit="return false;" id="submit_form" >
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li class="active">
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            @if (Config::get('app.locale') == 'en')
                                                                Consultation Type
                                                            @else
                                                                نوع الاستشارة
                                                            @endif
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step" aria-expanded="true">
                                                            @if (Config::get('app.locale') == 'en')
                                                                Consultant
                                                            @else
                                                                المستشار
                                                            @endif
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step">
                                                            @if (Config::get('app.locale') == 'en')
                                                                Date and Time
                                                            @else
                                                                التاريخ والوقت
                                                            @endif
                                                            
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            @if (Config::get('app.locale') == 'en')
                                                                Guest Info
                                                            @else
                                                                البيانات
                                                            @endif
                                                            
                                                        </a>
                                                    </li>
                                                </ul><!--End Nav-->    
                                            </div><!--End col-lg-4-->
                                            <div class="col-sm-9">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab1">
                                                            <div class="inner-tap">
                                                                <div class="Inner-Tap-body">
                                                                    <div class="form-group">
                                                                        <div class="radio-check-item">
                                                                            <input type="radio" class="form-control" id="item-1" name="consult_name" checked value="الاستشارات المالية" data-msg-required="please select consultation"" aria-required="true" aria-invalid="true">
                                                                            <label for="item-1">
                                                                                الاستشارات المالية:
                                                                                <p>
                                                                                     مستشارينا الماليين سيرشدون رائد الأعمال إلى الحل الأمثل لإدارة الموارد و التحديات المالية لمشروعه. 
                                                                                </p>
                                                                            </label>
                                                                        </div>
                                                                    </div><!-- End Form-Group -->
                                                                    <div class="form-group">
                                                                        <div class="radio-check-item">
                                                                            <input type="radio" class="form-control" id="item-2" name="consult_name" value="الاستشارات الإدارية" data-msg-required="please select consultation"" aria-required="true" aria-invalid="true">
                                                                            <label for="item-2">
                                                                                الاستشارات الإدارية:
                                                                                <p>
                                                                                     يتواجد مستشارون مختصون لمساعدة رائد الأعمال لمواجهة ما قد يصادفه من مشاكل في إدارة مشروعه من هيكلة واستراتيجيات وخطط عمل. 
                                                                                </p>
                                                                            </label>
                                                                        </div>
                                                                    </div><!-- End Form-Group -->
                                                                    <div class="form-group">
                                                                        <div class="radio-check-item">
                                                                            <input type="radio" class="form-control" id="item-3" name="consult_name" value="استشارات حاضنات ومسرعات أعمال" data-msg-required="please select consultation"" aria-required="true" aria-invalid="true">
                                                                            <label for="item-3">
                                                                                استشارات حاضنات ومسرعات أعمال:
                                                                                <p>
                                                                                    يوفّر فريق أوشن إكس المساعدة للراغبين في إنشاء حاضنات ومسرعات الأعمال بطرق متعددة
                                                                                </p>
                                                                            </label>
                                                                        </div>
                                                                    </div><!-- End Form-Group -->
                                                                </div><!-- End Inner-Tap-Body -->
                                                            </div><!-- End Inner-Tab -->
                                                    </div><!--End Tab-pane-->
                                                    <div class="tab-pane" id="tab2">
                                                        <div class="inner-tap">
                                                            <div class="inner-tap-body team-wrap">
                                                                <div class="row">
                                                                    @foreach($consultants as $con)
                                                                    <div class="form-group col-lg-4 col-xs-6">
                                                                        <div class="radio-check-item style-2">
                                                                            <input type="radio" class="form-control" id="item-1" name="consultant_id" value="{{$con->consultant_id}}" aria-required="true" aria-invalid="true">
                                                                            <label for="item-1">
                                                                                    </label>
                                                                            <div class="team-box">
                                                                                <div class="team-box-img">
                                                                                    <img src="{{asset('storage/uploads/consultants').'/'.$con->image}}" alt="...">
                                                                                </div><!-- End Team-Box-Img -->
                                                                                <div class="team-box-content">
                                                                                    <h3 class="title title-sm">
                                                                                        @if (Config::get('app.locale') == 'en')
                                                                                            {{$con->consultant_name_en}}
                                                                                        @else
                                                                                            {{$con->consultant_name_ar}}
                                                                                        @endif
                                                                                    </h3>
                                                                                    <p>
                                                                                        @if (Config::get('app.locale') == 'en')
                                                                                            {{$con->consultant_details_en}}
                                                                                        @else
                                                                                            {{$con->consultant_details_ar}}
                                                                                        @endif
                                                                                    </p>
                                                                                </div><!-- End Team-Box-Content -->
                                                                            </div><!-- End Team-Widget -->
                                                                        </div>
                                                                    </div><!-- End col -->
                                                                    @endforeach
                                                                </div><!-- End row -->    
                                                            </div><!-- End Inner-Tap-Body -->
                                                        </div><!-- End Inner-Tab -->
                                                    </div><!--End Tab-pane-->
                                                    <div class="tab-pane" id="tab3">
                                                        <div class="inner-tap">
                                                            <div class="inner-tap-body date-consult">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="time">
                                                                                @if (Config::get('app.locale') == 'en') Time : @else الوقت : @endif
                                                                            </label>
                                                                            <input type="time" class="form-control" name="time" data-msg-required="من فضلك ادخل الوقت" aria-required="true" aria-invalid="true" id="time">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </div><!-- End Form-Group -->
                                                                    </div><!--End col-md-8-->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="date">
                                                                                @if (Config::get('app.locale') == 'en') Date : @else التاريخ : @endif</label>
                                                                            <input type="date" class="form-control" name="date" data-msg-required="من فضلك ادخل التاريخ" aria-required="true" aria-invalid="true" id="date">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div><!-- End Form-Group -->
                                                                    </div><!--End col-md-8-->
                                                                </div><!--End row-->
                                                            </div><!-- End Inner-Tab-Body -->
                                                        </div><!-- End Inner-Tab -->
                                                    </div><!--End Tab-pane-->
                                                    <div class="tab-pane" id="tab4">
                                                        <div class="inner-tap">
                                                            <div class="inner-tap-body date-consult">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="name">
                                                                                @if (Config::get('app.locale') == 'en') Full Name : @else الاسم بالكامل : @endif
                                                                            </label>
                                                                            <input name="name" type="text" class="form-control" data-msg-required="من فضلك ادخل اسمك" id="name" aria-required="true" aria-invalid="true">
                                                                            
                                                                        </div><!-- End Form-Group -->
                                                                    </div><!--End col-md-4-->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="phone">
                                                                                @if (Config::get('app.locale') == 'en') Email Phone : @else الهاتف : @endif
                                                                            </label>
                                                                            <input name="phone" type="tel" class="form-control" data-msg-required="من فضلك ادخل رقم الهاتف" id="phone" aria-required="true" aria-invalid="true">
                                                                            
                                                                        </div><!-- End Form-Group -->
                                                                    </div><!--End col-md-4-->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="email">
                                                                                @if (Config::get('app.locale') == 'en') Email Address : @else البريد الإلكترونى : @endif
                                                                            </label>
                                                                            <input name="email" type="email" class="form-control" data-msg-required="من فضلك ادخل بريدك الاكترونى" id="email" aria-required="true" aria-invalid="true">
                                                                        </div><!-- End Form-Group -->
                                                                    </div><!--End col-md-4-->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="message">
                                                                                @if (Config::get('app.locale') == 'en') Message : @else الرسالة : @endif
                                                                            </label>
                                                                            <textarea class="form-control" rows="8" name="message" data-msg-required="من فضلك ادخل رسالتك" id="message" aria-required="true" aria-invalid="true"></textarea>
                                                                        </div><!-- End Form-Group -->
                                                                    </div><!--End col-md-12-->
                                                                </div><!--End row-->
                                                            </div><!-- End Inner-Tab-Body -->
                                                        </div><!-- End Inner-Tab -->
                                                    </div><!--End Tab-pane-->
                                                </div><!--End Tap-content-->
                                                <div class="form-action">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="inner-tap">
                                                                <button type="button" class="step-btn button-previous">@if (Config::get('app.locale') == 'en') Previous @else السابق @endif</button>
                                                                <button type="button" class="step-btn button-next">  @if (Config::get('app.locale') == 'en') Next @else التالى @endif
                                                                </button>  
                                                                <button type="submit" class="step-btn button-submit addBTN">
                                                                    @if (Config::get('app.locale') == 'en') Save Message @else حفظ @endif
                                                                    <i class="fa fa-check"></i>
                                                                </button> 
                                                            </div><!--End inner-tap-->    
                                                        </div>
                                                    </div><!--End Row-->
                                                </div><!--End Form-action-->
                                            </div><!--End col-lg-8-->
                                        </div><!--End row-->
                                    </div><!--End Form-body-->
                                </form><!--End Form-->
                            </div><!--End Div Of Form-wizard-->
                        </div><!--End Steps-box-->
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
        <script src="{{asset('assets/site/js/process.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/form-wizard.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/process.js')}}" type="text/javascript"></script> 
    </body>
</html>