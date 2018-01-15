@extends('frontend.fontend_mastar')
@section('contant')

<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>

<div class="col-md-12 cntnt_top_margin">
    <div class="row">
        <div class="col-md-9 col-sm-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <?php
                        $t = 0;
                        //echo $top_news;

                        if (sizeof($top_news) > 0) {
                            foreach ($top_news as $lastNews) {
                                if ($t <= 5) {
                                    //echo $lastNews->serial.'<br />';
                                    $newsslug = strip_tags($lastNews->newstitle);
                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                    if ($t == 3) {
                                        echo '<div class="clearfix"></div>';
                                    }
                                    ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="row">
                                            <div class="cntnt_box">
                                                <article class="post list-post post-grid">
                                                    <div class="post-thumb">
                                                        @if($lastNews->news_image!='')
                                                        <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="grid_nws_img1" alt="" border="0"></a>
                                                        @endif
                                                        <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}" class="post-thumb-overlay text-center">
                                                            <div class="text-uppercase text-center"><i class="fa fa-search"></i></div>
                                                        </a>
                                                    </div>
                                                    <div class="post-content" style="height: 225px">
                                                        <div class="post-header">


                                                            <h4 style="font-size: 18px; font-weight: normal; text-align: left; min-height: 22px;" >
                                                                <?php if ($lastNews->news_sub_title_1) { ?>
                                                                    <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php echo $lastNews->news_sub_title_1; ?></a> 
                                                                <?php } ?>
                                                            </h4>


                                                            <h2 style="font-size: 20px; font-weight: bold; min-height: 36px;">

                                                                <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php echo $lastNews->newstitle; ?></a> 
                                                            </h2>


                                                            <?php if ($lastNews->news_sub_title_2) { ?>
                                                                <h4 style="font-size: 18px; font-weight: normal; text-align: left;" ><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php //echo $lastNews->news_sub_title_2; ?></a> </h4>
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
                                $t++;
                            }
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!-- modified by jmrashed advertizing2 -->
                <?php
                if (sizeof($advertizing2) > 0) {
                    if ($advertizing2[0]->type == 'Image') {
                        if ($advertizing2[0]->image != '') {
                            ?> 
                            <div class="row row_padd_less" style="margin-bottom: 15px; margin-top: 15px">
                                <!-- <h1>2</h1> -->
                                <a href=" @php echo $advertizing2[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing2[0]->image)}}" style="width: 850px; height: 90px" /></a>

                            </div> 
                            <?php
                        }
                    } else {
                        ?>
                        <!----------------------------- ADS POSITIONING-2 CODE HERE BELOW --------------------------------->
                        <div class="col-md-12" style="text-align:center">
                            <div class="row row_padd_less">
                                <!--- CODE HERE ---->
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <!-- end modified -->



                <?php
                $n = 0;
                //echo sizeof($latest_news);
                if (sizeof($top_news) > 0) {
                    foreach ($top_news as $lastNews) {
                        if ($n > 5 && $n <= 10) {
                            $newsslug = strip_tags($lastNews->newstitle);
                            //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                            $newsslugfilter = str_replace(' ', '-', $newsslug);
                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                            //echo $lastNews->serial;
                            ?>
                            <div class="col-md-12 news_area bdr_btm">
                                <div class="row">
                                    @if($lastNews->news_image!='')
                                    <div class="col-md-3">

                                        <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="nws_rw_img1" alt="" border="0"></a>

                                    </div>
                                    @endif
                                    <div class="col-md-9">
                                        <div class="title_1" style="font-size: 18px; font-weight: bold;"><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php echo $lastNews->newstitle; ?></a></div>
                                        <div class="title_2">
                                            <?php
                                            $busRow = strip_tags($lastNews->newsdetails);
                                            if (strlen($busRow) > 400) {
                                                $stringCuth = substr($busRow, 0, 400);
                                                $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                            }
                                            echo $busRow;
                                            ?> 


                                            <?php
                                            $ex = explode(' ', $lastNews->newsupdatetime);
                                            $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                                            $cdate = str_replace($engtime, $bangtime, $viewdate);
                                            ?>
                                        </div>
                                        <div class="title_3"><?php echo $cdate; ?></div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        $n++;
                    }
                }
                ?>


                <!-- modified by jmrashed advertizing3-->
                <?php
                if (sizeof($advertizing3) > 0) {
                    if ($advertizing3[0]->type == 'Image') {
                        if ($advertizing3[0]->image != '') {
                            ?>
                            <div class="col-md-12" style="text-align:center">
                                <div class="row row_padd_less">
                                    <!-- <h1>3</h1> -->
                                    <a href=" @php echo $advertizing3[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing3[0]->image)}}"  style="width: 850px; height: 90px" /></a>

                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <!----------------------------- ADS POSITIONING-3 CODE HERE BELOW --------------------------------->
                        <div class="col-md-12" style="text-align:center">
                            <div class="row row_padd_less">
                                <!--- CODE HERE ---->
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <!-- end modified -->

                <?php
                $ns = 0;
                if (sizeof($top_news) > 0) {
                    foreach ($top_news as $lastNews) {
                        if ($ns > 10 && $ns <= 15) {

                            $newsslug = strip_tags($lastNews->newstitle);
                            //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                            $newsslugfilter = str_replace(' ', '-', $newsslug);
                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                            //echo $lastNews->serial;
                            ?>
                            <div class="col-md-12 news_area bdr_btm">
                                <div class="row">
                                    @if($lastNews->news_image!='')
                                    <div class="col-md-3">

                                        <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" class="nws_rw_img1" alt="" border="0"></a>

                                    </div>
                                    @endif
                                    <div class="col-md-9">
                                        <div class="title_1" style="font-size: 18px; font-weight: bold;"><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php echo $lastNews->newstitle; ?></a></div>
                                        <div class="title_2">

                                            <?php
                                            $busRow = strip_tags($lastNews->newsdetails);
                                            if (strlen($busRow) > 400) {
                                                $stringCuth = substr($busRow, 0, 400);
                                                $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                            }
                                            echo $busRow;
                                            ?>


                                            <?php
                                            $ex = explode(' ', $lastNews->newsupdatetime);
                                            $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                                            $cdate = str_replace($engtime, $bangtime, $viewdate);
                                            ?>
                                        </div>
                                        <div class="title_3"><?php echo $cdate; ?></div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        $ns++;
                    }
                }
                ?>   


                <?php
                if (sizeof($binodhon) > 0) {
                    ?>                       

                    <div class="col-md-12">
                        <!-- modified by jmrashed advertizing4 -->
                        <?php
                        if (sizeof($advertizing4) > 0) {
                            if ($advertizing4[0]->type == 'Image') {
                                if ($advertizing4[0]->image != '') {
                                    ?> 
                                    <div class="row row_padd_less" style="margin-bottom: 15px">
                                        <!-- <h1>4</h1> -->
                                        <a href=" @php echo $advertizing4[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing4[0]->image)}}"  style="width: 850px; height: 90px" /></a>

                                    </div> 
                                    <?php
                                }
                            } else {
                                ?>
                                <!----------------------------- ADS POSITIONING-2 CODE HERE BELOW --------------------------------->
                                <div class="col-md-12" style="text-align:center">
                                    <div class="row row_padd_less">
                                        <!--- CODE HERE ---->
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <!-- end modified -->
                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="title_4"><a href="{{URL('news/31/বিনোদন')}}" style="color:#3c86c8">বিনোদন</a></div>

                            <div class="gallery">
                                <div class="col-md-6 col-sm-6">
                                    <div class="col_pad_minimizer">
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                                <li data-target="#myCarousel" data-slide-to="3"></li>
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                <?php
                                                $countnews = 0;
                                                $active = 0;
                                                foreach ($binodhon as $binodhonactive) {
                                                    if ($binodhonactive->news_image != '') {
                                                        if ($countnews <= 3) {
                                                            $newsslug = strip_tags($binodhonactive->newstitle);
                                                            //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                                            $newsslugfilter = str_replace(' ', '-', $newsslug);
                                                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                                            ?>
                                                            <div class="item <?php if ($active == 0) { ?>active<?php } ?>">
                                                                <div class="single-gallery">
                                                                    <a href="{{URL('/'.$binodhonactive->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$binodhonactive->news_image)}}" alt="" border="0" class="gllery_img_big"></a>
                                                                    <div class="gl-overlay">
                                                                        <h2 class="gl-caption"><?php echo $binodhonactive->newstitle; ?></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        $countnews++;
                                                        $active++;
                                                    }
                                                }
                                                ?>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                $countnews = 0;
                                $active = 0;
                                foreach ($binodhon as $binodhonactive) {
                                    if ($binodhonactive->news_image != '') {
                                        if ($countnews > 3 && $countnews <= 4) {

                                            $newsslug = strip_tags($binodhonactive->newstitle);
                                            //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                            $newsslugfilter = str_replace(' ', '-', $newsslug);
                                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                            ?>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="col_pad_minimizer">
                                                    <div class="single-gallery">
                                                        <a href="{{URL('/'.$binodhonactive->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$binodhonactive->news_image)}}" alt="" border="0" class="gllery_img_big"></a>
                                                        <div class="gl-overlay">
                                                            <h2 class="gl-caption"><?php echo $binodhonactive->newstitle; ?></h2>
                                                        </div>
                                                    </div>

                                                </div>   
                                            </div>
                                            <?php
                                        }
                                        $countnews++;
                                        $active++;
                                    }
                                }
                                ?>


                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="gallery">
                                <div class="row">
                                    <?php
                                    $countnews = 0;
                                    $active = 0;
                                    foreach ($binodhon as $binodhonactive) {
                                        if ($binodhonactive->news_image != '') {
                                            if ($countnews > 4) {
                                                $newsslug = strip_tags($binodhonactive->newstitle);
                                                //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                                $newsslugfilter = str_replace(' ', '-', $newsslug);
                                                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                                ?>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="single-gallery">
                                                        <a href="{{URL('/'.$binodhonactive->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$binodhonactive->news_image)}}" alt="" border="0" class="gllery_img_small"></a>
                                                        <div class="gl-overlay">
                                                            <h2 class="gl-caption"><?php echo $binodhonactive->newstitle; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            $countnews++;
                                            $active++;
                                        }
                                    }
                                    ?>




                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>  

                <?php
                if (sizeof($video) > 0) {
                    ?>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="title_4"><a href="{{URL('news-video')}}" style="color:#3c86c8">ভিডিও</a></div>


                        </div>

                        <div class="row">
                            <div class="gallery">
                                <div class="row">

                                    <?php
                                    $countnews = 0;
                                    foreach ($video as $videoactive) {
                                        if ($videoactive->youtube != '') {

                                            if ($countnews <= 1) {

                                                $youtubeurl = $videoactive->youtube;
                                                $matchlink;
                                                if (preg_match("/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/", $youtubeurl, $matchlink)) {

                                                    if ($matchlink[1] == 'youtube.com' || $matchlink[1] == 'youtu.be') {
                                                        $newLink = 'https://www.youtube.com/embed/' . $matchlink[4];
                                                        ?>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="single-gallery">
                                                                <iframe width="100%" height="210" src="{{$newLink}}" frameborder="0" allowfullscreen></iframe>
                                                                <div class="gl-overlay">
                                                                    <!--<h2 class="gl-caption"><?php echo $videoactive->title; ?></h2>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>


                                                <?php
                                            } else {
                                                $youtubeurl = $videoactive->youtube;
                                                $matchlink;
                                                if (preg_match("/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/", $youtubeurl, $matchlink)) {

                                                    if ($matchlink[1] == 'youtube.com' || $matchlink[1] == 'youtu.be') {
                                                        $newLink = 'https://www.youtube.com/embed/' . $matchlink[4];
                                                        ?>
                                                        <div class="col-md-3 col-sm-6">
                                                            <div class="single-gallery">
                                                                <iframe width="100%" height="120" src="{{$newLink}}" frameborder="0" allowfullscreen></iframe>
                                                                <div class="gl-overlay">
                                                                    <!--<h2 class="gl-caption"><?php echo $videoactive->title; ?></h2>-->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                            }
                                            $countnews++;
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?> 

                <?php
                if (sizeof($gallery) > 0) {
                    ?>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="title_4"><a href="{{URL('albums-news')}}" style="color:#3c86c8">ছবি</a></div>

                        </div>

                        <div class="row">
                            <div class="gallery">
                                <div class="row">

                                    <?php
                                    foreach ($gallery as $binodhonactive) {
                                        $newsslug = strip_tags($binodhonactive->atitle);

                                        $newsslugfilter = str_replace(' ', '-', $newsslug);
                                        $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                        $p = 0;
                                        $lastPix = DB::table('boi_gallery')->where('type', $binodhonactive->id)->where('status', '1')->orderBy('id', 'DESC')->take(1)->first();
                                        if (sizeof($lastPix) > 0) {
                                            if ($p == 3) {
                                                print '<div class="clearfix"></div>';
                                                $p = 0;
                                            }
                                            ?>

                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-gallery">
                                                    <a href="{{URL('/news-gallery/'.$binodhonactive->id.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/gallery/'.$lastPix->image)}}" alt="" border="0" class="gllery_img_small"></a>
                                                    <div class="gl-overlay">
                                                        <h2 class="gl-caption"><?php echo $binodhonactive->atitle; ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        $p++;
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?> 

            </div>   

        </div>
























        <div class="col-md-3 col-sm-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <style type="text/css">
                            .current-temp .temp-value {
                                font-size: 3em !important;
                            }


                        </style>
                        <div class="ctgry_bx_pd_ad" style=" height:auto; margin-bottom: 10px">
                            <center>
                                <iframe src="https://www.meteoblue.com/en/weather/widget/daily/dhaka_bangladesh_1185241?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitationprobability=0&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups" style="width: 216px;height: 258px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/en/weather/forecast/week/dhaka_bangladesh_1185241?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank"></a></div>
                            </center>
                        </div> 
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
                            } else {
                                ?>
                                <!--- ADS POSITIONING-1 CODE HERE BELOW -->
                                <!-- <h1>ADS POSITIONING-1 CODE HERE BELOW</h1> -->





                                <?php
                            }
                        }
                        ?> 
                        <!-- end modified  -->
                    </div> 

                    <div class="ctgry_bx_pd_ad">
                        <div class="list-group" style="border: 1px solid red; min-height: 235px;">
                            <div class="title_5" style="background: red; color: white">সংবাদ উৎসব</div>
                            @if($newsevents)
                            @foreach($newsevents as $row)
                            <?php
                            $newsslug = strip_tags($row->newstitle);
                            $newsslugfilter = str_replace(' ', '-', $newsslug);
                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                            ?>
                            <li class="list-group-item">
                                <a href="{{URL('/'.$row->newsid.'/'.$newsslugfilter)}}"> 
                                    <i class="fa fa-newspaper-o" style="color: red"></i>  <?php echo $row->newstitle; ?></a>
                            </li>

                            @endforeach
                            @endif

                        </div>
                    </div>


                    <div class="ads8">
                        <!-- modified by jmrashed --> 
                        <?php
                        if (sizeof($advertizing8) > 0) {
                            if ($advertizing8[0]->type == 'Image') {
                                if ($advertizing8[0]->image != '') {
                                    ?>
                                    <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                        <!-- <h1>4</h1> -->
                                        <a href=" @php echo $advertizing8[0]->url;@endphp ">  
                                            <img src="{{ URL::asset('uploads/ads/'.$advertizing8[0]->image)}}" class="img img-responsive" style="height:100px; width: 265px;"/>
                                        </a>
                                    </div>

                                    <?php
                                }
                            } else {
                                ?>
                                <!--- ADS POSITIONING-1 CODE HERE BELOW -->
                                <!-- <h1>ADS POSITIONING-1 CODE HERE BELOW</h1> -->





                                <?php
                            }
                        }
                        ?> 
                        <!-- end modified  -->                                        
                    </div>


                    <div class="ctgry_bx_pd_ad_2">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">সর্বশেষ</a></li>
                            <li><a data-toggle="tab" href="#menu1">নির্বাচিত</a></li>
                            <!--<li><a data-toggle="tab" href="#menu2">মতামত</a></li>-->
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
                                                <!--<div class="media-left">
                                                <a href="{{URL('/'.$lastNews->newsid)}}" class="popular-img">
                                                <img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" alt="">
                                                <div class="p-overlay"></div>
                                                </a>
                                                
                                                </div>-->
                                                <div class="p-content">
                                                    <h3><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}">{{$lastNews->newstitle}}</a></h3>
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
                                                <!--<div class="media-left">
                                                <a href="{{URL('/'.$lastNews->newsid)}}" class="popular-img">
                                                <img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" alt="" border="0">
                                                <div class="p-overlay"></div>
                                                </a>
                                                
                                                </div>-->
                                                <div class="p-content">
                                                    <h3><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}">{{$lastNews->newstitle}}</a></h3>
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

                    <div class="ctgry_bx_pd_ad" style="margin-bottom: 10px; margin-top: 10px">


                        <div class="">
                            <a href="{{url('/')}}/news/rashifol/69/রাশিফল">   
                                <img src="{{url('/')}}/frontend_source/images/hb.jpg" style="width: 100%; height: auto;">  </a>
                        </div>


                    </div>



                    <?php
                    if (sizeof($bishesh_ayojon) > 0) {
                        ?>
                        <div class="ctgry_bx_pd_ad">
                            <div class="list-group">
                                <div class="title_5">আজকের বিশেষ আয়োজন</div>
                                <?php
                                foreach ($bishesh_ayojon as $bangladeshactive) {
                                    $newsslug = strip_tags($bangladeshactive->newstitle);
                                    //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                    ?>


                                    <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item"><i class="fa fa-chevron-right"></i>  {{$bangladeshactive->newstitle}}</a>

                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="ads9">
                        <!-- modified by jmrashed advertizing9-->
                        <?php
                        if (sizeof($advertizing9) > 0) {
                            if ($advertizing9[0]->type == 'Image') {
                                if ($advertizing9[0]->image != '') {
                                    ?>
                                    <div class="ctgry_bx_pd_ad" style="background:#eee; height:100px; margin-bottom: 10px">
                                        <!-- <h1>6</h1> -->
                                        <a href=" @php echo $advertizing9[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing9[0]->image)}}"  class="img img-responsive" style="height:100px; width:265px;"/></a>

                                    </div> 
                                    <?php
                                }
                            } else {
                                ?>
                                <!-- ADS POSITIONING-3 CODE HERE BELOW   -->
                                <div class="col-md-12" style="text-align:center">
                                    <div class="row row_padd_less">
                                        <!--- CODE HERE ---->
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <!-- end modified -->
                    </div>


                    <?php
                    if (sizeof($vote) > 0) {
                        foreach ($vote as $voteactive) {
                            $vid = $voteactive->id;
                            $totalVote = DB::table('election')->where('online_vote_id', $vid)->first();
                            if (sizeof($totalVote) > 0) {
                                $final = $totalVote->yes + $totalVote->no + $totalVote->noComments;
                            } else {
                                $final = 0;
                            }
                            ?>

                            <div class="ctgry_bx_pd_ad_2">
                                <div class="title_6">
                                    <span><img src="{{ URL::asset('frontend_source/assets/images/boishakhi_logo.jpg')}}"></span> অনলাইন জরিপ
                                </div>


                                <div class="ctgry_bx2">

                                    <div class="col-md-12 bdr_btm">
                                        <P>
                                            <?php echo $voteactive->title; ?>
                                            <input type="hidden" name="online_vote_id" id="online_vote_id" value="{{$voteactive->id}}">
                                        </P>
                                    </div>
                                    <div class="msg"></div>
                                    <div class="col-md-12 bdr_btm">
                                        <div class="row vote_area">
                                            <span class="vt_cnt_mrgn"><input name="votedone" value="1" type="radio">
                                                হ্যাঁ</span>
                                            <span class="vt_cnt_mrgn"><input name="votedone" value="2" type="radio">
                                                না</span>
                                            <span class="vt_cnt_mrgn"><input name="votedone" value="3" type="radio">
                                                মন্তব্য নেই</span>
                                            <span><button class="btn btn-default btn-sm" id="yesvote" type="button" onclick="yesvote()">ভোট দিন</button></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="vote_area">
                                                <div class="col-md-7 col-sm-7 col-xs-7 text-left">ভোটদাতা <span class="title_7">
                                                        <?php echo str_replace($engtime, $bangtime, $final); ?></span> জন </div>
                                                <div class="col-md-5 col-sm-5 col-xs-5">
                                                    <a href="{{URL('/result-vote')}}">
                                                        <button class="btn btn-default btn-sm" type="button">পুরোনো ফলাফল</button></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function yesvote()
                                {
                                    //alert('IN');

                                    var id = $("input[name=votedone]:checked").val();
                                    var online_vote_id = $('#online_vote_id').val();
                                    //var ip_address        = $('#ip_address').val();
                                    //alert(id);
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        method: "get",
                                        url: '{{url("/online_vote")}}',
                                        data: {
                                            id: id,
                                            online_vote_id: online_vote_id
                                                    //ip_address: ip_address
                                        }
                                    })
                                            .done(function (response)
                                            {
                                                //alert(response);
                                                if (response == 0)
                                                {
                                                    var sorry = "<div class='alert alert-danger'>আপনি এর আগেও একবার ভোট দিয়েছেন, তাই এই ভোটটি গৃহীত হলো না।</div>";
                                                } else
                                                {
                                                    var sorry = "<div class='alert alert-success'><strong>আপনার ভোটটি সম্পন্ন হয়েছে।</strong></div>";
                                                }
                                                $('.msg').html(sorry);
                                            });
                                }

                            </script>

                            <?php
                        }
                    }
                    ?>

                    <?php
                    if (sizeof($bangladesh) > 0) {
                        ?>
                        <div class="ctgry_bx_pd_ad_2">
                            <div class="list-group">
                                <div class="title_5">বাংলাদেশ</div>

                                <?php
                                $countbangladesh = 0;
                                foreach ($bangladesh as $bangladeshactive) {
                                    $newsslug = strip_tags($bangladeshactive->newstitle);
                                    //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                    if ($countbangladesh == 0) {
                                        ?>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <img class="side_nw_pix_img" src="{{ URL::asset('uploads/news/'.$bangladeshactive->news_image) }}"> 
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>


                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item">{{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item"><i class="fa fa-chevron-right"></i>  {{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    }
                                    $countbangladesh++;
                                }
                                ?>


                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- modified by jmrashed advertizing9--> 
                    <?php
                    if (sizeof($advertizing9) > 0) {
                        if ($advertizing9[0]->type == 'Image') {
                            if ($advertizing9[0]->image != '') {
                                ?>
                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                    <!-- <h1>8</h1> -->
                                    <a href=" @php echo $advertizing9[0]->url;@endphp ">  
                                        <img src="{{ URL::asset('uploads/ads/'.$advertizing9[0]->image)}}" class="img img-responsive" style="height:100px; width: 265px;"/>
                                    </a>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <!--- ADS POSITIONING-1 CODE HERE BELOW -->
                            <!-- <h1>ADS POSITIONING-1 CODE HERE BELOW</h1> -->





                            <?php
                        }
                    }
                    ?> 
                    <!-- end modified  -->

                    <?php
                    if (sizeof($world) > 0) {
                        ?>
                        <div class="ctgry_bx_pd_ad_2">
                            <div class="list-group">
                                <div class="title_5">বিশ্ব</div>
                                <?php
                                $countb = 0;
                                foreach ($world as $bangladeshactive) {
                                    $newsslug = strip_tags($bangladeshactive->newstitle);
                                    //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);


                                    if ($countb < 1) {
                                        ?>
                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <img src="{{ URL::asset('uploads/news/'.$bangladeshactive->news_image)}}" border="0" class="side_nw_pix_img"> 
                                                </div>
                                            </div></a>
                                        <div style="clear:both"></div>
                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item">{{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    } else {
                                        ?>

                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item"><i class="fa fa-chevron-right"></i>  {{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    }
                                    $countb++;
                                }
                                ?>


                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <?php
                    if (sizeof($sports) > 0) {
                        ?>
                        <div class="ctgry_bx_pd_ad_2">
                            <div class="list-group">
                                <div class="title_5">খেলাধুলা</div>
                                <?php
                                $countb = 0;
                                foreach ($sports as $bangladeshactive) {
                                    $newsslug = strip_tags($bangladeshactive->newstitle);
                                    //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                    if ($countb < 1) {
                                        if ($bangladeshactive->news_image != '') {
                                            //echo $bangladeshactive->news_image;
                                            ?>
                                            <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <img src="{{ URL::asset('uploads/news/'.$bangladeshactive->news_image) }}" border="0" class="side_nw_pix_img"> 
                                                    </div>
                                                </div>
                                            </a>
                                            <div style="clear:both"></div>
                                            <?php
                                        }
                                        ?>
                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item">{{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    } else {
                                        ?>


                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item"><i class="fa fa-chevron-right"></i>  {{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    }
                                    $countb++;
                                }
                                ?>


                            </div>
                        </div>
                        <?php
                    }
                    ?>



                    <?php
                    if (sizeof($health) > 0) {
                        ?>
                        <div class="ctgry_bx_pd_ad_2">
                            <div class="list-group">
                                <div class="title_5">স্বাস্থ্য</div>
                                <?php
                                $countb = 0;
                                foreach ($health as $bangladeshactive) {
                                    $newsslug = strip_tags($bangladeshactive->newstitle);
                                    //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                    if ($countb < 1) {
                                        ?>
                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <img src="{{ URL::asset('uploads/news/'.$bangladeshactive->news_image)}}" border="0" class="side_nw_pix_img"> 
                                                </div>
                                            </div></a>
                                        <div style="clear:both"></div>
                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item">{{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    } else {
                                        ?>


                                        <a href="{{URL('/'.$bangladeshactive->newsid.'/'.$newsslugfilter)}}" class="list-group-item"><i class="fa fa-chevron-right"></i>  {{$bangladeshactive->newstitle}}</a>
                                        <?php
                                    }
                                    $countb++;
                                }
                                ?>


                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="ctgry_bx_pd_ad_2">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBoishakhimedia%2F&tabs=timeline&width=1000&height=1000&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="100%" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">
                        </iframe>
                    </div>



                    <?php
                    //================================== ADS POSITIONING-4,516 START =========================
                    ?>


                    <!-- modified by jmrashed advertizing10--> 
                    <?php
                    if (sizeof($advertizing10) > 0) {
                        if ($advertizing10[0]->type == 'Image') {
                            if ($advertizing10[0]->image != '') {
                                ?>
                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                    <!-- <h1>8</h1> -->
                                    <a href=" @php echo $advertizing10[0]->url;@endphp ">  
                                        <img src="{{ URL::asset('uploads/ads/'.$advertizing10[0]->image)}}" class="img img-responsive" style="height:100px; width: 265px;"/>
                                    </a>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <!--- ADS POSITIONING-1 CODE HERE BELOW -->
                            <!-- <h1>ADS POSITIONING-1 CODE HERE BELOW</h1> -->





                            <?php
                        }
                    }
                    ?> 
                    <!-- end modified  -->   

                    <!-- modified by jmrashed advertizing11--> 
                    <?php
                    if (sizeof($advertizing11) > 0) {
                        if ($advertizing11[0]->type == 'Image') {
                            if ($advertizing11[0]->image != '') {
                                ?>
                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                    <!-- <h1>8</h1> -->
                                    <a href=" @php echo $advertizing11[0]->url;@endphp ">  
                                        <img src="{{ URL::asset('uploads/ads/'.$advertizing11[0]->image)}}" class="img img-responsive" style="height:100px; width: 265px;"/>
                                    </a>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <!--- ADS POSITIONING-1 CODE HERE BELOW -->
                            <!-- <h1>ADS POSITIONING-1 CODE HERE BELOW</h1> -->





                            <?php
                        }
                    }
                    ?> 
                    <!-- end modified  -->   

                    <!-- modified by jmrashed advertizing12--> 
                    <?php
                    if (sizeof($advertizing12) > 0) {
                        if ($advertizing12[0]->type == 'Image') {
                            if ($advertizing12[0]->image != '') {
                                ?>
                                <div class="ctgry_bx_pd_ad" style="height:100px; margin-bottom: 10px">
                                    <!-- <h1>8</h1> -->
                                    <a href=" @php echo $advertizing12[0]->url;@endphp ">  
                                        <img src="{{ URL::asset('uploads/ads/'.$advertizing12[0]->image)}}" class="img img-responsive" style="height:100px; width: 265px;"/>
                                    </a>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <!--- ADS POSITIONING-1 CODE HERE BELOW -->
                            <!-- <h1>ADS POSITIONING-1 CODE HERE BELOW</h1> -->





                            <?php
                        }
                    }
                    ?> 
                    <!-- end modified  -->   


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

