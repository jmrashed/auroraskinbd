<div class="col-md-3 col-sm-5">
    <?php
    $fronted_ads[1] = $advertizing1 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '1'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[2] = $advertizing2 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '2'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[3] = $advertizing3 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '3'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[4] = $advertizing4 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '4'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[5] = $advertizing5 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '5'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[6] = $advertizing6 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '6'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[7] = $advertizing7 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '7'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[8] = $advertizing8 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '8'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[9] = $advertizing9 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '9'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[10] = $advertizing10 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '10'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[11] = $advertizing11 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '11'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[12] = $advertizing12 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '12'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[13] = $advertizing13 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '13'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[14] = $advertizing14 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '14'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[15] = $advertizing15 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '15'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    $fronted_ads[16] = $advertizing16 = DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '16'], ['categorie_id', '1000']])->orderBy('id', 'DESC')->first();
    ?>
    <?php if (sizeof($fronted_ads[8]) > 0) { ?>
        <div class="row ads"> 
            <?php
            if ($fronted_ads[8]->type == 'Image') {
                if ($fronted_ads[8]->image != '') {
                    ?>
                    <center>
                        <a href=" @php echo $fronted_ads[8]->url;@endphp ">
                            <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[8]->image)}}" class="img img-responsive" style="height:100px; width: 100%"/>
                        </a>
                    </center> 
                <?php }
            }
            ?>
        </div>
<?php } ?>




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
                    <li><a class="s-twitter" href="https://twitter.com/Boishakhimedia"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a class="s-google-plus" href="https://www.google.com/+BoishakhiTvmedia"><i
                                class="fa fa-google-plus"></i></a></li>
                <!--<li><a class="s-linkedin" href=""><i class="fa fa-linkedin"></i></a></li>-->
                    <li><a class="s-youtube" href="http://www.youtube.com/boishakhitvbd"><i
                                class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </aside><!-- end single widget -->


            <?php if (sizeof($fronted_ads[9]) > 0) { ?>
            <div class="row ads"> 
                <?php
                if ($fronted_ads[9]->type == 'Image') {
                    if ($fronted_ads[9]->image != '') {
                        ?>
                        <center>
                            <a href=" @php echo $fronted_ads[9]->url;@endphp ">
                                <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[9]->image)}}" class="img img-responsive" style="height:100px; width: 100%"/>
                            </a>
                        </center> 
                    <?php }
                }
                ?>
            </div>
<?php } ?>



        <aside class="widget news-letter"><!-- start single widget -->
            <h3 class="widget-title text-uppercase">আপডেট পেতে সাথেই থাকুন </h3>
            <p>আমাদের বিশেষ অফার, আপডেট এবং সর্বশেষ খবর পেতে সাবস্ক্রাইব করুন ।। </p>
            <form action="#" name="studentForm" ng-app="mainApp" ng-controller="studentController">
                <input type="email" placeholder="Your e-mail" id="subscribe" name="subscribe" ng-model="subscribe"
                       required>
                <span style="color:red" ng-show="studentForm.subscribe.$dirty && studentForm.subscribe.$invalid">
                    <span ng-show="studentForm.subscribe.$error.required">Email is required.</span>
                </span>
                <input type="button" value="Subscribe Now" class="text-uppercase text-center btn btn-subscribe"
                       disabled="disabled" ng-disabled="studentForm.subscribe.$invalid" onclick="subscribeNews()">
                <div id="sc_show"></div>
            </form>
        </aside><!-- end single widget -->

            <?php if (sizeof($fronted_ads[10]) > 0) { ?>
            <div class="row ads"> 
                <?php
                if ($fronted_ads[10]->type == 'Image') {
                    if ($fronted_ads[10]->image != '') {
                        ?>
                        <center>
                            <a href=" @php echo $fronted_ads[10]->url;@endphp ">
                                <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[10]->image)}}" class="img img-responsive" style="height:100px; width: 100%"/>
                            </a>
                        </center> 
                <?php }
            }
            ?>
            </div>
<?php } ?>



        <aside class="widget p-post-widget">
            <h3 class="widget-title text-uppercase">সর্বশেষ খবর </h3>

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
                                    <img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="side_nw_pix_img" alt=""
                                         border="0">
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


            <?php if (sizeof($fronted_ads[11]) > 0) { ?>
            <div class="row ads"> 
                <?php
                if ($fronted_ads[11]->type == 'Image') {
                    if ($fronted_ads[11]->image != '') {
                        ?>
                        <center>
                            <a href=" @php echo $fronted_ads[11]->url;@endphp ">
                                <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[11]->image)}}" class="img img-responsive" style="height:100px; width: 100%"/>
                            </a>
                        </center> 
                <?php }
            }
            ?>
            </div>
<?php } ?>



        <aside class="widget"><!-- start single widget -->
            <h3 class="widget-title text-uppercase">সর্বাধিক পঠিত খবর </h3>

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
                                    <img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="last_nws_img"
                                         alt="" border="0">
                                    <div class="p-overlay"></div>
                                </a>
                            </div>
                            <div class="p-content">
                                <h3><a href="{{URL('/'.$lastNews - > newsid.'/'.$newsslugfilter)}}">{{$lastNews - > newstitle}}</a>
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

            <?php if (sizeof($fronted_ads[12]) > 0) { ?>
            <div class="row ads"> 
    <?php
    if ($fronted_ads[12]->type == 'Image') {
        if ($fronted_ads[12]->image != '') {
            ?>
                        <center>
                            <a href=" @php echo $fronted_ads[12]->url;@endphp ">
                                <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[12]->image)}}" class="img img-responsive" style="height:100px; width: 100%"/>
                            </a>
                        </center> 
        <?php }
    }
    ?>
            </div>
<?php } ?>




        <!-- end single widget -->

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