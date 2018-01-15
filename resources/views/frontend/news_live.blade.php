@extends('frontend.fontend_mastar')
@section('contant')
<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>
<div class="row">
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="archive-title">Live <span class="archive-name"></span></div>
                <!-- start post -->

                <article class="post">
                    <div class="post-thumb">

                        <iframe src="http://www.mcaster.tv/channel/boisakhitv.php?u=boishakhi&vw=100%&vh=576" name="ifram2" scrolling="no" allowfullscreen="allowfullscreen" width="100%" height="576" frameborder="0"></iframe>

                    </div>
                </article>


            </div>

            {{--     @include('frontend.other_page_rightside')  --}}
        </div>
    </div>
</div>
@endsection