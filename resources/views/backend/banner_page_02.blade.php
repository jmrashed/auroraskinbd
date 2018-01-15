@extends('backend.dashboard')

@section('content')
<style type="text/css">

    .zoomImg{

    }
    .zoomImg:hover{

        background-position: center;
        background-size: cover;
        border: 3px solid rgba(0, 138, 68, 0.42);
        box-shadow: 0px 0px 200px black;
    }
</style>
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
                        Ads Manage
                    </h4>
                    <!-- <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Datatable</li>
                    </ol> -->
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{url(Request::segment(1).'/newaddads')}}"><button class="btn btn-purple waves-effect waves-light m-b-5" type="button">Add New</button></a></li>
                        <li><a href="JavaScript:void(0)" onclick="DeleteAds()"><button class="btn btn-danger waves-effect waves-light m-b-5" type="button">Delete</button></a></li>


                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Data</h3>


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
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Categories / Page</th>
                                                <th>Positioning</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($ads as $activedata) {
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial{{$i}}" value="{{$activedata->id}}"></td>
                                                    <td>{{$activedata->title}}</td>
                                                    <td>
                                                        @if($activedata->type=='Image')
                                                        <img class="zoomImg" src="{{ URL::asset('uploads/ads/'.$activedata->image) }}" width="200px" height="auto">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($activedata->type=='Image')
                                                        Image
                                                        @else
                                                        Code
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($activedata->categorie_id == 1000) {
                                                            echo 'Home Page';
                                                        } else {
                                                            $newsid = $activedata->categorie_id;
                                                            $result = DB::table('boi_menu')
                                                                    ->where('menuid', $newsid)
                                                                    ->get();
                                                            //   dd($result); 

                                                            if (sizeof($result) > 0) {
                                                                foreach ($result as $categories) {
                                                                    echo $categories->menutitle . '<br />';
                                                                }
                                                            }
                                                        }
                                                        ?> 
                                                    </td>



                                                    <td>{{'0'.$activedata->positioning}}</td>
                                                    <td>
                                                        @if($activedata->status==1)

                                                        <button class="btn btn-info waves-effect waves-light m-b-5">Active</button>

                                                        @else

                                                        <button class="btn btn-danger waves-effect waves-light m-b-5">Unactive</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url(Request::segment(1).'/ads-edit/'.$activedata->id)}}">
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