@extends('backend.dashboard')

@section('content')
<div class="content-page">
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

            {!! Form::open(array('url' => 'superadmin/update_ads', 'method' => 'post','class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}
            <input type="hidden" name="id" value="{{$edit - > id}}">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Field Required</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" form">
                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-sm-2">Type *</label>
                                    <div class="col-sm-3">
                                        <select name="type" id="type" class="form-control" ng-model="type" required>
                                            @if($edit->type=='Image')
                                            <option value="Image">Image</option>
                                            <option value="Code">Code</option>
                                            @else
                                            <option value="Code">Code</option>
                                            <option value="Image">Image</option>
                                            @endif
                                        </select>
                                    </div>

                                    <label for="newsletter" class="control-label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" id="status" class="form-control">
                                            @if($edit->status==1)
                                            <option value="1">Publish</option>
                                            <option value="0">Unpublish</option>
                                            @else
                                            <option value="0">Unpublish</option>
                                            <option value="1">Publish</option>
                                            @endif
                                        </select>
                                    </div>


                                </div>

                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-sm-2">Positioning *</label>
                                    <div class="col-sm-3">
                                        <select name="positioning" id="positioning" class="form-control" ng-model="positioning" required>
                                            <option value="{{$edit - > positioning}}">{{$edit - > positioning}} position  [ Selected ]</option>
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
                                            <option value="1000"  <?php
                                            if ($edit->categorie_id == 1000) {
                                                echo 'selected="selected"';
                                            }
                                            ?> >হোম পেজ </option>
                                            <?php $categories = DB:: table('boi_menu')->select('*')->get(); ?>
                                            @foreach($categories as $row)
                                            <option value="{{$row - > menuid}}" <?php
                                            if ($edit->categorie_id == $row->menuid) {
                                                echo 'selected="selected"';
                                            }
                                            ?> > {{$row - > menutitle}}</option> 
                                            @endforeach
                                        </select>
                                    </div>



                                </div>
                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Title *</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="title" name="title" type="text" value="{{$edit - > title}}" required>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Url *</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="title" name="url" type="text" value="{{$edit - > url}}" required>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Code </label>
                                    <div class="col-lg-10">
                                        <textarea  class="form-control" id="code" name="code" style="height:200px;">{{$edit - > code}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="lastname" class="control-label col-lg-2">Image</label>
                                    <div class="col-lg-10">
                                        <div class="fileUpload btn btn-purple waves-effect waves-light"> <span> <i class="ion-upload m-r-5"></i> Upload </span>
                                            <input class="upload" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                </div>
                                @if($edit->image!='')
                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-lg-2 col-sm-3"></label>
                                    <div class="col-lg-10 col-sm-9">
                                        <img src="{{ URL::asset('uploads/ads/'.$edit->image) }}" width="auto" height="auto">
                                    </div>
                                </div>
                                @endif



                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success waves-effect waves-light col-sm-3" type="submit">Update</button>
                                        <button class="btn btn-default waves-effect col-sm-3" type="button" onclick="goBack()">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <!-- .form --> 

                            <!--  {!! Form::close() !!} --> 

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