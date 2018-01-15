@extends('backend.dashboard')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update Vote</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{Url('superadmin/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{Url('superadmin/vote')}}">Vote Manage</a></li>
                        <li class="active">Update Vote</li>
                    </ol>
                </div>
            </div>

            <!-- Form-validation -->


            {!! Form::open(array('url' => 'superadmin/update_vote', 'method' => 'post','class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}

            <input type="hidden" name="id" value="{{$edit->id}}">

            <div class="row">

                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Field Required</h3></div>
                        <div class="panel-body">
                            <div class=" form">

                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-2">Title *</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="title" name="title" type="text" value="{{$edit->title}}" required>
                                    </div>
                                </div>






                                <div class="form-group ">
                                    <label for="newsletter" class="control-label col-lg-2 col-sm-3">Status</label>
                                    <div class="col-lg-10 col-sm-9">
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


                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                        <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                                    </div>
                                </div>

                            </div> <!-- .form -->

                            {!! Form::close() !!}

                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->

            </div> <!-- End row -->



        </div> <!-- container -->
        @stop()

