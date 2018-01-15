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
                    <a href="{{ url('admin/user_newadd') }}"><button class="btn btn-default waves-effect" type="button" style="margin-top:5px;">Add New</button></a>
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

                                    <table width="100%" align="right">
                                        <tr>
                                            <td width="77%">All News Data</td>
                                            <td width="12%" align="right">
                                                <select name="categories" id="categories" class="form-control" onchange="searchNews()">
                                                    <option value="">Categories</option>
                                                    <?php
                                                    foreach ($categories as $categoriesallow) {
                                                        $cat = App\models\UserModel::Where('userid', Auth::user()->id)->where('menuid', $categoriesallow->menuid)->first();
                                                        if (sizeof($cat) > 0) {
                                                            if ($cat->menuid == $categoriesallow->menuid) {
                                                                ?>
                                                                <option value="{{$categoriesallow->menuid}}">{{$categoriesallow->menutitle}}</option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td width="11%">
                                                <select name="reporter" id="reporter" class="form-control" onchange="searchNews()">
                                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <div style="clear:both; padding-top:10px;"></div>

                                    <div id="replace">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Categories</th>

                                                    <th>	Date</th>
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
                                                        <td>{{$activedata->newstitle}}


                                                            <div class="row-actions">
                                                                <span class="edit"><a href="{{URL('admin/user_post_edit/'.$activedata->newsid)}}">Edit</a> | </span>
                                                                <span class="edit"><a href="{{URL('/'.$activedata->newsid.'/'.$newsslugfilter)}}" target="_blank">View</a> | </span>
                                                                <span class="trash">
                                                                    <a href="{{URL('admin/user_post_delete/'.$activedata->newsid)}}" class="submitdelete">
                                                                        Delete</a></span>
                                                            </div>

                                                        </td>
                                                        <td>





                                                            @if($activedata->newsstatus == 1)
                                                            <span style="color: red; font-weight: bold;"> Unpublished </span>
                                                            @else
                                                            <span style="color: green; font-weight: bold;"> Publish by 

                                                            </span>
                                                            @endif
                                                            <?php if (empty($activedata->name)) { ?>   [ Superadmin ] <?php } else {
                                                                ?>  [ {{$activedata->name}} ]  <?php
                                                            }
                                                            if ($activedata->newsupdateby) {
                                                                ?> 
                                                                <p>Last Updated By <span  style="color: #a94442"><b>[ {{$activedata->newsupdateby}} ]</b></span> </p>
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

                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    {{-- (microtime(true) - LARAVEL_START) --}}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>




        </div> <!-- container -->

    </div> <!-- content -->

    <script type="text/javascript">

        function searchNews()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var categories = $("#categories").val();
            var reporter = $("#reporter").val();

            //alert(categories+"_"+reporter);

            $.ajax({
                method: "get",
                url: "{{url('admin/search_news')}}",
                data: {categories: categories, reporter: reporter}
            })
                    .done(function (response) {
                        //alert(response);
                        $('#replace').html(response);
                        $('#datatable').dataTable();
                    });

        }


    </script>

    @include('backend/footer')

</div>
@stop()