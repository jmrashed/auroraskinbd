@extends('frontend.fontend_mastar')
@section('contant')
<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>
<div class="row">
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="archive-title">Search by <span class="archive-name">{{$searchval}}</span></div>
                <!-- start post -->
                <?php
                if (sizeof($all_category_news) > 0) {
                    foreach ($all_category_news as $lastNews) {
                        $newsslug = strip_tags($lastNews->newstitle);
                        $newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

                        $newsslugfilter = str_replace(' ', '-', $newsslug);
                        $newsslugfilter = str_replace(',', '', $newsslugfilter);
                        ?>
                        <article class="post">
                            <div class="post-thumb">
                                @if($lastNews->news_image!='')
                                <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><img src="{{ URL::asset('uploads/news/'.$lastNews->news_image)}}" alt=""></a>
                                @endif

                                <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center"><i class="fa fa-search"></i></div>
                                </a>
                            </div>
                            <div class="post_content_nws_dtls">
                                <div class="post-header">
                                    <h2><a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}"><?php echo $lastNews->newstitle; ?></a> <span class="pull-right">
                                            <?php
                                            $ex = explode(' ', $lastNews->newsupdatetime);
                                            $viewdate = $ex[0] . ' ' . $ex[1] . ' ' . $ex[2];

                                            echo $cdate = str_replace($engtime, $bangtime, $viewdate);
                                            ?>
                                        </span></h2>
                                </div>
                                <div class="entry-content">
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
                                    <div class="continue-reading text-uppercase">
                                        <a href="{{URL('/'.$lastNews->newsid.'/'.$newsslugfilter)}}" class="more-link text-center">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                }
                ?>

                <div class="post-pagination text-center">
                    <?php echo $all_category_news->links(); ?>
                </div>

            </div>

            @include('frontend.other_page_rightside')
        </div>
    </div>
</div>
@endsection