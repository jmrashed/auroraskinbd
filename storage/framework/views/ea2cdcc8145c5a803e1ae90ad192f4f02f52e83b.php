<?php
$page = $_SERVER['REQUEST_URI'];
$sec = "900"; // 5 min
header("Refresh: $sec; url=$page");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Document Settings -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo e(URL::asset('frontend_source/images/logo.png')); ?>">

        <?php
        if (Request::segment(1) != '') {

            if (Request::segment(1) != 'news' && Request::segment(1) != 'live' && Request::segment(1) != 'search' && Request::segment(1) != 'albums-news' && Request::segment(1) != 'news-video' && Request::segment(1) != 'result-vote' && Request::segment(1) != 'english' && Request::segment(1) != 'news-gallery' && Request::segment(1) != 'newssub') {
                ?>

                <meta property="og:title" content="<?php echo e($details->newsseotitle); ?>"/>
                <meta property="og:image" content="<?php echo e(URL::asset('uploads/news/'.$details->news_image)); ?>"/>
                <meta property="og:description" content="<?php echo e($details->newsseodetails); ?>"/>
                <meta name="keywords" content="<?php echo e($details->newsseometatag); ?>"/>
                <meta property="og:site_name" content="Boishakhionline"/>

                <?php
            }
        }
        ?>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <!-- Page Title -->
        <title><?php
            if (!empty($details->newsseotitle)) {
                echo $details->newsseotitle;
            } else {
                echo 'Boishakhi Online';
            }
            ?></title>
        <!-- Styles -->
        <?php echo Html::style('frontend_source/assets/css/font-awesome.min.css'); ?>


        <?php echo Html::style('frontend_source/assets/css/bootstrap.min.css'); ?>

        <?php echo Html::style('frontend_source/assets/css/magnific-popup.css'); ?>

        <?php echo Html::style('frontend_source/assets/css/style.css'); ?>

        <?php echo Html::style('frontend_source/assets/css/responsive.css'); ?>


        <style>
            .glyph {
                display: none;
            }
            .news_area {
                margin: 5px 0 0px 0;
                padding-bottom: 10px;
            }
            .row_padd_less {
                margin-top:  5px;  
            }
        </style>
    </head>

    <body>


        <!-- pre-loader -->
        <!--<div id="st-preloader">
        <div class="st-preloader-circle"></div>
        </div>-->
        <!-- header -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 logo">
                        <a href="<?php echo e(URL('/')); ?>"><img src="<?php echo e(URL::asset('frontend_source/assets/images/logo.png')); ?>" border="0"/></a>
                    </div>
                    <div class="col-sm-10 lst_updte">
                        
                    </div>

                </div>
            </div>
        </header>


        <div class="container box_shadow">
            <div class="wrapping_padd">

                <div class="row">
                    <div class="blck_bar">
                        <div class="col-md-2 col-sm-3 col-xs-12 bar_position">
                            <div class="top-social-icons">
                                <a href="https://www.facebook.com/auroraskinbd/" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/auroraskinbd" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.google.com/+auroraskinbd" target="_blank"><i
                                        class="fa fa-google-plus"></i></a>
                                <a href="http://www.youtube.com/auroraskinbd" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-3 col-xs-12 bar_position pull-right">
                            <?php echo Form::open(array('url' => 'search', 'method' => 'get','name' => 'studentForm','novalidate','files' => true)); ?>

                            <?php echo e(csrf_field()); ?>

                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="খোঁজ করুন..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default form-control" type="submit" style="background: #ee1c27; border: 1px solid red;"><i class="fa fa-search" style="color: #007a48; font-weight: bold; font-size: 19px;"></i></button>
                                </span>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="row nav_position">

                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <nav id="nav">
                                <ul class="">
                                    <li><a href="<?php echo e(URL('/')); ?>"><i class="fa fa-home"></i></a></li>
                                    <?php
                                    $i = 0;
                                    if (sizeof($menu) > 0) {
                                        foreach ($menu as $menuactive) {
                                            $menuid = $menuactive->menuid;
                                            if ($i <= 8) {
                                                $newsslug = strip_tags($menuactive->menutitle);
                                                $newsslug = str_replace(' ', '-', $newsslug);
                                                ?>
                                                <li>
                                                    <a href="<?php echo e(URL('/news/'.$menuactive->menuid.'/'.$newsslug)); ?>"><?php echo $menuactive->menutitle; ?> </a>
                                                    <ul>
                                                        <?php
                                                        $submenulist = App\models\MenuModel::where('menuparent', $menuid)->where('menuparent', '!=', 'none')->get();
                                                        ?>
                                                        <?php
                                                        if (sizeof($submenulist) > 0) {
                                                            ?>

                                                            <?php $__currentLoopData = $submenulist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenulisting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $newsslug = strip_tags($submenulisting->menutitle);
                                                            $newsslug = str_replace(' ', '-', $newsslug);
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo e(URL('/newssub/'.$submenulisting->menuid.'/'.$newsslug)); ?>"><?php echo e($submenulisting->menutitle); ?></a>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </li>
                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>

                        <div class="row">
                            <style type="text/css">
                                #nav_2sral > ul > li {
                                    width: 10%;
                                }
                            </style>
                            <nav id="nav_2sral">
                                <ul class=""> 
                                    <?php
                                    $i = 0;
                                    if (sizeof($menu) > 0) {
                                        foreach ($menu as $menuactive) {
                                            if ($i >= 9 && $i < '18') {
                                                $newsslug = strip_tags($menuactive->menutitle);
                                                $newsslugfilter = str_replace(' ', '-', $newsslug);
                                                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                                ?>

                                                <li>
                                                    <a href="<?php echo e(URL('/news/'.$menuactive->menuid.'/'.$newsslug)); ?>"><?php echo $menuactive->menutitle; ?> </a>
                                                    <ul>
                                                        <?php
                                                        $submenulist = App\models\MenuModel::where('menuparent',$menuactive->menuid)->where('menuparent', '!=', 'none')->get();

                                                        ?>

                                                        <?php
                                                        if (sizeof($submenulist) > 0) {
                                                            ?>

                                                            <?php $__currentLoopData = $submenulist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenulisting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $newsslug = strip_tags($submenulisting->menutitle);
                                                            $newsslug = str_replace(' ', '-', $newsslug);
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo e(URL('/newssub/'.$submenulisting->menuid.'/'.$newsslug)); ?>"><?php echo e($submenulisting->menutitle); ?></a>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </li>

                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                </div>


                <!-- start main menu -->
                <div class="main_menu_area">
                    <div class="row">
                        <nav class="navbar main-menu">
                            <div class="navbar-header">
                                <div class="mobil_live_btn">
                                    <a href="<?php echo e(URL('/')); ?>"><img style="width:82px; height:54px; border:none;"
                                                                    src="<?php echo e(URL::asset('frontend_source/assets/images/logo.png')); ?>">
                                    </a>
                                </div>
                                <button type="button" style="background:#FFF;" class="navbar-toggle collapsed"
                                        data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="myNavbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo e(URL('/')); ?>">Home</a></li>

                                    <?php
                                    $i = 0;
                                    if (sizeof($menu) > 0) {
                                        foreach ($menu as $menuactive) {
                                            if ($i <= 18) {
                                                $newsslug = strip_tags($menuactive->menutitle);
                                                $newsslug = str_replace(' ', '-', $newsslug);
                                                ?>
                                                <li class="dropdown">
                                                    <a href="<?php echo e(URL('/news/'.$menuactive->menuid.'/'.$newsslug)); ?>"><?php echo $menuactive->menutitle; ?></a>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        $submenulist = App\models\MenuModel::where('menuparent',$menuactive->menuid)->where('menuparent', '!=', 'none')->get();

                                                        ?>
                                                        <?php $__currentLoopData = $submenulist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenulisting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        $newsslug = strip_tags($submenulisting->menutitle);
                                                        $newsslug = str_replace(' ', '-', $newsslug);
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo e(URL('/newssub/'.$submenulisting->menuid.'/'.$newsslug)); ?>"><?php echo e($submenulisting->menutitle); ?></a>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </ul>
                                                </li>
                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?>
                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
                <!-- end main menu -->

                 

                <!-- start main content -->
                <?php echo $__env->yieldContent('contant'); ?>
                <!-- end main content -->


                <!-- end modified -->
            </div>

        </div>


        <!-- start footer area -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <aside class="footer-widget">
                            <h3 class="footer-title text-uppercase">CEO & Founder</h3>
                            <div class="about-content">Md. Rasheduzzaman<br>
                                CEO

                                <br>
                                <br>

                                Masud Pervase<br>
                                Founder
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4">
                        <aside class="footer-widget">

                            <div class="address">
                                <h3 class="footer-title text-uppercase">Address</h3>
                                <p>Gulshan 2<br>
                                    90, Gulshan 2, Dhaka-1212<br>
                                    Telephone: +088017111111111 <br> 
                                    Email: info@demo.com<br>
                                    Web: www.demo.com</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4">
                        <aside class="tweet-post">
                            <h3 class="footer-title text-uppercase"> Login </h3>
                            <form class="form-horizontal login-form" role="form" method="POST"
                                  action="<?php echo e(url('/admin/login')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                           required placeholder="Email">

                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" required
                                           placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                                   class="form-control btn  btn-danger" value="প্রবেশ করুন ">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-left">
                                                <?php if(Session::has('sorry')): ?>
                                                <div class="alert alert-danger"
                                                     style="text-align: center">  <?php echo Session::get('sorry'); ?></div>
                                                <?php endif; ?>
                                                <!--<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </aside>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <ul class="ftr_nav ftr_menu">
                            <?php
                            $i = 0;
                            if (sizeof($menu) > 0) {
                                foreach ($menu as $menuactive) {
                                    $newsslug = trim(strip_tags($menuactive->menutitle));
                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                    if ($i > 20 && $i != '27') {


                                        if ($menuactive->menuid == 69) {
                                            ?>
                                            <li role="presentation">
                                                <a href="<?php echo e(URL('/news/rashifol/'.$menuactive->menuid.'/'.$newsslugfilter)); ?>"><?php echo $menuactive->menutitle; ?></a>
                                            </li>


            <?php } else { ?>

                                            <li role="presentation"><a href="<?php echo e(URL('/news/'.$menuactive->menuid.'/'.$newsslugfilter)); ?>"><?php echo $menuactive->menutitle; ?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    $i++;
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="copyright-area">
                            <div class="copy-text pull-left">
                                <p>&copy; 2017 All Rights Reserved, <a href="<?php echo e(URL('/')); ?>"> auroraskinbd.com </a>, Developed by 
                                    <a href="http://skybare.com/" target="_blank">Skybare IT
                                    </a></p>
                            </div>
                            <div class="pull-right social-share footer-social-icon">
                                <span>Follow Us: </span>
                                <ul class="">

                                    <li><a href="https://www.facebook.com/auroraskinbd/" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/auroraskinbd" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.google.com/+auroraskinbd" target="_blank"><i
                                                class="fa fa-google-plus"></i></a></li>
                                    <li><a href="http://www.youtube.com/auroraskinbd" target="_blank"><i
                                                class="fa fa-youtube"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer area -->

    <?php echo Html::script('frontend_source/assets/js/jquery.min.js'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <script>
                                             var mainApp = angular.module("mainApp", []);

                                             mainApp.controller('studentController', function () {
                                             });

                                             var mainAppSubs = angular.module("mainAppSubs", []);


                                             function commentsSubmit() {

                                                 var message = $("#message").val();
                                                 var name = $("#name").val();
                                                 var email = $("#email").val();
                                                 var newsid = $("#newsid").val();
                                                 var replyid = $("#replyid").val();

                                                 //alert(newsid+"_"+message+"_"+name+"_"+email);

                                                 $.ajax({
                                                     method: "get",
                                                     url: "<?php echo e(url('commentsadd')); ?>",
                                                     data: {message: message, name: name, email: email, newsid: newsid, replyid: replyid}
                                                 }).done(function (response) {
                                                     $('#msg_show').show();
                                                     $('#comments')[0].reset();
                                                 });

                                             }

                                             function subscribeNews() {
                                                 var subscribe = $("#subscribe").val();

                                                 var x = subscribe;
                                                 var atpos = x.indexOf("@");
                                                 var dotpos = x.lastIndexOf(".");
                                                 if (x == '' || atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                                                     alert("Not a valid e-mail address");
                                                     return false;
                                                 }
                                                 //alert(subscribe);

                                                 $.ajax({
                                                     method: "get",
                                                     url: "<?php echo e(url('subscribe')); ?>",
                                                     data: {subscribe: subscribe}
                                                 }).done(function (response) {
                                                     if (response == 1) {
                                                         document.getElementById('sc_show').innerHTML = "This email id already exit.";
                                                     } else {
                                                         document.getElementById('sc_show').innerHTML = "Successfully Subscribe.";
                                                         //$("#subscribe").val()=='';	
                                                     }
                                                 });

                                             }

                                             function reply(id) {
                                                 //alert(id);
                                                 document.getElementById('replyid').value = id;
                                                 document.getElementById('message').focus();

                                             }

    </script>
    <script>
        function updateClock() {
            var currentTime = new Date();
            var currentHours = currentTime.getHours();
            var currentMinutes = currentTime.getMinutes();
            var currentSeconds = currentTime.getSeconds();

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
            currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = (currentHours < 12) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = (currentHours == 0) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
            //var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


            var finalEnlishToBanglaNumber = {
                '0': '০',
                '1': '১',
                '2': '২',
                '3': '৩',
                '4': '৪',
                '5': '৫',
                '6': '৬',
                '7': '৭',
                '8': '৮',
                '9': '৯'
            };

            String.prototype.getDigitBanglaFromEnglish = function () {
                var retStr = this;
                for (var x in finalEnlishToBanglaNumber) {
                    retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
                }
                return retStr;
            };

            var bangla_converted_number = currentTimeString.getDigitBanglaFromEnglish();

            $("#clock").html('সময়ঃ ' + bangla_converted_number);

        }

        $(document).ready(function () {
            setInterval('updateClock()', 1000);
        });

        /*
         ========================= OFF START ==========================
         */

        /*jQuery(document).bind("contextmenu cut copy",function(e){
         e.preventDefault();
         alert('Copying is not allowed');
         });*/

        /*
         ========================= OFF END ============================
         */
    </script>

    <?php
    if (Request::segment(1) == 'somethingwrong') {
        ?>
        <script>

            setTimeout(function () {

                window.location.href = "<?php echo e(URL('/')); ?>";

            }, 5000);

        </script>
        <?php
    }
    ?>
    <?php echo Html::script('frontend_source/assets/js/bootstrap.min.js'); ?>

    <?php echo Html::script('frontend_source/assets/js/jquery.magnific-popup.min.js'); ?>

    <?php echo Html::script('frontend_source/assets/js/jquery.scrollUp.min.js'); ?>

    <?php echo Html::script('frontend_source/assets/js/main.js'); ?>


</body>
</html>
