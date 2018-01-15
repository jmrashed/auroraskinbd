<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme for boishakhi tv">
        <meta name="author" content="jmrashed">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Boishakhi Tv</title>
        <link rel="shortcut icon" href="{{ URL::asset('frontend_source/images/logo.png') }}">

        <!-- Base Css Files -->
        <link href="{{ URL::asset('backend_source/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ URL::asset('backend_source/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('backend_source/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('backend_source/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ URL::asset('backend_source/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <!--<link href="{{ URL::asset('backend_source/css/waves-effect.css') }}" rel="stylesheet">-->

        <!-- sweet alerts -->
        <!--<link href="{{ URL::asset('backend_source/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">-->

        <!-- Custom Files -->
        <link href="{{ URL::asset('backend_source/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('backend_source/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ URL::asset('backend_source/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

<!--<script src="{{ URL::asset('backend_source/js/modernizr.min.js') }}"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script>
var mainApp = angular.module("mainApp", []);

mainApp.controller('studentController', function () {
});
        </script>
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>

        <style>
            .row-actions {
                font-family:Verdana, Geneva, sans-serif;
                font-size:12px;
                visibility: hidden;
                padding: 2px 0 0;
            }

            tr:hover .row-actions,
            div.comment-item:hover .row-actions {
                visibility: visible;
            }

            .row-actions-visible {
                padding: 2px 0 0;
                cursor: pointer;
            }
            .submitdelete
            {
                font-family:Verdana, Geneva, sans-serif;
                font-size:12px;
                color:#F00;
            }
            .submitdelete a
            {
                font-family:Verdana, Geneva, sans-serif;
                font-size:12px;
                color:#F00;
            }
        </style>
        <!--<script>
                
                
         var mainApp = angular.module("mainApp", []);
         
         mainApp.controller('studentController', function() {           
         });
                 
                 
      </script>-->

        <script type="text/javascript">
            function checkInt(evt, val) {
                evt = (evt) ? evt : window.event
                var charCode = (evt.which) ? evt.which : evt.keyCode
                // alert(charCode);
                if (charCode != 46 && charCode > 31
                        && (charCode < 48 || charCode > 57)) {
                    //alert_message2(val+' field accepts numbers and decimal points only');
                    // status = "This field accepts numbers only."
                    return false
                }
                //  status = ""
                return true
            }

            function goBack()
            {
                window.history.back();
            }

            function checkAll(ele) {
                var checkboxes = document.getElementsByTagName('input');
                if (ele.checked) {
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].type == 'checkbox') {
                            checkboxes[i].checked = true;
                        }
                    }
                } else {
                    for (var i = 0; i < checkboxes.length; i++) {
                        console.log(i)
                        if (checkboxes[i].type == 'checkbox') {
                            checkboxes[i].checked = false;
                        }
                    }
                }
            }

            function DeleteSelected()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/deletebanner")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function TopNews()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;
                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to Top News these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/topnews")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function activeSerial()
            {

                var top_news = '';
                if ($('input[name=top_news]:checked').val() != null) {
                    top_news = $('input[name=top_news]:checked').val();
                }

                if (top_news == '')
                {
                    document.getElementById("serial").readOnly = true;
                    document.getElementById("serial").value = '';
                } else
                {
                    document.getElementById("serial").readOnly = false;
                }
            }


            function PublishNews()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to publish these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/admin/activenews")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function DeleteGallery()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/superadmin/gallery_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }


            function DeleteAds()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/superadmin/ads_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function DeleteGallery1()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/admin/gallery_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }


            function DeleteVote()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/superadmin/vote_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function DeleteVote1()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/admin/vote_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function DeleteAlbum()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/superadmin/galleryalbum_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function DeleteAlbum1()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/admin/galleryalbum_delete")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }

            function DeleteSelectedMenu()
            {
                //alert('Yes');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var checkItem = document.getElementsByName("serial[]");
                var j = 0;
                var data = new Array();

                for (var i = 0; i < checkItem.length; i++)
                {
                    if (checkItem[i].checked)
                    {
                        data[j] = checkItem[i].value;
                        j++;

                    }
                }

                if (data == "")
                {
                    alert("Please select checkbox !");
                    return false;
                } else
                {
                    //alert(data);
                    var val = window.confirm('Are you sure you want to delete these ?');
                    if (val == true)
                    {
                        $.ajax({
//                           dataType: "json",
                            method: "get",
                            url: '{{url("/deletemenu")}}',
                            data: {data: data}
                        })
                                .done(function (response)
                                {
                                    //alert(response);
                                    window.location.reload();
                                });
                    } else
                    {
                        return;
                    }
                }
            }


            function edit(id)
            {
                //alert(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
//                           dataType: "json",
                    method: "get",
                    url: '{{URL("/superadmin/categoriesedit")}}',
                    data: {id: id}
                })
                        .done(function (response)
                        {
                            //alert(response);
                            loadAngularJs();
                            document.getElementById("replace").innerHTML = response;

                        });
            }

            function loadAngularJs()
            {
                $(document).ready(function () {
                    //alert('IN');
                    var mainApp = angular.module("mainApp", []);

                    mainApp.controller('studentController', function () {
                    });
                });
            }

            function checkStatus(id)
            {
                document.getElementById("newsstatus").value = id;
            }

            function remove_top(id)
            {
                //alert(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
//                           dataType: "json",
                    method: "get",
                    url: '{{URL("/admin/remove_top")}}',
                    data: {id: id}
                })
                        .done(function (response)
                        {

                            window.location.href = '{{URL('
                            admin / user_post_edit / ')}}' + "/" + id;
                        });
            }


            function unpublish_post(id)
            {
                //alert(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
//                           dataType: "json",
                    method: "get",
                    url: '{{URL("/admin/unpublish_post")}}',
                    data: {id: id}
                })
                        .done(function (response)
                        {

                            window.location.href = '{{URL('
                            admin / user_post_edit / ')}}' + "/" + id;
                        });
            }

            function remove_top1(id)
            {
                //alert(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    //dataType: "json",
                    method: "get",
                    url: '{{URL("/superadmin/remove_top1")}}',
                    data: {id: id}
                })
                        .done(function (response)
                        {

                            window.location.href = '{{URL(' / superadmin / post - edit / ')}}' + "/" + id;
                        });
            }

            function unpublish_post1(id)
            {
                //alert(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
//                           dataType: "json",
                    method: "get",
                    url: '{{URL("/superadmin/unpublish_post")}}',
                    data: {id: id}
                })
                        .done(function (response)
                        {

                            window.location.href = '{{URL(' / superadmin / post - edit / ')}}' + "/" + id;
                        });
            }

            function PreviewImage()
            {
                //alert('IN');
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("photo").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                };
            }
        </script>

    </head>



    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ url('dashboard') }}" class="logo"><i class="md"></i> <span>Boishakhi</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">

                                    <h2 class="form-control search-bar" style="padding-top:13px;">Boishakhi Tv</h2>
