@extends('frontend.fontend_mastar')
@section('contant')
<div class="row">
    <div class="col-md-12 cntnt_top_margin">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="archive-title">No pages here as you see!</div>
                <!-- start post -->

                <article class="post">

                    <div class="post_content_nws_dtls">
                        <div class="post-header">
                            <h1 style="text-align:center">

                                Under Construction
                            </h1>
                        </div>

                    </div>
                </article>
            </div>


            <div class="col-md-3 col-sm-5">
                <?php
                if (sizeof($advertizing8) > 0) {
                    if ($advertizing8[0]->type == 'Image') {
                        if ($advertizing8[0]->image != '') {
                            ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="gogl_ad_area"><img src="{{ URL::asset('uploads/ads/'.$advertizing8[0]->image)}}" width="337" height="286" border="0"></div>
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

            </div>
        </div>
    </div>
</div>
@endsection