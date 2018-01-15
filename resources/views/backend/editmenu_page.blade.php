@extends('backend.dashboard')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Menu</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{Url('dashboard')}}">Dashboard</a></li>
                        <li><a href="{{Url('banner')}}">Menu</a></li>
                        <li class="active">Add Menu</li>
                    </ol>
                </div>
            </div>

            <!-- Form-validation -->




            <div class="row" ng-app = "mainApp" ng-controller = "studentController">
                {!! Form::open(array('url' => 'menuupdate', 'method' => 'post','name' => 'studentForm','novalidate','class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}

                <input type="hidden" name="id" value="{{$result - > id}}">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Field Required</h3></div>
                        <div class="panel-body">
                            <div class=" form">


                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Menu Type *</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" ng-model="menutype" name="menutype" required>

                                            <option value="{{$result - > menutype}}">{{ $result - > menuname}}</option>
                                            <option value="">Please Select</option>
                                            @foreach($data as $menutype)
                                            <option value="{{$menutype - > menuid}}">{{$menutype - > menuname}}</option>
                                            @endforeach
                                        </select>

                                        <span style = "color:red" ng-show = "studentForm.menutype.$dirty && studentForm.menutype.$invalid">
                                            <span ng-show = "studentForm.menutype.$error.required">Menu Type is required.</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Title *</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="firstname" name="firstname" type="text" ng-model="firstname" ng-minlength="4" value="{{$result - > name}}" required>

                                        <span style = "color:red" ng-show = "studentForm.firstname.$dirty && studentForm.firstname.$invalid">
                                            <span ng-show = "studentForm.firstname.$error.required">Title is required.</span>
                                        </span>

                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-lg-2 col-sm-3">Status</label>
                                    <div class="col-lg-10 col-sm-9">
                                        <input type="checkbox" style="width: 16px" class="checkbox form-control" id="status" name="status" value="1" @if($result->status==1) checked @endif>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button disabled="" class="btn btn-success waves-effect waves-light" ng-disabled = "studentForm.firstname.$invalid || studentForm.menutype.$invalid">Save</button>
                                        <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                                    </div>
                                </div>

                            </div> <!-- .form -->



                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->
                {!! Form::close() !!}
            </div> <!-- End row -->



        </div> <!-- container -->
        @stop()

