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
                                <span>Services</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Service 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    @foreach($services as $service)
                                    <form action="{{ route('admin.service.edit' , ['id' => $service->id]) }}" class="form-horizontal" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" name="s_id" value="{{ $service->id }}">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="services" id="storage" >
                                                        <input type="hidden" name="image" value="{{$service->image}}" id="img" >
                                                        <input type="file" name="image" id="image" required>
                                                        <img src="{{asset('storage/uploads/services').'/'.$service->image}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="btn blue btn-sm btn-outline sbold uppercase" type="button" id="upload-btn">
                                                            Upload Image
                                                        </button>
                                                        <div class="progress">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                            </div>
                                                        </div>
                                                        <h3 id="status"></h3>
                                                        <p id="loaded_n_total"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activation :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="active">
                                                                <option value="{{$service->active}}">@if($service->active == 1)
                                                                                Active
                                                                @elseif($service->active == 0)
                                                                                Not Active
                                                                @endif </option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Category :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <select class="form-control" name="category_id">
                                                                <option value="{{$service->category_id}}">{{$service->name_en}}</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->category_id}}">{{$category->name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Header in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" name="head_ar" class="form-control" placeholder="Service Header in Arabic...">{{$service->head_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Header in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" name="head_en" class="form-control" placeholder="Service Header in English...">{{$service->head_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Content in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="content_ar" class="form-control" placeholder="Service Content in Arabic...">{{$service->content_ar}}</textarea> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Content in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="content_en" class="form-control" placeholder="Service Content in English...">{{$service->content_en}}</textarea> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Steps in Arabic :</label>
                                                <div class="col-md-8">
                                                    @php
                                                    $steps_ar = json_decode($service->steps_ar);
                                                    $count1 = 1;
                                                    @endphp
                                                    @foreach((array)$steps_ar as $s_ar)
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <input name="s_ar{{$count1}}" value="{{$s_ar}}" class="form-control " placeholder="Step {{$count1}} in Arabic...">
                                                    </div><br>
                                                    @php $count1 = $count1+1; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Service Steps in English :</label>
                                                <div class="col-md-8">
                                                    @php
                                                    $steps_en = json_decode($service->steps_en);
                                                    $count2 = 1;
                                                    @endphp
                                                    @foreach((array)$steps_en as $s_en)
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <input name="s_en{{$count2}}" value="{{$s_en}}" class="form-control " placeholder="Step {{$count2}} in English...">
                                                    </div><br>
                                                    @php $count2 = $count2+1; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.services')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
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