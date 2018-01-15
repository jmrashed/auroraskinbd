<?php $__env->startSection('contant'); ?>  


<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');



$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>



<div class="row cntnt_top_margin">
    <div class="col-md-9 col-sm-7 col-xs-12">
        <?php
        $t = 0;
        if (sizeof($top_news) > 0) {
            foreach ($top_news as $lastNews) {
                if ($t <= 5) {
                    $newsslug = strip_tags($lastNews->newstitle);
                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                    $newsslugfilter = str_replace(',', '', $newsslugfilter);
                    if ($t == 3) {
                        echo '<div class="clearfix"></div>';
                    }
                    ?>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="cntnt_box">
                                <article class="post list-post post-grid" style="margin-bottom: 5px !important">
                                    <div class="post-thumb">
                                        <?php if($lastNews->news_image!=''): ?>
                                        <a href="<?php echo e(URL('/'.$lastNews->newsid.'/'.$newsslugfilter)); ?>"><img
                                                src="<?php echo e(URL::asset('uploads/news/'.$lastNews->news_image)); ?>"
                                                class="grid_nws_img1" alt="" border="0"></a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(URL('/'.$lastNews->newsid.'/'.$newsslugfilter)); ?>"
                                           class="post-thumb-overlay text-center">
                                            <div class="text-up
                                                 case text-center"><i class="fa fa-search"></i></div>
                                        </a>
                                    </div>

                                    <div class="post-content" style="height: 170px;">
                                        <div class="post-header">
                                            <?php if ($lastNews->news_sub_title_1) { ?>
                                                <p class=""  style="margin: 0 0 0px;">
                                                    <a href="<?php echo e(URL('/'.$lastNews->newsid.'/'.$newsslugfilter)); ?>"><?php echo $lastNews->news_sub_title_1; ?></a>
                                                </p>
                                            <?php } ?>

                                            <p class="newstitle" style="margin: 0 0 0px;">
                                                <a href="<?php echo e(URL('/'.$lastNews->newsid.'/'.$newsslugfilter)); ?>"><?php echo $lastNews->newstitle; ?></a>
                                            </p>

                                        </div>


                                        <p>
                                            <?php
                                            $busRow = strip_tags($lastNews->newsdetails);
                                            if (strlen($busRow) > 240) {
                                                $stringCuth = substr($busRow, 0, 140);
                                                $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                            }
                                            echo $busRow;
                                            ?>
                                        </p>

                                        <?php
                                        $ex = explode(' ', $lastNews->newsupdatetime);
                                        $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];
                                        $cdate = str_replace($engtime, $bangtime, $viewdate);
                                        ?>


                                    </div>


                                </article>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                $t++;
            }
        }
        ?>

        <div class="clearfix"></div>

        






    </div>


    <div class="col-md-3 col-sm-5 " style="padding-left: 7px;" style="dispaly:none">

 


        <div class="row ads ">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Recent </a></li>
                <li><a data-toggle="tab" href="#menu1">Selected </a></li>
            </ul>
            <div class="tab-content tab_customzd">
                <div id="home" class="tab-pane fade in active">


                    <?php
                    $n = 0;

                    if (sizeof($latest) > 0) {

                        foreach ($latest as $lastNews) {

                            $newsslug = strip_tags($lastNews->newstitle);

                            //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));



                            $newsslugfilter = str_replace(' ', '-', $newsslug);

                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                            ?>

                            <div class="thumb-latest-posts tav_dividr">

                                <div class="media"> 

                                    <div class="p-content">

                                        <h3>
                                            <a href="<?php echo e(URL('/'.$lastNews->newsid.'/'.$newsslugfilter)); ?>"><?php echo e($lastNews->newstitle); ?></a>
                                        </h3>

                                        <span>

                                            <?php
                                            $busRow = strip_tags($lastNews->newsdetails);

                                            if (strlen($busRow) > 100) {

                                                $stringCuth = substr($busRow, 0, 100);

                                                $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                            }

                                            echo $busRow;
                                            ?>

                                        </span>

                                    </div>

                                </div>

                            </div>

                            <?php
                            $n++;
                        }
                    }
                    ?>


                </div>







                <div id="menu1" class="tab-pane fade">

                    <?php
                    $n = 0;

                    if (sizeof($nirbachito) > 0) {

                        foreach ($nirbachito as $lastNews) {

                            $newsslug = strip_tags($lastNews->newstitle);

                            //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));



                            $newsslugfilter = str_replace(' ', '-', $newsslug);

                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                            ?>

                            <div class="thumb-latest-posts tav_dividr">

                                <div class="media"> 

                                    <div class="p-content">

                                        <h3>
                                            <a href="<?php echo e(URL('/'.$lastNews->newsid.'/'.$newsslugfilter)); ?>"><?php echo e($lastNews->newstitle); ?></a>
                                        </h3>

                                        <span>

                                            <?php
                                            $busRow = strip_tags($lastNews->newsdetails);

                                            if (strlen($busRow) > 100) {

                                                $stringCuth = substr($busRow, 0, 100);

                                                $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                            }

                                            echo $busRow;
                                            ?>

                                        </span>

                                    </div>

                                </div>

                            </div>

                            <?php
                            $n++;
                        }
                    }
                    ?>

                </div>

                <div id="menu2" class="tab-pane fade">

                    <!--<h3>Menu 2</h3>

                    <p>Some content in menu 2.</p>-->

                </div>

            </div>


        </div>


    </div>
</div>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.fontend_mastar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>