<!--                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">-->
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                        <img src="{{ URL::asset('frontend_source/images/logo.png') }}" alt="user-img" border="0" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                          <!--<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>-->

                                        @if(Auth::user()->desi)

                                        <li><a href="{{ url('/admin/logout') }}"><i class="md md-settings-power"></i> Logout</a></li>
                                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        @else
                                        <li><a href="{{ url('/superadmin/logout') }}"><i class="md md-settings-power"></i> Logout</a></li>
                                        <form id="logout-form" action="{{ url('/superadmin/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ URL::asset('frontend_source/images/logo.png') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{$user = Auth::user()->name}} 
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <!--<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>-->

                                    @if(Auth::user()->desi)

                                    <li><a href="{{ url('/admin/logout') }}"><i class="md md-lock"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    @else
                                    <li><a href="{{ url('/superadmin/logout') }}"><i class="md md-lock"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ url('/superadmin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    @endif

                                </ul>
                            </div>


                            @if(Auth::user()->desi)    
                            <p class="text-muted m-0">{{Auth::user()->desi}}</p>
                            @else
                            <p class="text-muted m-0">Administrator</p>
                            @endif



                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            @if(Auth::user()->desi)
                            <li>
                                <a href="{{ url('admin/dashboard') }}" class="waves-effect active"><i class="fa fa-dashboard"></i><span> Dashboard </span></a>
                            </li>
                            @else

                            <li>
                                <a href="{{ url('superadmin/dashboard') }}" class="waves-effect active"><i class="fa fa-dashboard"></i><span> Dashboard </span></a>
                            </li>

                            @endif

                            @if(Auth::user()->desi)

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Headline </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/headline') }}"> Add New </a></li>

                                </ul>
                            </li>


                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Posts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/user_posts') }}">All Post</a></li>
                                    <li><a href="{{ url('admin/user_newadd') }}">Add New</a></li>
                                </ul>
                            </li>

                            @if(Auth::user()->type==1)
                            <li>
                                <a href="{{ url('admin/reporter-post') }}" class="waves-effect"><i class="md md-pages"></i><span> Reporter Post </span></a>
                            </li>
                            @endif

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-perm-media"></i><span> Media </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/media') }}">All Media</a></li>
                                    <li><a href="{{ url('admin/newaddmedia') }}">Add New</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i><span> Gallery </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/galleryalbum') }}">Gallery Album Manage</a></li>
                                    <li><a href="{{ url('admin/newaddgalleryalbum') }}">Add Gallery Album</a></li>

                                    <li><a href="{{ url('admin/gallery') }}">Gallery Manage</a></li>
                                    <li><a href="{{ url('admin/newaddgallery') }}">Add Gallery</a></li>
                                    <!--<li><a href="{{ url('superadmin/comments') }}">Comments Approval</a></li>-->
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i><span> Vote </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/vote') }}">Vote Manage</a></li>
                                    <li><a href="{{ url('admin/newaddvote') }}">Add Vote</a></li>
                                    <!--<li><a href="{{ url('superadmin/comments') }}">Comments Approval</a></li>-->
                                </ul>
                            </li>
                            @else

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Headline </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/headline') }}"> Add New </a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Posts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/posts') }}">All Post</a></li>
                                    <!--<li><a href="{{ url('superadmin/newadd') }}">Add New</a></li>
                                    -->                                    <li><a href="{{ url('superadmin/categories') }}">Categories</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-perm-media"></i><span> Media </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/media') }}">All Media</a></li>
                                    <li><a href="{{ url('superadmin/newaddmedia') }}">Add New</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i><span> Gallery </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/galleryalbum') }}">Gallery Album Manage</a></li>
                                    <li><a href="{{ url('superadmin/newaddgalleryalbum') }}">Add Gallery Album</a></li>

                                    <li><a href="{{ url('superadmin/gallery') }}">Gallery Manage</a></li>
                                    <li><a href="{{ url('superadmin/newaddgallery') }}">Add Gallery</a></li>
                                    <!--<li><a href="{{ url('superadmin/comments') }}">Comments Approval</a></li>-->
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i><span> Ads </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/ads') }}">Ads Manage</a></li>
                                    <li><a href="{{ url('superadmin/newaddads') }}">Add New</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-description"></i><span> Vote </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/vote') }}">Vote Manage</a></li>
                                    <li><a href="{{ url('superadmin/newaddvote') }}">Add Vote</a></li>
                                    <!--<li><a href="{{ url('superadmin/comments') }}">Comments Approval</a></li>-->
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-account-circle"></i><span> Users </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/user') }}">All Users</a></li>
                                    <li><a href="{{ url('superadmin/useradd') }}">Add New</a></li>                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-account-circle"></i><span> Superadmin </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('superadmin/superadmin_user') }}">All Users</a></li>
                                    <li><a href="{{ url('superadmin/superadmin_useradd') }}">Add New</a></li>                                    
                                </ul>
                            </li>

                            @endif
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 




            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            @yield('content')

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ URL::asset('backend_source/js/jquery.min.js') }}"></script>


        <script src="{{ URL::asset('backend_source/js/bootstrap.min.js') }}"></script>

