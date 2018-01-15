<?php $__env->startSection('contant'); ?>
<?php
//dd(4564356436);
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>

<div class="row">
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">
            <?php
            if (isset($details->newsid)) {
                $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                        ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                        ->where('boi_news.newsid', $details->newsid)
                        ->get();
                foreach ($MebuId as $adsmenuId) {
                    $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 1], ['status', 1]])->get();
                    foreach ($ads_display as $row) {
                        ?>
                        <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                            <a href=" <?php echo $row->url;?> ">
                                <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                     style="width: 100%;"/>
                            </a>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>

        <div class="row">


            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <?php
                    if (isset($details->newsid)) {
                        $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                ->where('boi_news.newsid', $details->newsid)
                                ->get();
                        foreach ($MebuId as $adsmenuId) {
                            $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 2], ['status', 1]])->get();
                            foreach ($ads_display as $row) {
                                ?>
                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                    <a href=" <?php echo $row->url;?> ">
                                        <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                             style="width: 100%;"/>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>

                <article class="post single-post">
                    <?php if($details->news_image!=''): ?>
                    <div>
                        <img src="<?php echo e(URL::asset('uploads/news/'.$details->news_image)); ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="post_content_nws_dtls">
                        <div class="post-header">
                            <?php
                            $pex = explode(' ', $details->newscreatetime);
                            $pviewdate = $pex[0] . ' ' . $pex[1] . ' ' . $pex[2];

                            $pext = explode(':', $pex[3]);
                            $pviewtime = $pext[0] . ':' . $pext[1];

                            $pcdate = str_replace($engtime, $bangtime, $pviewdate);
                            $pctime = str_replace($engtime, $bangtime, $pviewtime);


                            // ---------------------------------------
                            $ex = explode(' ', $details->newsupdatetime);
                            $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                            $ext = explode(':', $ex[3]);
                            $viewtime = $ext[0] . ':' . $ext[1];

                            $cdate = str_replace($engtime, $bangtime, $viewdate);
                            $ctime = str_replace($engtime, $bangtime, $viewtime);
                            ?>
                            <div class="col-md-12" style="margin-left: -15px;">

                                <?php if ($details->news_sub_title_1) { ?>
                                    <h4 style="font-size: 18px; font-weight: normal; text-align: left; color: #525252;">
                                        <?php echo $details->news_sub_title_1; ?>
                                    </h4>
                                <?php } ?>


                                <h2 style="font-size: 20px; font-weight: bold;">
                                    <?php echo $details->newstitle; ?>
                                </h2>


                                <?php if ($details->news_sub_title_2) { ?>
                                    <h4 style="font-size: 18px; font-weight: normal; text-align: left; margin-top: -10px; color: #525252;">
                                        <?php echo $details->news_sub_title_2; ?>
                                    </h4>
                                <?php } ?>

                            </div>
                            <div class="col-md-12"
                                 style="font-size: 16px; font-weight: bold;     border-bottom: 1px dotted #b7b7b7;    border-top: 1px dotted #b7b7b7; margin-bottom: 15px;">
                                <span class="pull-left"
                                      style="margin-left: -15px;color: #525252;"> প্রকাশিত: <?php echo $pctime; ?>
                                    , <?php echo $pcdate; ?></span>


                                <span class="pull-right" style="color: #525252;"> আপডেট: <?php echo $ctime; ?>
                                    , <?php echo $cdate; ?></span>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?php
                                    $dataval = $details->newsdetails;

                                    if (strpos($details->newsdetails, 'iframe')) {
                                        $val = str_replace('boishakhi', 'iframe', $details->newsdetails);
                                        echo $val;
                                    } else {
                                        echo $dataval;
                                    }
                                    ?>

                                </p>
                                <p>
                                    <?php
                                    if ($details->youtube != '') {
                                        $youtubeurl = $details->youtube;
                                        $matchlink;
                                        if (preg_match("/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/", $youtubeurl, $matchlink)) {

                                            if ($matchlink[1] == 'youtube.com') {
                                                $newLink = 'https://www.youtube.com/embed/' . $matchlink[4];
                                                ?>
                                                <iframe width="100%" height="500" src="<?php echo e($newLink); ?>" frameborder="0"
                                                        allowfullscreen></iframe>
                                                        <?php
                                                    } elseif ($matchlink[1] == 'youtu.be') {
                                                        $newLink = 'https://www.youtube.com/embed/' . $matchlink[4];
                                                        ?>
                                                <iframe width="100%" height="500" src="<?php echo e($newLink); ?>" frameborder="0"
                                                        allowfullscreen></iframe>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>


                                </p>


                                <?php
                                $sbuzz_topic = $details->newstitle;
                                $t = str_replace(' ', '-', $sbuzz_topic);
                                $t = str_replace(',', '', $t);
                                $page_name = 'news-details';

                                $sbid0 = $details->newsid;

                                //$sbid0='id='.$details_news[0]->n_id.'&'.'cat_id='.$cat_id;
                                $sbuzz_description0 = $details->newsdetails;
                                $sbuzz_image = URL::asset('uploads/news/' . $details->news_image);


                                $title_0 = urlencode($sbuzz_topic);
                                $title_1 = urlencode($sbuzz_topic);
                                $url_0 = urlencode(URL('/' . $page_name . '/' . $sbid0));
                                $summary_0 = urlencode($sbuzz_description0);
                                $image_0 = urlencode($sbuzz_image);

                                //$url_00=URL.$page_name.'/'.$sbid0;
                                //echo $url_0;
                                if (sizeof($categories)) {
                                    $newsslug = strip_tags($categories->menutitle);

                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                }
                                ?>

                                <?php
                                $weburl = "www.boishakhionline.com/" . $details->newsid . "/" . $t;
                                $imag_url = "www.boishakhionline.com/uploads/news/" . $details->news_image;

                                //print_r($imag_url);
                                ?>

                                <meta property="og:url"  content="<?php echo e($weburl); ?>" />
                                <meta property="og:type"          content="boishakhionline" />
                                <meta property="og:description"   content="<?php echo e($details - > newsseodetails); ?>" />
                                <meta property="og:title"   content="<?php echo e($details - > newsseotitle); ?>" />
                                <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
                                <!-- 
                                
                                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2F<?php echo e($weburl); ?>&layout=button&size=small&mobile_iframe=true&appId=120300978643881&width=59&height=20" width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                
                                -->

                                <div class="single-post-meta" style="background: none; margin-top: -100px;padding: 0px">

                                    <ul class="meta-social pull-right">
                                        <li class="s-facebook">
                                            <a onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $weburl; ?>', 'share', 'toolbar=0,status=0,width=300,height=236');"
                                               href="JavaScript: void(0)"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="s-twitter">
                                            <a href="JavaScript: void(0)"
                                               onClick="window.open('http://twitter.com/share?text=<?php echo $title_0; ?>&nbsp;&nbsp;<?php echo $weburl; ?>', 'share', 'toolbar=0,status=0,width=300,height=236');"><i
                                                    class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="s-google-plus">
                                            <a href="JavaScript: void(0)"
                                               onClick="window.open('https://plus.google.com/share?url=<?php echo $weburl; ?>', 'share', 'toolbar=0,status=0,width=300,height=236')"><i
                                                    class="fa fa-google-plus"></i></a>
                                        </li>
                                        <!--<li class="s-heart"><a href=""><i class="fa fa-heart"></i></a></li>-->
                                    </ul>
                                    <ul class="pull-left">

                                        <?php if(Auth::guard('admin')->user()): ?> <li><a href="<?php echo e(url('/')); ?>/admin/user_post_edit/<?php echo e($details - > newsid); ?>" style="color: red"  class="btn btn-lg" style="width: 160px"><i class="fa fa-edit"> </i> আপডেট  [ by <?php echo e(Auth::guard('admin')->user()->name); ?> ]</a></li> <?php endif; ?>
                                        <?php if(Auth::guard('superadmin')->user()): ?><li><a href="<?php echo e(url('/')); ?>/superadmin/post-edit/<?php echo e($details - > newsid); ?>"  style="color: green" class="btn btn-lg" style="width: 160px"><i class="fa fa-edit"> </i> আপডেট  [ by Superadmin ]</a></li>  <?php endif; ?>

                                    </ul>
                                </div>


                                <div class="row">
                                    <?php
                                    if (isset($details->newsid)) {
                                        $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                                ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                                ->where('boi_news.newsid', $details->newsid)
                                                ->get();
                                        foreach ($MebuId as $adsmenuId) {
                                            $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 3], ['status', 1]])->get();
                                            foreach ($ads_display as $row) {
                                                ?>
                                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                                    <a href=" <?php echo $row->url;?> ">
                                                        <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                                             style="width: 100%;"/>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>

                            </div>









                            <?php if(sizeof($categories)): ?>
                            <div class="post-tag">
                                <!-- <a href="<?php echo e(URL('news/'.$categories->menuid.'/'.$newsslugfilter)); ?>"><?php echo e($categories->menutitle); ?></a> -->
                            </div>
                            <?php endif; ?>

                            


                        <!--<div class="single-post-me">
                            <div class="media">
                                <div class="media-left text-center">
                                    <a href=""> <img src="<?php echo e(URL::asset('frontend_source/assets/images/single-blog-me.jpg')); ?>" alt="" border="0" class="media-object img-circle"></a>
                              </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Khalil Uddin</a>
                                    </h4>
                                    <p class="comment-p">
                                        Nam liber tempor cum soluta nobis eleifend option congue nihil imoming id quod
                                        mazim placerat facer possim assum. Lorem ipsum dolor sit ctetuer adipiing elit,
                                        sed diam nonummy nibh.
                                    </p>
                                </div>
                            </div>
                        </div>-->


                    </div>
                </article>






                <div class="col-md-12">
                    <h2> এই সম্পর্কিত আরো খবর  </h2>
                    <div class="row">

                        <?php
                        $t = 0;
//echo $top_news;

                        if (sizeof($relatedpost) > 0) {
                            foreach ($relatedpost as $lastNews) {
                                $newsslug = strip_tags($lastNews->newstitle);
                                $newsslugfilter = str_replace(' ', '-', $newsslug);
                                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="row">
                                        <div class="cntnt_box">
                                            <article class="post list-post post-grid">
                                                <div class="post-thumb hidden">
                                                    <?php if($lastNews->news_image!=''): ?>
                                                    <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"><img
                                                            src="<?php echo e(URL::asset('uploads/news/'.$lastNews->news_image)); ?>"
                                                            class="grid_nws_img1" alt="" border="0"></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"
                                                       class="post-thumb-overlay text-center">
                                                        <div class="text-uppercase text-center"><i class="fa fa-search"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="post-content" style="height: 205px">
                                                    <div class="post-header">


                                                        <h4 style="font-size: 18px; font-weight: normal; text-align: left; min-height: 22px; margin-top: -5px;">
                                                            <?php if ($lastNews->news_sub_title_1) { ?>
                                                                <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"><?php echo $lastNews->news_sub_title_1; ?></a>
                                                            <?php } ?>
                                                        </h4>


                                                        <h2 style="font-size: 20px; font-weight: bold; min-height: 36px;">

                                                            <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"><?php echo $lastNews->newstitle; ?></a>
                                                        </h2>


                                                        <?php if ($lastNews->news_sub_title_2) { ?>
                                                            <h4 style="font-size: 18px; font-weight: normal; text-align: left;">
                                                                <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"><?php //echo $lastNews->news_sub_title_2;  ?></a>
                                                            </h4>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="entry-content">
                                                        <p>
                                                            <?php
                                                            $busRow = strip_tags($lastNews->newsdetails);
                                                            if (strlen($busRow) > 370) {
                                                                $stringCuth = substr($busRow, 0, 370);
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

                                                        <div class="title_3"><?php //echo $cdate; ?></div>

                                                    </div>
                                                </div>

                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>












                <!-- end post -->
                <div class="comment-area">
                    <div class="comment-heading">
                        <h3><?php echo $comments_count; ?> মন্তব্য </h3>
                    </div>

                    <?php
                    if (sizeof($post_comments) > 0) {
                        $i = 0;
                        foreach ($post_comments as $comments) {
                            ?>
                            <div class="single-comment">
                                <div class="media">
                                    <div class="media-left text-center">
                                        <img src="<?php echo e(URL::asset('backend_source/images/user.png')); ?>" alt="user-img"
                                             border="0" class="img-circle">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h3 class="text-uppercase"><?php echo e($comments - > name); ?> 
                                                <a href="#comments" onclick="reply('<?php echo $comments->cid; ?>')"
                                                   class="pull-right reply-btn">reply</a>
                                            </h3>
                                        </div>
                                        <span class="comment-date">
                                            <!-- 3 days ago-->
                                        </span>
                                        <p class="comment-p">
                                            <?php echo $comments->comment; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $id = $comments->cid;
                            $postReply = App\models\CommentsModel::where('replyid', $id)->where('active', '1')->orderBy('newsid', 'ASC')->get();
                            foreach ($postReply as $comments) {
                                ?>
                                <div class="single-comment single-comment-reply">
                                    <div class="media">
                                        <div class="media-left text-center">
                                            <img src="<?php echo e(URL::asset('backend_source/images/user.png')); ?>" alt="user-img"
                                                 border="0" class="img-circle">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h3 class="text-uppercase"><?php echo e($comments - > name); ?></h3>
                                            </div>
                                            <p class="comment-date">
                                                <!--2 days ago-->
                                            </p>
                                            <p class="comment-p">
                                                <?php echo $comments->comment; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            $i++;
                        }
                    }
                    ?>

                    <input type="hidden" name="replyid" id="replyid" value="0"/>
                    <div class="leave-comment"><!--leave comment-->
                        <h3 class="reply-heading">আপনার মতামত প্রকাশ করুন </h3>
                        <form class="form-horizontal contact-form" role="form" id="comments" name="studentForm"
                              method="post" action="" ng-app="mainApp" ng-controller="studentController">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="6" name="message" id="message"
                                              placeholder=" আপনার মতামত এখানে লিখুন " ng-model="message"
                                              required></textarea>
                                    <span style="color:red"
                                          ng-show="studentForm.message.$dirty && studentForm.message.$invalid">
                                        <span ng-show="studentForm.message.$error.required">Message is required.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name *" ng-model="name" required>
                                    <span style="color:red"
                                          ng-show="studentForm.name.$dirty && studentForm.name.$invalid">
                                        <span ng-show="studentForm.name.$error.required">Name is required.</span>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="E-mail *">
                                    <span style="color:red">
                                        <span ng-show="studentForm.email.$error.required">Email is</span>
                                    </span>
                                </div>
                            </div>
                            <button type="button" onclick="commentsSubmit()" class="btn send-btn"
                                    disabled="disabled"
                                    ng-disabled="studentForm.message.$invalid || studentForm.name.$invalid || studentForm.email.$invalid">
                                মন্তব্য প্রস্কাশ করুন
                            </button>
                            <input type="hidden" id="newsid" value="<?php echo e($details - > newsid); ?>"/>
                        </form>
                        <p id="msg_show" style="display:none">Your comment successfully submit. Waiting for admin
                            approval.</p>
                        <p class="email-alert">আপনার ইমেইল ঠিকানা প্রচার করা হবে না. প্রয়োজনীয় ক্ষেত্রগুলি চিহ্নিত
                            করা আছে *
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-3 col-sm-5">


                <div class="row">
                    <?php
                    if (isset($details->newsid)) {
                        $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                ->where('boi_news.newsid', $details->newsid)
                                ->get();
                        foreach ($MebuId as $adsmenuId) {
                            $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 8], ['status', 1]])->get();
                            foreach ($ads_display as $row) {
                                ?>
                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                    <a href=" <?php echo $row->url;?> ">
                                        <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                             style="width: 100%;"/>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>


                <div class="clearfix"></div>
                <!-- start sidebar -->
                <div class="sidebar">

                    <!-- end single widget -->
                    <aside class="widget"><!-- start single widget -->
                        <div class="social-share">
                            <h3 class="widget-title text-uppercase">Subscribe & Follow</h3>
                            <ul class="">
                                <li><a class="s-facebook" href="https://www.facebook.com/Boishakhimedia/"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="https://twitter.com/Boishakhimedia"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="https://www.google.com/+BoishakhiTvmedia"><i
                                            class="fa fa-google-plus"></i></a></li>
                            <!--<li><a class="s-linkedin" href=""><i class="fa fa-linkedin"></i></a></li>-->
                                <li><a class="s-youtube" href="http://www.youtube.com/boishakhitvbd"><i
                                            class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </aside><!-- end single widget -->


                    <div class="row">
                        <?php
                        if (isset($details->newsid)) {
                            $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                    ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                    ->where('boi_news.newsid', $details->newsid)
                                    ->get();
                            foreach ($MebuId as $adsmenuId) {
                                $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 9], ['status', 1]])->get();
                                foreach ($ads_display as $row) {
                                    ?>
                                    <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                        <a href=" <?php echo $row->url;?> ">
                                            <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                                 style="width: 100%;"/>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>


                    <aside class="widget news-letter" ng-app="mainAppSubs"><!-- start single widget -->
                        <h3 class="widget-title text-uppercase"> আপডেট পেতে সাথেই থাকুন</h3>
                        <p> আমাদের বিশেষ অফার, আপডেট এবং সর্বশেষ খবর পেতে সাবস্ক্রাইব করুন ।।</p>
                        <form action="#" name="sForm">
                            <input type="email" placeholder="Your e-mail" id="subscribe" name="subscribe"
                                   ng-model="subscribe" required>

                            <input type="button" value="Subscribe Now"
                                   class="text-uppercase text-center btn btn-subscribe" onclick="subscribeNews()">
                            <div id="sc_show"></div>
                        </form>
                    </aside><!-- end single widget -->


                    <div class="row">
                        <?php
                        if (isset($details->newsid)) {
                            $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                    ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                    ->where('boi_news.newsid', $details->newsid)
                                    ->get();
                            foreach ($MebuId as $adsmenuId) {
                                $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 10], ['status', 1]])->get();
                                foreach ($ads_display as $row) {
                                    ?>
                                    <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                        <a href=" <?php echo $row->url;?> ">
                                            <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                                 style="width: 100%;"/>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>


                    <aside class="widget p-post-widget">
                        <h3 class="widget-title text-uppercase"> সর্বশেষ খবর </h3>

                        <?php
                        $n = 0;
                        if (sizeof($latest_news) > 0) {
                            foreach ($latest_news as $lastNews) {
                                if ($lastNews->news_image != '') {
                                    if ($n <= 3) {
                                        $newsslug = strip_tags($lastNews->newstitle);
                                        //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                        $newsslugfilter = str_replace(' ', '-', $newsslug);
                                        $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                        ?>
                                        <div class="popular-post">
                                            <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>" class="popular-img">
                                                <img src="<?php echo e(URL::asset('uploads/news/'.$lastNews->news_image)); ?>"
                                                     class="side_nw_pix_img" alt="" border="0">
                                                <div class="p-overlay"></div>
                                            </a>
                                            <div class="p-content">
                                                <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"><?php echo e($lastNews - > newstitle); ?></a>
                                                <span class="p-date">
                                                    <?php
                                                    $ex = explode(' ', $lastNews->newsupdatetime);
                                                    $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                                                    echo $cdate = str_replace($engtime, $bangtime, $viewdate);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                $n++;
                            }
                        }
                        ?>

                    </aside>
                    <div class="row">
                        <?php
                        if (isset($details->newsid)) {
                            $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                    ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                    ->where('boi_news.newsid', $details->newsid)
                                    ->get();
                            foreach ($MebuId as $adsmenuId) {
                                $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 11], ['status', 1]])->get();
                                foreach ($ads_display as $row) {
                                    ?>
                                    <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                        <a href=" <?php echo $row->url;?> ">
                                            <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                                 style="width: 100%;"/>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>

                    <aside class="widget"><!-- start single widget -->
                        <h3 class="widget-title text-uppercase">সর্বাধিক পঠিত খবর</h3>

                        <?php
                        if (sizeof($popular) > 0) {
                            foreach ($popular as $lastNews) {
                                $newsslug = strip_tags($lastNews->newstitle);
                                //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                $newsslugfilter = str_replace(' ', '-', $newsslug);
                                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                ?>
                                <div class="thumb-latest-posts">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"
                                               class="popular-img">
                                                <img src="<?php echo e(URL::asset('uploads/news/'.$lastNews->news_image)); ?>"
                                                     class="last_nws_img" alt="" border="0">
                                                <div class="p-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="p-content">
                                            <h3>
                                                <a href="<?php echo e(URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)); ?>"><?php echo e($lastNews - > newstitle); ?></a>
                                            </h3>
                                            <span class="p-date">
                                                <?php
                                                $ex = explode(' ', $lastNews->newsupdatetime);
                                                $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                                                echo $cdate = str_replace($engtime, $bangtime, $viewdate);
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </aside>

                    <div class="row">
                        <?php
                        if (isset($details->newsid)) {
                            $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
                                    ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                    ->where('boi_news.newsid', $details->newsid)
                                    ->get();
                            foreach ($MebuId as $adsmenuId) {
                                $ads_display = DB::table('boi_ads')->where([ ['categorie_id', $adsmenuId->menuid], ['positioning', 12], ['status', 1]])->get();
                                foreach ($ads_display as $row) {
                                    ?>
                                    <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                        <a href=" <?php echo $row->url;?> ">
                                            <img src="<?php echo e(URL::asset('uploads/ads/'.$row->image)); ?>" class="img img-responsive"
                                                 style="width: 100%;"/>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>


                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.fontend_mastar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>