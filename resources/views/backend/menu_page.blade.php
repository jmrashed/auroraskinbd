@extends('backend.dashboard')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        @if(Session::has('pagetitle'))
                        {!!Session::get('pagetitle')!!}
                        @endif
                        Menu Manage
                    </h4>
                    <!-- <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Datatable</li>
                    </ol> -->
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{url('addmenu')}}"><button class="btn btn-purple waves-effect waves-light m-b-5" type="button">Add Menu</button></a></li>
                        <li><a href="JavaScript:void(0)" onclick="DeleteSelectedMenu()"><button class="btn btn-danger waves-effect waves-light m-b-5" type="button">Delete</button></a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Menu Data</h3>


                            @if(Session::has('success'))
                            <div class="alert alert-success" style="text-align: center">  {!!Session::get('success')!!}</div>
                            @endif

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                <th>Title</th>
                                                <th>Menu Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $activedata) {
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial{{$i}}" value="{{$activedata->id}}"></td>
                                                    <td>{{$activedata->name}}</td>
                                                    <td>{{$activedata->menuname}}</td>
                                                    <td>
                                                        @if($activedata->status==1)

                                                        <button class="btn btn-info waves-effect waves-light m-b-5">Active</button>

                                                        @else

                                                        <button class="btn btn-danger waves-effect waves-light m-b-5">Unactive</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{URL('menuedit/'.$activedata->id)}}">
                                                            <button class="btn btn-icon waves-effect waves-light btn-purple m-b-5">
                                                                Edit <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->

    @include('backend/footer');

</div>
@stop()