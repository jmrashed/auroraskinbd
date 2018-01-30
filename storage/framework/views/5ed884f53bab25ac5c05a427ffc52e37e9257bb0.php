<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$systems= DB::table('auro_systems')->where('id',1)->first();
//dd($systems->name);
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo e(URL::asset('frontend_source/images/logo.png')); ?>">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title> Auroraskinbd</title>
        <script type="application/x-javascript">
            // addEventListener("load", function () {
            //     setTimeout(hideURLbar, 0);
            // }, false);

            // function hideURLbar() {
            //     window.scrollTo(0, 1);
            // }
        </script>

        <!-- Styles -->
        <?php echo Html::style('frontend_source/css/font-awesome.css'); ?>

        <?php echo Html::style('frontend_source/css/bootstrap.css'); ?>

        <?php echo Html::style('frontend_source/css/appointment_style.css'); ?>

        <?php echo Html::style('frontend_source/css/style.css'); ?> 
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">

    </head>

    <body>
    <div class="header" id="home">
        <div class="top_menu_w3layouts">
            <div class="container">
                <div class="header_left">
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($systems->location); ?></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>  <?php echo e($systems->phone); ?></li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo e($systems->email); ?>"><?php echo e($systems->email); ?></a></li>
                    </ul>
                </div>
                <div class="header_right">
                    <ul class="forms_right">
                        <li><a href="appointment.html"> Make an Appointment</a> </li>
                    </ul>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
                <div class="content white">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                        <a class="navbar-brand" href="index.html">
                            <h1><span class="fa fa-stethoscope" aria-hidden="true"></span>Auroraskin </h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo e(url('/')); ?>" class="active">Home</a></li>
                                <li><a href="<?php echo e(url('/')); ?>/about-us">About</a></li>
                                
                                <li><a href="<?php echo e(url('/')); ?>/departments">Departments</a></li>
                                <li><a href="<?php echo e(url('/')); ?>/gallery">Gallery</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="codes.html">Codes</a></li>
                                        <li class="divider"></li>
                                        <li><a href="icons.html">Icons</a></li>
                                        <li class="divider"></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="<?php echo e(url('/')); ?>/contact-us">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--/.navbar-collapse-->
                    <!--/.navbar-->
                </div>
            </nav>
        </div>
    </div>

    <?php echo $__env->yieldContent('contant'); ?> 

    <!-- footer -->
    <div class="footer_top_agile_w3ls">
        <div class="container">
            <div class="col-md-3 footer_grid">
                <h3>About Us</h3>
                <p><?php echo e($systems->aboutus); ?>                </p>
                
            </div>
            <div class="col-md-3 footer_grid">
                <h3>Latest News</h3>
                <ul class="footer_grid_list">
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque vulputate </a>
                    </li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="#" data-toggle="modal" data-target="#myModal">Dolor amet sed quam vitae</a>
                    </li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque, vulputate </a>
                    </li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="#" data-toggle="modal" data-target="#myModal">Dolor amet sed quam vitae</a>
                    </li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque, vulputate </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 footer_grid">
                <h3>Contact Info</h3>
                <ul class="address">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo e($systems->location); ?></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"><?php echo e($systems->email); ?></a></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo e($systems->phone); ?></li>
                </ul>
            </div>
            <div class="col-md-3 footer_grid ">
                <h3>Sign up for our Newsletter</h3>
                <p>Get Started For Free</p>
                <div class="footer_grid_right">

                    <form action="#" method="post">
                        <input type="email" name="Email" placeholder="Email Address..." required="">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>

        </div>
    </div>
    <div class="footer_wthree_agile">
        <p>© <?php echo e($systems->year); ?>  <?php echo e($systems->name); ?> . All rights reserved | Design by <a href="#"><?php echo e($systems->name); ?></a></p>
    </div>
    <!-- //footer -->
    <!-- bootstrap-modal-pop-up -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo e($systems->name); ?>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div>
                    <div class="modal-body">
                        <img src="images/g7.jpg" alt=" " class="img-responsive" />
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem 
                            vel eum iure reprehenderit qui in ea voluptate velit 
                            esse quam nihil molestiae consequatur, vel illum qui 
                            dolorem eum fugiat quo voluptas nulla pariatur.
                            <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
                                esse quam nihil molestiae consequatur.</i></p>
                    </div>
            </div>
        </div>
    </div>
<!-- //bootstrap-modal-pop-up --> 

    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script>
        $('ul.dropdown-menu li').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    </script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html> 