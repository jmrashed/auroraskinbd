@extends('frontend.fontend_mastar')
@section('contant')
<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>

<div class="row" >
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <!-- start post -->
                <article class="post single-post">
                    @if($details->news_image!='')
                    <div>
                        <img src="{{ URL::asset('uploads/news/'.$details->news_image)}}" alt="">
                    </div>
                    @endif
                    <div class="post_content_nws_dtls">
                        <div class="post-header">
                            <?php
                            $ex = explode(' ', $details->newsupdatetime);
                            $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                            $ext = explode(':', $ex[3]);
                            $viewtime = $ext[0] . ':' . $ext[1];

                            $cdate = str_replace($engtime, $bangtime, $viewdate);
                            $ctime = str_replace($engtime, $bangtime, $viewtime);
                            ?>
                            <h2>{{$details - > newstitle}}<span class="pull-right"> আপডেট: <?php echo $ctime; ?>, <?php echo $cdate; ?></span></h2>
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
                                            <iframe width="100%" height="500" src="{{$newLink}}" frameborder="0" allowfullscreen></iframe>
                                            <?php
                                        } elseif ($matchlink[1] == 'youtu.be') {
                                            $newLink = 'https://www.youtube.com/embed/' . $matchlink[4];
                                            ?>
                                            <iframe width="100%" height="500" src="{{$newLink}}" frameborder="0" allowfullscreen></iframe>
                                            <?php
                                        }
                                    }
                                }
                                ?>




                                <?php
                                if (sizeof($advertizing9) > 0) {
                                    if ($advertizing9[0]->type == 'Image') {
                                        if ($advertizing9[0]->image != '') {
                                            ?>
                                        <div class="col-md-12" style="text-align:center">
                                            <div class="row">
                                                <a href=" @php echo $advertizing9[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing9[0]->image)}}" class="top_ad_2"/></a>



                                            </div>
                                            <p>&nbsp;</p>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <!----------------------------- ADS POSITIONING-9 CODE HERE BELOW --------------------------------->



                                    <?php
                                }
                            }
                            ?>




                            </p>


                        </div>
                        <?php
                        $sbuzz_topic = $details->newstitle;
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

                        @if(sizeof($categories))
                        <div class="post-tag">
                            <a href="{{URL('news/'.$categories - > menuid.'/'.$newsslugfilter)}}">{{$categories - > menutitle}}</a>
                        </div>
                        @endif

                        {{-- 	<div class="pubname">
                       		<h5> Publisher : <span> @if($publisher) {{ $publisher->name }} @else SuperAdmin @endif </span> </h5>
                    </div> --}}


                    <div class="single-post-meta">
                        <ul class="meta-profile pull-left">
                            @if(sizeof($categories))
                            <li><a href="{{URL('news/'.$categories - > menuid.'/'.$newsslugfilter)}}"><i class="fa fa-arrow-circle-o-right"></i> {{$categories - > menutitle}} </a></li>
                            @endif
                            <!--<li><a href=""><i class="fa fa-arrow-circle-o-right"></i>অগ্নিকাকাণ্ড</a></li>-->
                        </ul>
                        <ul class="meta-social pull-right">
                            <li class="s-facebook">
                                <a onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_0; ?>', 'share', 'toolbar=0,status=0,width=300,height=236');" href="JavaScript: void(0)"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="s-twitter">
                                <a href="JavaScript: void(0)" onClick="window.open('http://twitter.com/share?text=<?php echo $title_0; ?>&nbsp;&nbsp;<?php echo $url_0; ?>', 'share', 'toolbar=0,status=0,width=300,height=236');"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="s-google-plus">
                                <a href="JavaScript: void(0)" onClick="window.open('https://plus.google.com/share?url=<?php echo $url_0; ?>', 'share', 'toolbar=0,status=0,width=300,height=236')" ><i class="fa fa-google-plus"></i></a>
                            </li>
                            <!--<li class="s-heart"><a href=""><i class="fa fa-heart"></i></a></li>-->
                        </ul>
                    </div>
                    <!--<div class="single-post-me">
                        <div class="media">
                            <div class="media-left text-center">
                                <a href=""> <img src="{{ URL::asset('frontend_source/assets/images/single-blog-me.jpg') }}" alt="" border="0" class="media-object img-circle"></a>
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



            <!-- end post -->
            <div class="comment-area">
                <div class="comment-heading">
                    <h3><?php echo $comments_count; ?> Thoughts</h3>
                </div>

                <?php
                if (sizeof($post_comments) > 0) {
                    $i = 0;
                    foreach ($post_comments as $comments) {
                        ?>
                        <div class="single-comment">
                            <div class="media">
                                <div class="media-left text-center">
                                    <img src="{{ URL::asset('backend_source/images/user.png') }}" alt="user-img" border="0" class="img-circle">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3 class="text-uppercase">{{$comments - > name}} <a href="#comments" onclick="reply('<?php echo $comments->cid; ?>')" class="pull-right reply-btn">reply</a>
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
                                        <img src="{{ URL::asset('backend_source/images/user.png') }}" alt="user-img" border="0" class="img-circle">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h3 class="text-uppercase">{{$comments - > name}}</h3>
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

                <input type="hidden" name="replyid" id="replyid" value="0" />
                <div class="leave-comment"><!--leave comment-->
                    <h3 class="reply-heading">Leave a Thought</h3>
                    <form class="form-horizontal contact-form" role="form" id="comments" name="studentForm" method="post" action="" ng-app = "mainApp" ng-controller = "studentController">
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="6" name="message" id="message" placeholder="Join the discussion" ng-model="message" required></textarea>
                                <span style = "color:red" ng-show = "studentForm.message.$dirty && studentForm.message.$invalid">
                                    <span ng-show = "studentForm.message.$error.required">Message is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name *" ng-model="name" required>
                                <span style = "color:red" ng-show = "studentForm.name.$dirty && studentForm.name.$invalid">
                                    <span ng-show = "studentForm.name.$error.required">Name is required.</span>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control"  name="email" placeholder="E-mail *">
                                <span style = "color:red">
                                    <span ng-show = "studentForm.email.$error.required">Email is</span>
                                </span>
                            </div>
                        </div>
                        <button type="button" onclick="commentsSubmit()" class="btn send-btn" disabled="disabled" ng-disabled = "studentForm.message.$invalid || studentForm.name.$invalid || studentForm.email.$invalid">Submit Comment</button>
                        <input type="hidden" id="newsid" value="{{$details - > newsid}}" />
                    </form>
                    <p id="msg_show" style="display:none">Your comment successfully submit. Waiting for admin approval.</p>
                    <p class="email-alert">Your email address will not be published. Required fields are marked
                        *</p>
                </div>
            </div>     

        </div>

        <div class="col-md-3 col-sm-5">

            <?php
            if (sizeof($advertizing8) > 0) {
                if ($advertizing8[0]->type == 'Image') {
                    if ($advertizing8[0]->image != '') {
                        ?>
                        <div class="col-md-12" id="dads">
                            <div class="row">
                                <div class="gogl_ad_area">
                                    <a href=" @php echo $advertizing8[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing8[0]->image)}}" class="top_ad_3"/></a>


                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="gogl_ad_area">
                                <!----------------------------- ADS POSITIONING-8 CODE HERE --------------------------------->
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

            <div class="clearfix"></div>
            <!-- start sidebar -->
            <div class="sidebar">

                <!-- end single widget -->
                <aside class="widget"><!-- start single widget -->
                    <div class="social-share">
                        <h3 class="widget-title text-uppercase">Subscribe & Follow</h3>
                        <ul class="">
                            <li><a class="s-facebook" href="https://www.facebook.com/Boishakhimedia/"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="s-twitter" href="https://twitter.com/Boishakhimedia"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="s-google-plus" href="https://www.google.com/+BoishakhiTvmedia"><i class="fa fa-google-plus"></i></a></li>
                            <!--<li><a class="s-linkedin" href=""><i class="fa fa-linkedin"></i></a></li>-->
                            <li><a class="s-youtube" href="http://www.youtube.com/boishakhitvbd"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside><!-- end single widget -->
                <aside class="widget news-letter" ng-app = "mainAppSubs"><!-- start single widget -->
                    <h3 class="widget-title text-uppercase">Stay updated</h3>
                    <p>Subscribe to anewsletter and stay updated with our special offers and the latest free themes
                        released.</p>
                    <form action="#" name="sForm">
                        <input type="email" placeholder="Your e-mail" id="subscribe" name="subscribe" ng-model="subscribe" required>

                        <input type="button" value="Subscribe Now" class="text-uppercase text-center btn btn-subscribe" onclick="subscribeNews()">
                        <div id="sc_show"></div>
                    </form>
                </aside><!-- end single widget -->
                <aside class="widget p-post-widget">
                    <h3 class="widget-title text-uppercase">Latest Posts</h3>

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
                                        <a href="{{URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)}}" class="popular-img">
                                            <img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="side_nw_pix_img" alt="" border="0">
                                            <div class="p-overlay"></div>
                                        </a>
                                        <div class="p-content">
                                            <a href="{{URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)}}">{{$lastNews - > newstitle}}</a>
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
                <aside class="widget"><!-- start single widget -->
                    <h3 class="widget-title text-uppercase">Popular Posts</h3>

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
                                        <a href="{{URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)}}" class="popular-img">
                                            <img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="last_nws_img" alt="" border="0">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <h3><a href="{{URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)}}">{{$lastNews - > newstitle}}</a></h3>
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

                </aside><!-- end single widget -->
            </div>
            <!-- end sidebar -->
        </div>
    </div>
</div>
</div>

@endsection