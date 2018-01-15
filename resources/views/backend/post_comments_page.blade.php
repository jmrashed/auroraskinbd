@extends('backend.dashboard')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="pull-left page-title">Post Comments</h4>
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
                                    <table width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th align="left" style="text-align:justify">{{$news->newstitle}}</th>
                                            </tr>
                                            <tr>

                                                <th align="left">
                                                    <?php
                                                    $busRow = strip_tags($news->newsdetails);
                                                    if (strlen($busRow) > 1000) {
                                                        $stringCuth = substr($busRow, 0, 1000);
                                                        $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                                    }
                                                    echo $busRow;
                                                    ?>	
                                                </th>
                                            </tr>
                                        </thead>


                                        <tbody>


                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                            </tr>
                                            <tr>
                                                <th align="right">
                                                    <?php
                                                    if (sizeof($post_comments) > 0) {
                                                        $i = 0;
                                                        foreach ($post_comments as $comments) {
                                                            ?>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="9%" rowspan="2" align="center" valign="top">
                                                                        <img src="{{ URL::asset('backend_source/images/user.png') }}" alt="user-img" border="0" class="img-circle">
                                                                    </td>
                                                                    <td width="74%">
                                                                        {{$comments->name}} <br />
                                                                        {{$comments->email}}
                                                                    </td>
                                                                    <td width="17%">{{$comments->datetime}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?php echo $comments->comment; ?></td>
                                                                    <td align="right">


                                                                        <img src="{{ URL::asset('backend_source/images/active.png') }}" id="active{{$i}}" style="display:none;cursor:pointer" onclick="unactive(<?php echo $i; ?>,<?php echo $comments->cid; ?>)" title="Unactive">

                                                                        @if($comments->active==0)
                                                                        <img src="{{ URL::asset('backend_source/images/notactive.png') }}" id="notactive{{$i}}" onclick="active(<?php echo $i; ?>,<?php echo $comments->cid; ?>)" width="24" height="24" style="cursor:pointer" alt="Active" title="Active">
                                                                        @else
                                                                        <img src="{{ URL::asset('backend_source/images/active.png') }}" id="active{{$i}}" onclick="unactive(<?php echo $i; ?>,<?php echo $comments->cid; ?>)" style="cursor:pointer" alt="Unactive" title="Unactive">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <?php
                                                            $id = $comments->cid;
                                                            $m = 100;
                                                            $postReply = App\models\CommentsModel::where('replyid', $id)->orderBy('newsid', 'ASC')->get();
                                                            foreach ($postReply as $comments) {
                                                                ?>
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td height="5" align="center" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="5" align="center" valign="top" style="border-top:1px dotted #999">&nbsp;</td>
                                                                    </tr>
                                                                </table>

                                                                <table width="90%" border="0" align="right" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td width="9%" rowspan="2" align="center" valign="top">
                                                                            <img src="{{ URL::asset('backend_source/images/user.png') }}" alt="user-img" border="0" class="img-circle">
                                                                        </td>
                                                                        <td width="74%">
                                                                            {{$comments->name}} <br />
                                                                            {{$comments->email}}
                                                                        </td>
                                                                        <td width="17%">{{$comments->datetime}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $comments->comment; ?></td>
                                                                        <td align="right">

                                                                            <img src="{{ URL::asset('backend_source/images/active.png') }}" id="active{{$m}}" style="display:none;cursor:pointer" onclick="unactive(<?php echo $m; ?>,<?php echo $comments->cid; ?>)" title="Unactive">

                                                                            @if($comments->active==0)
                                                                            <img src="{{ URL::asset('backend_source/images/notactive.png') }}" id="notactive{{$m}}" onclick="active(<?php echo $m; ?>,<?php echo $comments->cid; ?>)" width="24" height="24" style="cursor:pointer" alt="Active" title="Active">
                                                                            @else
                                                                            <img src="{{ URL::asset('backend_source/images/active.png') }}" id="active{{$m}}" onclick="unactive(<?php echo $m; ?>,<?php echo $comments->cid; ?>)" style="cursor:pointer" alt="Unactive" title="Unactive">
                                                                            @endif

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <?php
                                                                $m++;
                                                            }
                                                            ?>

                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="5" align="center" valign="top">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="5" align="center" valign="top" style="border-top:1px dotted #999">&nbsp;</td>
                                                                </tr>
                                                            </table>

                                                            <?php
                                                            $i++;
                                                        }
                                                    }
                                                    ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th >&nbsp;</th>
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

    <script>
        function active(id, newsid)
        {
            //alert(id+"__"+newsid);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "get",
                url: "{{url('superadmin/commentspublic')}}",
                data: {id: id, cid: newsid}
            }).done(function (response)
            {
                $('#notactive' + id).hide();
                $('#active' + id).show();
            });

        }

        function unactive(id, newsid)
        {
            //alert(id+"__"+newsid);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "get",
                url: "{{url('superadmin/commentsunpublic')}}",
                data: {id: id, cid: newsid}
            }).done(function (response)
            {
                $('#notactive' + id).show();
                $('#active' + id).hide();
            });

        }
    </script>
    @include('backend/footer')

</div>
@stop()