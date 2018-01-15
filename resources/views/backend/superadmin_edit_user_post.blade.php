@extends('backend.dashboard')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update User</h4>
                </div>
            </div>

            {!! Form::open(array('url' => 'superadmin/superadmin_update_user', 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}
            <input type="hidden" name="id" value="{{$edit - > id}}" />
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default" id="replace">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form">

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="name" name="name" type="text" ng-model="name" required value="{{$edit - > name}}" placeholder="Enter name">


                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="designation" name="designation" type="text" ng-model="designation" required value="Superadmin" placeholder="Enter designation">


                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="email" name="email" type="text" ng-model="email" required value="{{$edit - > email}}" placeholder="Enter email ">


                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors - > first('email')}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors - > has('password') ? ' has-error' : ''}}">

                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control" ng-model="password" name="password" value="" placeholder="Password">

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
                                                    <button class="btn btn-primary waves-effect waves-light">Publish</button>

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