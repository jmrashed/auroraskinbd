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
                <div class="archive-title">Total Photo : <span><?php echo sizeof($gallery); ?>	</span></div>
                <!-- start post -->
                <div class="gallery img-popup">
                    <div class="row">

                        <?php
                        $count = 0;
                        if (sizeof($gallery) > 0) {
                            foreach ($gallery as $lastPix) {
                                if ($count == 3) {
                                    print '<div class="clearfix"></div>';
                                    $count = 0;
                                }
                                ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="single-gallery">
                                        <a href="{{ URL::asset('uploads/gallery/'.$lastPix->image)}}"><img src="{{ URL::asset('uploads/gallery/'.$lastPix->image)}}" class="gllery_img_small" alt=""></a>
                                        <div class="gl-overlay">
                                            <h2 class="gl-caption"><?php echo $lastPix->title; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            }
                        }
                        ?>
                    </div>

                </div>	

                <div class="post-pagination text-center">
                    <?php echo $gallery->links(); ?>
                </div>

            </div>

            @include('frontend.other_page_rightside')
        </div>
    </div>
</div>
@endsection