<!--<script src="{{ URL::asset('backend_source/js/waves.js') }}j"></script>
<script src="{{ URL::asset('backend_source/js/wow.min.js') }}"></script>
<script src="{{ URL::asset('backend_source/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend_source/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ URL::asset('backend_source/assets/chat/moment-2.2.1.js') }}"></script>
<script src="{{ URL::asset('backend_source/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>-->
        <script src="{{ URL::asset('backend_source/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <!--<script src="{{ URL::asset('backend_source/assets/jquery-blockui/jquery.blockUI.js') }}"></script>-->

        <!-- sweet alerts -->
        <!--<script src="{{ URL::asset('backend_source/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/sweet-alert/sweet-alert.init.js') }}"></script>-->

        <!-- flot Chart -->
        <!--<script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>-->

        <!-- Counter-up -->
        <!--<script src="{{ URL::asset('backend_source/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('backend_source/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>-->

        <!-- CUSTOM JS -->
        <script src="{{ URL::asset('backend_source/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ URL::asset('backend_source/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        <!--<script src="{{ URL::asset('backend_source/js/jquery.chat.js') }}"></script>-->

        <!-- Todo -->
<!--        <script src="{{ URL::asset('backend_source/js/jquery.todo.js') }}"></script>-->

        <!-- CUSTOM JS -->

        <script src="{{ URL::asset('backend_source/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('backend_source/assets/datatables/dataTables.bootstrap.js') }}"></script>

        <script type="text/javascript">
            /* ==============================================
             Counter Up
             =============================================== */
//            jQuery(document).ready(function($) {
//                $('.counter').counterUp({
//                    delay: 100,
//                    time: 1200
//                });
//            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
            });
        </script>

        <script src="{{ URL::asset('templateEditor/ckeditor/ckeditor.js') }}"></script>
        <script>
            $(document).ready(function () {
                CKEDITOR.replace("article-ckeditor",
                        {
                            height: 450
                        });
            });
        </script>

    </body>
</html>