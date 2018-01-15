@extends('backend.dashboard')

@section('content')

<div class="content-page" ng-app = "mainApp" ng-controller = "studentController">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Gallery Album</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{Url(Request::segment(1).'/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{Url(Request::segment(1).'/galleryalbum')}}">Gallery Album Manage</a></li>
                        <li class="active">Add Gallery Album</li>
                    </ol>
                </div>
            </div>

            <!-- Form-validation -->

            {!! Form::open(array('url' => 'admin/submit_galleryalbum', 'method' => 'post','name' => 'studentForm', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}


            <div class="row">

                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Field Required</h3></div>
                        <div class="panel-body">
                            <div class=" form">

                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Title *</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="atitle" name="atitle" type="text" ng-model="title" required>
                                        <span style = "color:red" ng-show = "studentForm.atitle.$dirty && studentForm.atitle.$invalid">
                                            <span ng-show = "studentForm.atitle.$error.required">Title is required.</span>
                                        </span>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success waves-effect waves-light" type="submit" disabled="disabled" ng-disabled = "studentForm.atitle.$invalid">Save</button>
                                        <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                                    </div>
                                </div>

                            </div> <!-- .form -->

                            <!--  {!! Form::close() !!} -->

                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->

            </div> <!-- End row -->



        </div> <!-- container -->
        @stop()

