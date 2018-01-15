<div class="col-md-3 col-sm-5">
    <?php if ($categories->menutitle == 'শিক্ষা') { ?> 

        <div class="ads7">
            <!-- modified by jmrashed advertizing7--> 
            <?php
            if (sizeof($advertizing7) > 0) {
                if ($advertizing7[0]->type == 'Image') {
                    if ($advertizing7[0]->image != '') {
                        ?>
                        <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                            <!-- <h1>3</h1> -->
                            <a href=" @php echo $advertizing7[0]->url;@endphp ">  
                                <img src="{{ URL::asset('uploads/ads/'.$advertizing7[0]->image)}}" class="img img-responsive" style="height:100px; width: 265px;"/>
                            </a>
                        </div>

                        <?php
                    }
                }
            }
            ?> 
            <!-- end modified  -->
        </div> 
    <?php } ?>


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
        <aside class="widget news-letter"><!-- start single widget -->
            <h3 class="widget-title text-uppercase">Stay updated</h3>
            <p>Subscribe to anewsletter and stay updated with our special offers and the latest free themes
                released.</p>
            <form action="#" name="studentForm" ng-app = "mainApp" ng-controller = "studentController">
                <input type="email" placeholder="Your e-mail" id="subscribe" name="subscribe" ng-model="subscribe" required>
                <span style = "color:red" ng-show = "studentForm.subscribe.$dirty && studentForm.subscribe.$invalid">
                    <span ng-show = "studentForm.subscribe.$error.required">Email is required.</span>
                </span>
                <input type="button" value="Subscribe Now" class="text-uppercase text-center btn btn-subscribe" disabled="disabled" ng-disabled = "studentForm.subscribe.$invalid" onclick="subscribeNews()">
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
                            $newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

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
                    $newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

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

        <!--<aside class="widget category-post-no">
            <h3 class="widget-title text-uppercase">আরও সংবাদ</h3>
            <ul>
                <li>
                    <a href="">Food &amp; Drinks</a>
                    <span class="post-count pull-right"> 2</span>
                </li>
                <li>
                    <a href="">Travel</a>
                    <span class="post-count pull-right"> 4</span>
                </li>
                <li>
                    <a href="">Business</a>
                    <span class="post-count pull-right"> 2</span>
                </li>
                <li>
                    <a href="">Story</a>
                    <span class="post-count pull-right"> 6</span>
                </li>
                <li>
                    <a href="">DIY &amp; Tips</a>
                    <span class="post-count pull-right"> 8</span>
                </li>
                <li>
                    <a href="">Lifestyle</a>
                    <span class="post-count pull-right"> 7</span>
                </li>
            </ul>
        </aside>-->

    </div>
    <!-- end sidebar -->
</div>