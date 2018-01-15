@extends('backend.dashboard')

@section('content')

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


    <div class="row" ng-app = "mainApp" ng-controller = "studentController">
        {!! Form::open(array('url' => 'admin/update_headline', 'method' => 'post','name' => 'studentForm','class' => 'cmxform form-horizontal tasi-form','novalidate','files' => true)) !!}

        <input type="hidden" name="id" value="{{$edit - > id}}">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Field Required</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        {{--
                                        < div class = "form-group" >
                                        < label for = "firstname" class = "control-label col-lg-2" > Position * < /label>
                                        < div class = "col-lg-10" >
                                        < select name = "titleposid" class = "form-control" id = "exampleSelect1" >
                                        < option > Select Title Position < /option>
                                        < option value = "1" > Position One < /option>
                                        < option value = "2" > Position Two < /option>
                                        < option value = "3" > Position Three < /option>
                                        < option value = "4" > Position Four < /option>
                                        < option value = "5" > Position Five < /option>
                                        < option value = "6" > Position Six < /option>
                                        < option value = "7" > Position Seven < /option>
                                        < option value = "8" > Position Eight < /option>
                                        < option value = "9" > Position Nine < /option>
                                        < option value = "10" > Position Ten < /option>
                                        < option value = "11" > Position Eleven < /option>
                                        < option value = "12" > Position Tweleve < /option>
                                        < option value = "13" > Position Thirteen < /option>
                                        < option value = "14" > Position Fourteen < /option>
                                        < option value = "15" > Position Fifteen < /option>
                                        < option value = "16" > Position Sixteen < /option>
                                        < option value = "17" > Position Seventeen < /option>
                                        < option value = "18" > Position Eighteen < /option>
                                        < option value = "19" > Position Nineteen < /option>
                                        < option value = "20" > Position Twenty < /option>
                                        < /div>
                                        < /div>
                                        --}}
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">Title *</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="firstname" name="title" type="text"  ng-minlength="4" placeholder="Enter Your News Headline" value="{{$edit - > title}}" required>

                                <span style = "color:red" ng-show = "studentForm.firstname.$dirty && studentForm.firstname.$invalid">
                                    <span ng-show = "studentForm.firstname.$error.required">Title is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button disabled="" class="btn btn-success waves-effect waves-light" ng-disabled = "studentForm.firstname.$invalid || studentForm.menutype.$invalid">Save</button>
                                <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                            </div>
                        </div>
                    </div> <!-- .form -->

                    <!--  {!! Form::close() !!} -->

                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
        {!! Form::close() !!}
    </div> <!-- End row -->
</div> <!-- container -->
@stop()

