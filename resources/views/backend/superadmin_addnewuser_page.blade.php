@extends('backend.dashboard')

@section('content')
<style type="text/css">
    /* layout.css Style */
    .upload-drop-zone {
        height: 200px;
        border-width: 2px;
        margin-bottom: 20px;
    }

    /* skin.css Style*/
    .upload-drop-zone {
        color: #ccc;
        border-style: dashed;
        border-color: #ccc;
        line-height: 200px;
        text-align: center
    }
    .upload-drop-zone.drop {
        color: #222;
        border-color: #222;
    }

</style>
<script>
    + function($) {
    'use strict';
    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');
    var startUpload = function(files) {
    console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
    var uploadFiles = document.getElementById('js-upload-files').files;
    e.preventDefault()

            startUpload(uploadFiles)
    })

            dropZone.ondrop = function(e) {
            e.preventDefault();
            this.className = 'upload-drop-zone';
            startUpload(e.dataTransfer.files)
            }

    dropZone.ondragover = function() {
    this.className = 'upload-drop-zone drop';
    return false;
    }

    dropZone.ondragleave = function() {
    this.className = 'upload-drop-zone';
    return false;
    }

    }(jQuery);</script>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container" ng-app = "mainApp" ng-controller = "studentController">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add New User</h4>
                </div>
            </div>

            {!! Form::open(array('url' => 'superadmin/superadmin_submit_user', 'method' => 'post','name' => 'studentForm', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default" id="replace">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form">

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="name" name="name" type="text" ng-model="name" required placeholder="Enter name">

                                                <span style = "color:red" ng-show = "studentForm.name.$dirty && studentForm.name.$invalid">
                                                    <span ng-show = "studentForm.name.$error.required">Name is required.</span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="designation" name="designation" type="text" placeholder="Superadmin" disabled="disabled">
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="email" name="email" type="text" ng-model="email" value="{{ old('email')}}" required placeholder="Enter email ">

                                                <span style = "color:red" ng-show = "studentForm.email.$dirty && studentForm.email.$invalid">
                                                    <span ng-show = "studentForm.email.$error.required">Email is required.</span>
                                                </span>
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors - > first('email')}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors - > has('password') ? ' has-error' : ''}}">

                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control" ng-model="password" name="password" required placeholder="Password">
                                                <span style = "color:red" ng-show = "studentForm.password.$dirty && studentForm.password.$invalid">
                                                    <span ng-show = "studentForm.password.$error.required">Password is required.</span>
                                                </span>
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors - > first('password')}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="panel panel-default" id="replace">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Publish</h3>
                                                </div>


                                                <div class="panel-heading">
                                                    <button type="button" class="btn btn-default waves-effect waves-light" onclick="goBack()">Back</button>
                                                    <button class="btn btn-primary waves-effect waves-light" disabled="disabled" ng-disabled = "studentForm.name.$invalid || studentForm.email.$invalid || studentForm.password.$invalid || studentForm.type.$invalid">Publish</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>    
                    </div>
                </div>

            </div>

            {!! Form::close() !!}

        </div> <!-- container -->
    </div> <!-- content -->

    @include('backend/footer')

</div>
@stop()