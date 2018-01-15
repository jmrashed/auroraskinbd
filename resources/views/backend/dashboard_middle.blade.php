@extends('backend.dashboard')
@section('content')
<div class="content-page">
    <style type="text/css">
        .mini-stat{
            background: green;
            border: 3px solid #ffffff;
            box-shadow: 2px 2px 3px green;
            position: relative;
            -webkit-transition: all 200ms ease-in;
            -webkit-transform: scale(1); 
            -ms-transition: all 200ms ease-in;
            -ms-transform: scale(1); 
            -moz-transition: all 200ms ease-in;
            -moz-transform: scale(1);
            transition: all 200ms ease-in;
            transform: scale(1);  
            margin-bottom:  25px;
            width: 80%;
            height: auto;
        }
        .mini-stat:hover{
            box-shadow: 3px 3px 150px #000000;
            z-index: 2;
            -webkit-transition: all 200ms ease-in;
            -webkit-transform: scale(1.5);
            -ms-transition: all 200ms ease-in;
            -ms-transform: scale(1.5);   
            -moz-transition: all 200ms ease-in;
            -moz-transform: scale(1.5);
            transition: all 200ms ease-in;
            transform: scale(1.02);

        }

    </style>
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title" style="    color: green; font-weight: bold;">Welcome  @if(Auth::user()->desi) Editor [  {{$user = Auth::user()->name}} ] @else Superadmin [  {{$user = Auth::user()->name}} ] @endif  </h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">




                @if(Auth::user()->desi)
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow" style="background:green">
                        <a href="{{url('/')}}/admin/user_posts">
                            <span class="mini-stat-icon" style="color:white; background: red"> <i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
                            <div class="mini-stat-info text-right text-muted" >
                                <h4 style="color:white">All Posts  </h4>
                                <small style="color:white"> [Editor]</small>
                        </a>
                    </div> 
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="mini-stat clearfix bx-shadow" style="background:green">
                    <a href="{{url('/')}}/admin/user_newadd">
                        <span class="mini-stat-icon" style="color:white; background: red"> <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-right text-muted" >
                            <h4 style="color:white">Add New Post  </h4>
                            <small style="color:white"> [Editor]</small>
                    </a>
                </div> 
            </div>
        </div>
        @else
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <div class="mini-stat clearfix bx-shadow" style="background:#3c763d">
                <a href="{{url('/')}}/superadmin/posts">
                    <span class="mini-stat-icon bg-info"> <i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
                    <div class="mini-stat-info text-right text-muted" >
                        <h4 style="color:white">All Posts </h4>
                </a>
            </div> 
        </div>
    </div>


    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
        <div class="mini-stat clearfix bx-shadow" style="background:#3c763d">
            <a href="{{url('/')}}/superadmin/newadd">
                <span class="mini-stat-icon bg-info"> <i class="fa fa-plus" aria-hidden="true"></i></span>
                <div class="mini-stat-info text-right text-muted" >
                    <h4 style="color:white">Add New Post </h4>
            </a>
        </div> 
    </div>
</div>  

<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="mini-stat clearfix bx-shadow" style="background:#337ab7">
        <a href="{{url('/')}}/superadmin/ads">
            <span class="mini-stat-icon bg-info"> <i class="fa fa-rss" aria-hidden="true"></i></span>
            <div class="mini-stat-info text-right text-muted" >
                <h4 style="color:white">Ads Manage</h4>
        </a>
    </div> 
</div>
</div>   

<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="mini-stat clearfix bx-shadow" style="background:#337ab7">
        <a href="{{url('/')}}/superadmin/newaddads">
            <span class="mini-stat-icon bg-info"> <i class="fa fa-plus" aria-hidden="true"></i></span>
            <div class="mini-stat-info text-right text-muted" >
                <h4 style="color:white">Ads Manage</h4>
        </a>
    </div> 
</div>
</div>





<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="mini-stat clearfix bx-shadow" style="background:#33b86c">
        <a href="{{url('/')}}/superadmin/user">
            <span class="mini-stat-icon bg-info"> <i class="fa fa-user" aria-hidden="true"></i></span>
            <div class="mini-stat-info text-right text-muted" >
                <h4 style="color:white">User Manage</h4>
        </a>
    </div> 
</div>
</div>
<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="mini-stat clearfix bx-shadow" style="background:#33b86c">
        <a href="{{url('/')}}/superadmin/useradd">
            <span class="mini-stat-icon bg-info"> <i class="fa fa-user-plus" aria-hidden="true"></i></span>
            <div class="mini-stat-info text-right text-muted" >
                <h4 style="color:white">Add User</h4>
        </a>
    </div> 
</div>
</div>   





<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="mini-stat clearfix bx-shadow" style="background:#0486f7">
        <a href="{{url('/')}}/superadmin/media">
            <span class="mini-stat-icon bg-info"> <i class="fa fa-video-camera" aria-hidden="true"></i></span>
            <div class="mini-stat-info text-right text-muted" >
                <h4 style="color:white">All Media</h4>
        </a>
    </div> 
</div>
</div>
<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="mini-stat clearfix bx-shadow" style="background:#0486f7">
        <a href="{{url('/')}}/superadmin/newaddmedia">
            <span class="mini-stat-icon bg-info"> <i class="fa fa-file-video-o" aria-hidden="true"></i></span>
            <div class="mini-stat-info text-right text-muted" >
                <h4 style="color:white">Add Media</h4>
        </a>
    </div> 
</div>
</div>   





@endif





</div>



<div class="row">
    <?php
    if (Auth::user()->desi) {
        $login_id = Auth::user()->id;
        $date = date("d F Y");
        ?>
        <h3 class="text-center">আজকে আপনার প্রকাশিত খবর </h3>
        <table class="table table-reponsive table-bordered">
            <tr><td>SL</td><td>Title</td><td>Published Time</td><td>Edit</td></tr>

            <?php
            $ii = 1;
            $today_my_post = DB::table('boi_news')->where('userid', $login_id)->where('newscreatetime', 'like', '%' . $date . '%')->get();
            foreach ($today_my_post as $row) {
                $newsslug = strip_tags($row->newstitle);
                $newsslugfilter = str_replace(' ', '-', $newsslug);
                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                ?>


                <tr><td><?= $ii++; ?></td>
                    <td style="width: 60%">  <a href="{{URL('/'.$row->newsid.'/'.$newsslugfilter)}}"><?php echo $row->newstitle; ?></a> </td>
                    <td><?= $row->newscreatetime; ?></td> 
                    <td><a href="{{url('/')}}/admin/user_post_edit/<?= $row->newsid; ?>">Edit </a></td>
                </tr>


                <?php
            }
            echo '</table>';
        }
        ?>

</div>
</div> <!-- container -->

</div> <!-- content -->

@include('backend/footer')

</div>
@stop()


