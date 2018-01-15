@extends('frontend.fontend_mastar')
@section('contant')
<style type="text/css">
    .post-thumb:hover > a > img { 
    }
    .rashifol{
        margin-top: 15px; 
        margin-bottom: 25px; 
        padding: 10px;
        box-shadow: 2px 2px 3px #eee;
    }
    img.rashi_img{  -webkit-transition: -webkit-transform .8s ease-in-out;
                    transition:         transform .8s ease-in-out;}
    .rashifol_main{
        background: rgb(255, 255, 255);
        margin-bottom: 20px;
        border: 1px solid rgba(91, 196, 188, 0);
        box-shadow: 1px 1px 5px rgb(106, 199, 188);
        padding: 10px;
        text-align: center;
        font-size: 18px;

    }
    .rashifol_main:hover{
        background: #EEE;
    }
    a img.rashi_img:hover{
        -webkit-transform: rotate(360deg); 
        transform: rotateY(180deg);

    }
    .rashi_title{
        display: inline-block; padding: 5px; font-weight: bold; color: #007a48;
    }


</style>
<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>
<div class="row">
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="archive-title" style="padding: 15px 30px; font-size: 22px;"><span class="archive-name">"{{$categories->menutitle}}"</span> ক্যাটেগরিতে ব্রাউজ করুন  </div>
                <!-- start post -->


                <div class="rashifol row"> 
                    <?php
                    $rashi = array('মেষ', 'বৃষ', 'মিথুন', 'কর্কট', 'সিংহ', 'কন্যা', 'তুলা', 'বৃশ্চিক', 'ধনু', 'মকর', 'কুম্ভ', 'মীন');
                    $subcategory = 70;
                    for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="rashifol_main">
                                <center>
                                    <a href="{{url('/')}}/newssub/{{$subcategory++}}/{{$rashi[$i-1]}}">
                                        <img class="rashi_img" src="{{url('/')}}/uploads/rashifol/{{$i}}.png" class="img img-responsive" style="width: 100%">
                                        <span class="rashi_title"><?php echo $rashi[$i - 1]; ?></span>
                                    </a>
                                </center>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div> 

                <?php
                if (sizeof($all_category_news) > 0) {
                    $i = 100;
                    foreach ($all_category_news as $lastNews) {
                        //  if($i==100){$i++; continue; }
                        $newsslug = strip_tags($lastNews->newstitle);
                        //$newsslug = substr($newsslug, 0, strrpos($newsslug, ' '));

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