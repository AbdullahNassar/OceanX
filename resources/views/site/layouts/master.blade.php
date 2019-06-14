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


        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @if (Config::get('app.locale') == 'en')
            <link rel="stylesheet" href="{{asset('assets/site/css/style-en.css')}}">
        @endif

        <link href="{{asset('assets/admin/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/Basic/custom.css')}}" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            @include('site.layouts.header')
            
            @yield('content')

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
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOC5i-INlIfcU00BvVyAodJaZslaTf_ak"></script>
        <script src="{{asset('assets/site/js/google.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/vendor/count-to/jquery.countTo.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/form-wizard.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/process.js')}}" type="text/javascript"></script>
    </body>
</html>