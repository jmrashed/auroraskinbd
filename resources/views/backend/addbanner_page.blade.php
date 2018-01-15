@extends('backend.dashboard')

@section('content')

<div class="content-page" ng-app = "mainApp" ng-controller = "studentController">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Gallery</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{Url('superadmin/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{Url('superadmin/gallery')}}">Gallery Manage</a></li>
                        <li class="active">Add Gallery</li>
                    </ol>
                </div>
            </div>

            <!-- Form-validation -->

            {!! Form::open(array('url' => 'superadmin/submit_gallery', 'method' => 'post','name' => 'studentForm', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}


            <div class="row">

                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Field Required</h3></div>
                        <div class="panel-body">
                            <div class=" form">

                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-lg-2 col-sm-3">Gallery Album *</label>
                                    <div class="col-lg-10 col-sm-9">
                                        <select name="type" id="type" class="form-control" ng-model="type" required>
                                            <option value="">Please Select</option>
                                            @foreach($galleryalbum as $galleryalbumactive)
                                            <option value="{{$galleryalbumactive - > id}}">{{$galleryalbumactive - > atitle}}</option>
                                            @endforeach
                                        </select>
                                        <span style = "color:red" ng-show = "studentForm.type.$dirty && studentForm.type.$invalid">
                                            <span ng-show = "studentForm.type.$error.required">Gallery Album is required.</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Title *</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="title" name="title" type="text" ng-model="title" required>
                                        <span style = "color:red" ng-show = "studentForm.title.$dirty && studentForm.title.$invalid">
                                            <span ng-show = "studentForm.title.$error.required">Title is required.</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="lastname" class="control-label col-lg-2">Image  *</label>
                                    <div class="col-lg-10">
                                        <div class="fileUpload btn btn-purple waves-effect waves-light">
                                            <span>
                                                <i class="ion-upload m-r-5"></i>
                                                Upload
                                            </span>
                                            <input class="upload" type="file" name="image" id="image" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-lg-2 col-sm-3">Status</label>
                                    <div class="col-lg-10 col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Publish</option>
                                            <option value="0">Unpublish</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success waves-effect waves-light" type="submit" disabled="disabled" ng-disabled = "studentForm.title.$invalid || studentForm.type.$invalid">Save</button>
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
