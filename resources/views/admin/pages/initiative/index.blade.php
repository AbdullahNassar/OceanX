@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Initiatives</span>
                            </li>
                        </ul>
                        <div class="col-md-2" style="float: right; margin-top: 5px;">
                        <div class="btn-group">
                            <a href="{{route('admin.initiative.add')}}" class="btn green btn-sm btn-outline sbold uppercase">
                                Add New Initiative
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!-- End col -->
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>initiatives Table
                                    </div>
                                    <div class="tools">
                                       <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Header</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($initiatives as $initiative)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$loop->index + 1}} 
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('storage/uploads/initiatives').'/'.$initiative->image}}" style="max-width: 300px;">
                                                    </td>
                                                    <td>
                                                        {{$initiative->initiative_name_en}} 
                                                    </td>
                                                    <td style="max-width: 300px;">
                                                        {{$initiative->initiative_content_en}} 
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.initiative.edit' , ['id' => $initiative->id]) }}" class="btn green"><i class="fa fa-edit"></i> Edit   </a>     
                                                        <button class="btn btn-danger btndelet" data-url="{{ route('admin.initiative.delete' , ['id' => $initiative->id]) }}" >
                                                        <i class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--End table-scrollable-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection