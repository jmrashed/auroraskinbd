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
                <div class="archive-title">Result : <span><?php echo sizeof($vote); ?>	</span></div>
                <!-- start post -->
                <?php
                if (sizeof($vote) > 0) {
                    foreach ($vote as $voteall) {
                        $vid = $voteall->id;
                        $totalVote = DB::table('election')->where('online_vote_id', $vid)->first();
                        if (sizeof($totalVote) > 0) {
                            $final = $totalVote->yes + $totalVote->no + $totalVote->noComments;
                            $yes = $totalVote->yes;
                            $no = $totalVote->no;
                            $noComments = $totalVote->noComments;
                        } else {
                            $final = 0;
                            $yes = 0;
                            $no = 0;
                            $noComments = 0;
                        }
                        ?>
                        <article class="post">
                            <div class="post-thumb" style="padding:10px;">
                                <h4>{{$voteall->title}}</h4>
                            </div>
                            <div class="post_content_nws_dtls">
                                <div class="post-header">

                                    <div style="width:90px; float:left;">হ্যাঁ </div>  <div style="width:90px;float:left;">: <?php echo str_replace($engtime, $bangtime, $yes) . ' জন '; ?></div><br />
                                    <div style="width:90px;float:left;"> না </div>  <div style="width:90px;float:left;">: <?php echo str_replace($engtime, $bangtime, $no) . ' জন '; ?></div><br />
                                    <div style="width:90px;float:left;"> মন্তব্য নেই </div>  <div style="width:90px;float:left;">: <?php echo str_replace($engtime, $bangtime, $noComments) . ' জন'; ?></div>



                                    <p>&nbsp;</p>
                                </div>

                            </div>
                        </article>
                        <?php
                    }
                }
                ?>

                <div class="post-pagination text-center">
                    <?php echo $vote->links(); ?>
                </div>

            </div>
            {{--   @include('frontend.other_page_rightside') --}}

        </div>
    </div>
</div>
@endsection