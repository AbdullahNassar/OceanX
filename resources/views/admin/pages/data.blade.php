@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Static Data</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Static Data 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    @foreach($statics as $static)
                                    <form action="{{route('admin.data.update')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12" style="margin-top: 40px;">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="static" id="storage" >
                                                        <input type="hidden" name="image" value="{{$static->image}}" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <img src="{{asset('storage/uploads/static').'/'.$static->image}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="btn blue btn-sm btn-outline sbold uppercase" type="button" id="upload-btn">
                                                            Upload Logo
                                                        </button>
                                                        <div class="progress">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                            </div>
                                                        </div>
                                                        <h3 id="status"></h3>
                                                        <p id="loaded_n_total"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div><!-- End col -->
                                            <div class="col-md-6" style="margin-bottom: 20px; margin-top: 40px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Site Name in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="site_name_ar" class="form-control" value="{{$static->site_name_ar}}" placeholder="Site Name in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px; margin-top: 40px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Site Name in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="site_name_en" class="form-control" value="{{$static->site_name_en}}" placeholder="Site Name in English..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Slider Header in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="slider_ar" class="form-control" value="{{$static->slider_ar}}" placeholder="Slider Header in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Slider Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="slider_en" class="form-control" value="{{$static->slider_en}}" placeholder="Slider Header in English..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home About Header in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="about_ar" class="form-control" value="{{$static->about_ar}}" placeholder="About Header in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home About Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="about_en" class="form-control" value="{{$static->about_en}}" placeholder="About Header in English..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">About Page Header in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="about_head_ar" class="form-control" placeholder="About Page Header in Arabic...">{{ $static->about_head_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">About Page Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="about_head_en" class="form-control" placeholder="About Page Header in English...">{{ $static->about_head_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">About Page Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="about_content_ar" class="form-control" placeholder="About Page Content in Arabic...">{{ $static->about_content_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">About Page Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="about_content_en" class="form-control" placeholder="About Page Content in English...">{{ $static->about_content_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Vision in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="vision_ar" class="form-control" placeholder="Our Vision in Arabic...">{{ $static->vision_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Vision in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="vision_en" class="form-control" placeholder="Our Vision in English...">{{ $static->vision_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">What We Offer in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="offers_ar" class="form-control" placeholder="What We Offer in Arabic...">{{ $static->offers_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">What We Offer in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="offers_en" class="form-control" placeholder="What We Offer in English...">{{ $static->offers_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Initiatives Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="initiatives_ar" class="form-control" placeholder="Initiatives Content in Arabic...">{{ $static->initiatives_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Initiatives Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="initiatives_en" class="form-control" placeholder="Initiatives Content in English...">{{ $static->initiatives_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Initiatives Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="initiatives_content_ar" class="form-control" placeholder="Initiatives Content in Arabic...">{{ $static->initiatives_content_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Initiatives Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="initiatives_content_en" class="form-control" placeholder="Initiatives Content in English...">{{ $static->initiatives_content_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Consulting Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="consulting_ar" class="form-control" placeholder="Consulting Content in Arabic...">{{ $static->consulting_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Consulting Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="consulting_en" class="form-control" placeholder="Consulting Header in English...">{{ $static->consulting_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Consulting Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="consulting_content_ar" class="form-control" placeholder="Consulting Content in Arabic...">{{ $static->consulting_content_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Consulting Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="consulting_content_en" class="form-control" placeholder="Consulting Content in English...">{{ $static->consulting_content_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Services Static Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="services_ar" class="form-control" placeholder="Services Static Content in Arabic...">{{ $static->services_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Home Services Static Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="services_en" class="form-control" placeholder="Services Static Content in English...">{{ $static->services_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Services Header in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="services_head_ar" class="form-control" placeholder="Services Header in Arabic...">{{ $static->services_head_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Services Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="services_head_en" class="form-control" placeholder="Services Header in English...">{{ $static->services_head_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Services Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="services_content_ar" class="form-control" placeholder="Services Content in Arabic...">{{ $static->services_content_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Services Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="services_content_en" class="form-control" placeholder="Services Content in English...">{{ $static->services_content_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Contact Us Header in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="contact_head_ar" class="form-control" placeholder="Contact Us Header in Arabic...">{{ $static->contact_head_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Contact Us Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="contact_head_en" class="form-control" placeholder="Contact Us Header in English...">{{ $static->contact_head_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Contact Us Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="contact_content_ar" class="form-control" placeholder="Contact Us Content in Arabic...">{{ $static->contact_content_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Contact Us Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" name="contact_content_en" class="form-control" placeholder="Contact Us Content in English...">{{ $static->contact_content_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-7">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.home')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection