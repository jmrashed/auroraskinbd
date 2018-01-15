@extends('frontend.fontend_mastar')
@section('contant')
<style type="text/css">
    .post-thumb:hover > a > img { 
        /*transform: none  !important;*/
    }
    .ads{
        padding-left:  15px;
        padding-right:  15px;
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>
<div class="row">
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">

            <?php if (sizeof($fronted_ads[1]) > 0) { ?>
                <div class="row ads"> 
                    <?php
                    if ($fronted_ads[1]->type == 'Image') {
                        if ($fronted_ads[1]->image != '') {
                            ?>
                            <center>
                                <a href=" @php echo $fronted_ads[1]->url;@endphp ">
                                    <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[1]->image)}}" class="img img-responsive" style="height:100px; width: 98%"/>
                                </a>
                            </center> 
                        <?php }
                    }
                    ?>
                </div>
<?php } ?>

            <div class="col-md-9 col-sm-7">

                    <?php if (sizeof($fronted_ads[2]) > 0) { ?>
                    <div class="row"> 
                        <?php
                        if ($fronted_ads[2]->type == 'Image') {
                            if ($fronted_ads[2]->image != '') {
                                ?>
                                <center>
                                    <a href=" @php echo $fronted_ads[2]->url;@endphp ">
                                        <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[2]->image)}}" class="img img-responsive" style="height:100px; width: 98%"/>
                                    </a>
                                </center> 
                            <?php }
                        }
                        ?>
                    </div>
<?php } ?>
                <div class="row" style="margin-top: 5px; padding: 10px">
                    <div class="archive-title" style="padding: 15px 30px; font-size: 22px;"><span class="archive-name">"{{$categories->menutitle}}"</span> ক্যাটেগরিতে ব্রাউজ করুন  </div>
                </div>


                <?php
                if (sizeof($all_category_news) > 0) {
                    $latest_one_news = $all_category_news[0];
                    $newsslug = strip_tags($latest_one_news->newstitle);
                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                    $newsslugfilter = str_replace(',', '', $newsslugfilter);
                    ?>
                    <article class="post">
                        <div class="post-thumb">
                            @if($latest_one_news->news_image!='')
                            <a href="{{URL('/'.$latest_one_news->newsid.'/'.$newsslugfilter)}}">
                                <img src="{{ URL::asset('uploads/news/'.$latest_one_news->news_image)}}" alt="" style="height: 470px;"></a>
                            @endif

                            <a href="{{URL('/'.$latest_one_news->newsid.'/'.$newsslugfilter)}}" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center"><i class="fa fa-search"></i></div>
                            </a>
                        </div>
                        <div class="post_content_nws_dtls">
                            <div class="post-header">
                                <h2><a href="{{URL('/'.$latest_one_news->newsid.'/'.$newsslugfilter)}}"><?php echo $latest_one_news->newstitle; ?></a> <span class="pull-right">
                                        <?php
                                        //$ex       = explode(' ',$lastNews->newsupdatetime);
                                        //$viewdate     = $ex[0].' '.$ex[1].' '.$ex[2];
                                        //echo $cdate = str_replace($engtime, $bangtime, $viewdate);
                                        ?>
                                    </span></h2>
                            </div>
                            <div class="entry-content">
                                <p>
                                    <?php
                                    $busRow = strip_tags($latest_one_news->newsdetails);
                                    if (strlen($busRow) > 900) {
                                        $stringCuth = substr($busRow, 0, 900);
                                        $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                    }
                                    echo $busRow;
                                    ?> 
                                </p>
                                <div class="continue-reading text-uppercase">
                                    <a href="{{URL('/'.$latest_one_news->newsid.'/'.$newsslugfilter)}}" class="more-link text-center"> বিস্তারিত  </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                }
                ?>







                <?php
                if (sizeof($all_category_news) > 0) {
                    $i = 1;
                    $j = 1;
                    foreach ($all_category_news as $lastNews) {
                        $j++;
                        if ($i == 1) {
                            $i++;
                            continue;
                        }
                        $newsslug = strip_tags($lastNews->newstitle);
                        $newsslugfilter = str_replace(' ', '-', $newsslug);
                        $newsslugfilter = str_replace(',', '', $newsslugfilter);
                        ?>

                        <div class="col-md-6">

                            <div class="post" style="border: 1px solid #b1b1b1; height: 560px; background: #eee;">
                                <div class="post-thumb">
                                    @if($lastNews->news_image!='')
                                    <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}">
                                        <img style="width: 100%; height: 220px;" src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" alt=""></a>
                                    @endif

                                    <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center"><i class="fa fa-search"></i></div>
                                    </a>
                                </div>
                                <div class="post_content_nws_dtls">
                                    <div class="post-header">
                                        <h2><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php echo $lastNews->newstitle; ?></a> <span class="pull-right">
                                                <?php
                                                //$ex 		= explode(' ',$lastNews->newsupdatetime);
                                                //$viewdate 	= $ex[0].' '.$ex[1].' '.$ex[2];
                                                //echo $cdate = str_replace($engtime, $bangtime, $viewdate);
                                                ?>
                                            </span></h2>
                                    </div>
                                    <div class="entry-content text-justify" >
                                        <p>
                                            <?php
                                            $busRow = strip_tags($lastNews->newsdetails);
                                            if (strlen($busRow) > 900) {
                                                $stringCuth = substr($busRow, 0, 900);
                                                $busRow = substr($stringCuth, 0, strrpos($stringCuth, ' ')) . '...';
                                            }
                                            echo $busRow;
                                            ?>	
                                        </p>
                                        <div class="continue-reading ">
                                            <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}" class="more-link text-center">  বিস্তারিত  </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <?php
                        if ($j == 4) {
                            if (sizeof($fronted_ads[3]) > 0) {
                                ?>
                                <div class="row ads"> 
                                    <?php
                                    if ($fronted_ads[3]->type == 'Image') {
                                        if ($fronted_ads[3]->image != '') {
                                            ?>
                                            <center>
                                                <a href=" @php echo $fronted_ads[3]->url;@endphp ">
                                                    <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[3]->image)}}" class="img img-responsive" style="height:100px; width: 98%"/>
                                                </a>
                                            </center> 
                                    <?php }
                                }
                                ?>
                                </div>
                                <?php
                            }
                        } else if ($j == 8) {
                            if (sizeof($fronted_ads[4]) > 0) {
                                ?>
                                <div class="row ads"> 
                                    <?php
                                    if ($fronted_ads[4]->type == 'Image') {
                                        if ($fronted_ads[4]->image != '') {
                                            ?>
                                            <center>
                                                <a href=" @php echo $fronted_ads[4]->url;@endphp ">
                                                    <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[4]->image)}}" class="img img-responsive" style="height:100px; width: 98%"/>
                                                </a>
                                            </center> 
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        } else if ($j == 12) {
                            if (sizeof($fronted_ads[5]) > 0) {
                                ?>
                                <div class="row ads"> 
                                    <?php
                                    if ($fronted_ads[5]->type == 'Image') {
                                        if ($fronted_ads[5]->image != '') {
                                            ?>
                                            <center>
                                                <a href=" @php echo $fronted_ads[5]->url;@endphp ">
                                                    <img src="{{ URL::asset('uploads/ads/'.$fronted_ads[5]->image)}}" class="img img-responsive" style="width: 98%"/>
                                                </a>
                                            </center> 
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                    }
                }
                ?>

                <div class="post-pagination text-center">
<?php
if (sizeof($all_category_news) > 0) {
    echo $all_category_news->links();
}
?>
                </div>

            </div>

            @include('frontend.other_page_rightside')
        </div>
    </div>
</div>
@endsection