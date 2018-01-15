@extends('backend.dashboard')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="pull-left page-title">Posts</h4> &nbsp;&nbsp;
                    <a href="{{ url('superadmin/newadd') }}"><button class="btn btn-default waves-effect" type="button" style="margin-top:5px;">Add New</button></a>
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
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Categories</th>

                                                <th>Date</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $activedata) {
                                                $menuid = $activedata->menuid;
                                                $newsslug = strip_tags($activedata->newstitle);
                                                $newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                                $newsslugfilter = str_replace(' ', '-', $newsslug);
                                                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                                ?>

                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial{{$i}}" value="{{$activedata->menuid}}"></td>
                                                    <td><a href="{{URL('superadmin/post-comments/'.$activedata->newsid)}}">{{$activedata->newstitle}}</a>
                                                        <div class="row-actions">
                                                            <span class="edit"><a href="{{URL('superadmin/post-edit/'.$activedata->newsid)}}">Edit</a> | </span>
                                                            <span class="edit"><a href="{{URL('/'.$activedata->newsid.'/'.$newsslugfilter)}}" target="_blank">View</a> | </span>

                                                            <span class="trash">
                                                                <a href="{{URL('superadmin/post-delete/'.$activedata->newsid)}}" class="submitdelete">
                                                                    Delete</a></span>
                                                        </div>
                                                    </td>
                                                    <td>




                                                        @if($activedata->newsstatus == 1)
                                                        <span style="color: red; font-weight: bold;"> Unpublished </span>
                                                        @else
                                                        <span style="color: green; font-weight: bold;"> Published by

                                                        </span>
                                                        @endif
                                                        <?php if (empty($activedata->name)) { ?>   [ Superadmin ] <?php } else { ?> 
                                                            [ {{$activedata->name}} ]

                                                        <?php } ?>




                                                    </td>
                                                    <td>
                                                        <?php
                                                        $newsid = $activedata->newsid;
                                                        $result = DB::table('boi_news_categoris')->select('boi_news_categoris.*', 'boi_menu.menuid', 'boi_menu.menutitle')
                                                                ->leftjoin('boi_menu', 'boi_menu.menuid', '=', 'boi_news_categoris.menuid')
                                                                ->where('boi_news_categoris.newsmainid', $newsid)
                                                                /* ->groupBy('boi_news_categoris.menuid') */
                                                                ->get();

                                                        if (sizeof($result) > 0) {
                                                            foreach ($result as $categories) {
                                                                echo $categories->menutitle . '<br />';
                                                            }
                                                        }
                                                        ?>

                                                    </td>

                                                    <td>
                                                        <?php
                                                        $date = explode(' ', $activedata->newsupdatetime)
                                                        ?>
                                                        {{$date[0].' '.$date[1].' '.$date[2]}}
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
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Categories</th>

                                                <th>    Date</th>
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