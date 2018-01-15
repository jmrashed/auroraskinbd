@extends('backend.dashboard')

@section('content')
<div class="content-page" ng-app = "mainApp" ng-controller = "studentController">
    <!-- Start content -->
    <div class="content">
        <div class="container"> 

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Ads</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{Url('superadmin/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{Url('superadmin/ads')}}">Ads Manage</a></li>
                        <li class="active">Add Ads</li>
                    </ol>
                </div>
            </div>

            <!-- Form-validation --> 

            {!! Form::open(array('url' => 'superadmin/submit_ads', 'method' => 'post','name' => 'studentForm', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Field Required</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-8">
                                <div class=" form">
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-sm-2">Type  <span style="color: red">*</span></label>
                                        <div class="col-sm-3">
                                            <select name="type" id="type" class="form-control" ng-model="type" required>
                                                <option value="">Please Select</option>
                                                <option value="Image">Image</option>
                                                <option value="Code">Code</option>
                                            </select>
                                        </div>
                                        <label for="newsletter" class="control-label col-sm-3">Status</label>
                                        <div class="col-sm-4">
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-sm-2">Positioning <span style="color: red">*</span></label>
                                        <div class="col-sm-3">
                                            <select name="positioning" id="positioning" class="form-control" ng-model="positioning" required>
                                                <option value="">Please Select</option>
                                                <option value="1">01 (1160px X 90px)</option>
                                                <option value="2">02 (850px X 90px)</option>
                                                <option value="3">03 (850px X 90px)</option>
                                                <option value="4">04 (850px X 90px)</option>
                                                <option value="5">05 (850px X 90px)</option>
                                                <option value="6">06 (1160px X 90px)</option>
                                                <option value="7">07 (265px X 100px)</option>
                                                <option value="8">08 (265px X 100px)</option>
                                                <option value="9">09 (265px X 100px)</option> 
                                                <option value="10">10 (265px X 100px)</option>
                                                <option value="11">11 (265px X 100px)</option>
                                                <option value="12">12 (265px X 100px)</option>
                                                <option value="12">12 (265px X 100px)</option>
                                                <option value="14">14 (265px X 100px)</option>
                                                <option value="15">15 (265px X 100px)</option>
                                                <option value="16">16 (265px X 100px)</option> 


                                            </select>
                                        </div>

                                        <label for="newsletter" class="control-label col-sm-3">Select Category  <span style="color: red">*</span></label>
                                        <div class="col-sm-4">
                                            <select name="categorie_id"  class="form-control"  required>
                                                <option value=""> Select Category  </option>
                                                <option value="1000">হোম পেজ </option>

                                                @foreach($categories as $row)
                                                <option value="{{$row - > menuid}}"> {{$row - > menutitle}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Title  <span style="color: red">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="title" name="title" type="text" ng-model="title" required>
                                            <span style = "color:red" ng-show = "studentForm.title.$dirty && studentForm.title.$invalid"> <span ng-show = "studentForm.title.$error.required">Title is required.</span> </span> </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2"> Site Url  <span style="color: red">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="url" name="url" type="url" ng-model="url" required>
                                            <span style = "color:red" ng-show = "studentForm.url.$dirty && studentForm.url.$invalid"> <span ng-show = "studentForm.url.$error.required">Url is required.</span> </span> </div>
                                    </div>


                                    <!--<div class="form-group ">
                                      <label for="firstname" class="control-label col-lg-2">Code </label>
                                      <div class="col-lg-10">
                                        <textarea  class="form-control" id="article-ckeditor" name="code" style="height:200px;"></textarea>
                                      </div>
                                    </div>-->
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <div class="fileUpload btn btn-purple waves-effect waves-light"> <span> <i class="ion-upload m-r-5"></i> Upload </span>
                                                <input class="upload" type="file" name="image" id="image"> 
                                            </div>
                                            <!-- <a class="btn btn-success"> <i class="fa fa-camera" aria-hidden="true"></i> Choose Image</a> -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-success waves-effect waves-light" type="submit" disabled="disabled" ng-disabled = "studentForm.title.$invalid || studentForm.type.$invalid || studentForm.positioning.$invalid">Save</button>
                                            <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- .form --> 

                            <!--  {!! Form::close() !!} --> 

                            <div class="col-md-4"> 
                                <div  style=" border: 1px solid #dcdcdc; padding: 15px; background: #eee; color: red;">
                                    <strong>Note : </strong><br />
                                    Positioning 01, 06: <br />
                                    Dimensions : (1160px X 90px) <br /><br />

                                    Positioning 02, 03, 04, 05:<br />
                                    Dimensions : (850px X 90px) <br /><br />

                                    Positioning 08 to 16:<br />
                                    Dimensions : (265px X 100px) <br /><br />

                                    Positioning 07:<br />
                                    Dimensions : (300px X 100px) <br /><br />

                                </div>
                            </div>

                        </div>
                        <!-- panel-body --> 
                    </div>
                    <!-- panel --> 
                </div>
                <!-- col --> 

            </div>
            <!-- End row --> 

        </div>
        <!-- container --> 
        @stop() 