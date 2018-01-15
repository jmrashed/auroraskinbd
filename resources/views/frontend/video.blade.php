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
                <div class="archive-title">Total Video : <span><?php echo sizeof($video); ?>	</span></div>
                <!-- start post -->
                <div class="gallery img-popup">
                    <div class="row">

                        <?php
                        if (sizeof($video) > 0) {
                            foreach ($video as $videoactive) {
                                if ($videoactive->youtube != '') {
                                    $youtubeurl = $videoactive->youtube;
                                    $matchlink;
                                    if (preg_match("/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/", $youtubeurl, $matchlink)) {

                                        if ($matchlink[1] == 'youtube.com' || $matchlink[1] == 'youtu.be') {
                                            $newLink = 'https://www.youtube.com/embed/' . $matchlink[4];
                                            ?>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-gallery">
                                                    <iframe width="100%" src="{{$newLink}}" frameborder="0" allowfullscreen></iframe>

                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>

                </div>	

                <div class="post-pagination text-center">
                    <?php echo $video->links(); ?>
                </div>

            </div>

            @include('frontend.other_page_rightside')
        </div>
    </div>
</div>
@endsection