@extends('backend.dashboard')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="pull-left page-title">User</h4> &nbsp;&nbsp;
                    <a href="{{ url('superadmin/superadmin_useradd') }}"><button class="btn btn-default waves-effect" type="button" style="margin-top:5px;">Add New</button></a>
                </div>


                <div class="col-sm-8">
                    @if(Session::has('success'))
                    <div class="alert alert-success" style="text-align: center">  {!!Session::get('success')!!}</div>
                    @endif

                    {{-- error message --}}

                    @if ($errors->has('menutitle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('menutitle') }}</strong>
                    </span>
                    @endif

                    @if ($errors->has('menuslug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('menuslug') }}</strong>
                    </span>
                    @endif
                </div>



            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                            <h3 class="panel-title">All Menu Data</h3>
                        </div>-->
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Email</th>

                                                <th>Status</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $activedata) {
                                                ?>

                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial{{$i}}" value="{{$activedata->id}}"></td>
                                                    <td>{{$activedata->name}}
                                                        <div class="row-actions">
                                                            <span class="edit"><a href="{{URL('superadmin/superadmin_user_edit/'.$activedata->id)}}">Edit</a> | </span>

                                                            <span class="trash">
                                                                <a href="{{URL('superadmin/superadmin_user_delete/'.$activedata->id)}}" class="submitdelete">
                                                                    Delete</a></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        Superadmin
                                                    </td>
                                                    <td>{{$activedata->email}}</td>

                                                    <td>
                                                        Active
                                                    </td>

                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Email</th>

                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>

                                    {{-- (microtime(true) - LARAVEL_START) --}}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>




        </div> <!-- container -->

    </div> <!-- content -->

    @include('backend/footer')

</div>
@stop()