<?php
$page = $_SERVER['REQUEST_URI'];
$sec = "300"; // 5 min
header("Refresh: $sec; url=$page");
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Document Settings -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ URL::asset('frontend_source/images/logo.png') }}">

        <?php
        if (Request::segment(1) != '') {

            if (Request::segment(1) != 'news' && Request::segment(1) != 'live' && Request::segment(1) != 'search' && Request::segment(1) != 'albums-news' && Request::segment(1) != 'news-video' && Request::segment(1) != 'result-vote' && Request::segment(1) != 'english' && Request::segment(1) != 'news-gallery' && Request::segment(1) != 'newssub') {
                ?>

                <meta property="og:title" content="{{$details->newsseotitle}}" />
                <meta property="og:image" content="{{ URL::asset('uploads/news/'.$details->news_image)}}" />
                <meta property="og:description" content="{{$details->newsseodetails}}" />
                <meta name="keywords" content="{{$details->newsseometatag}}"/>
                <meta property="og:site_name" content="Boishakhionline"/>	

                <?php
            }
        }
        ?>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Page Title -->
        <title>Welcome to Boishakhi News Portal</title>
        <!-- Styles -->
        {!!Html::style('frontend_source/assets/css/font-awesome.min.css')!!}

        {!!Html::style('frontend_source/assets/css/bootstrap.min.css')!!}
        {!!Html::style('frontend_source/assets/css/magnific-popup.css')!!}
        {!!Html::style('frontend_source/assets/css/style.css')!!}
        {!!Html::style('frontend_source/assets/css/responsive.css')!!}

        <style>
            .glyph{ display:none;}

        </style>
    </head>

    <body>


        <!-- pre-loader -->
        <!--<div id="st-preloader">
        <div class="st-preloader-circle"></div>
        </div>-->
        <!-- header -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 logo">
                        <a href="{{URL('/')}}"><img src="{{ URL::asset('frontend_source/assets/images/logo.png')}}" border="0" /></a>
                    </div>
                    <div class="col-sm-10 lst_updte">
                        <!--শেষ আপডেট ১ মিনিট আগে<br />-->
                        <?php
                        $hour = gmdate('H');
                        $minute = gmdate('i');
                        $seconds = gmdate('s');

                        $day = gmdate('d');
                        $month = gmdate('m');
                        $year = gmdate('Y');
                        $hour = $hour + 6;
                        $ShowBangladeshTime = date("H:i", mktime($hour, $minute));
                        $currentDate = date("Y-m-d", mktime($hour, $minute, $seconds, $month, $day, $year));
                        $ptime = date("Y-m-d H:i:s", mktime($hour, $minute, $seconds, $month, $day, $year));

                        $engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

                        $bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
                        $bnMonths = array('বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র');


                        $currentdate = date("l, j F Y", mktime($hour, $minute, $seconds, $month, $day, $year));
//$currentdate = date("l d F Y", mktime ($hour,$minute,$seconds,$month,$day,$year));

                        $time = date("h:i:s", mktime($hour, $minute, $seconds));

                        echo 'ঢাকা, ' . str_replace($engtime, $bangtime, $currentdate);

                        class BanglaDate {

                            private $timestamp; //timestamp as input
                            private $morning; //when the date will change?
                            private $engHour; //Current hour of English Date
                            private $engDate; //Current date of English Date
                            private $engMonth; //Current month of English Date
                            private $engYear; //Current year of English Date
                            private $bangDate; //generated Bangla Date
                            private $bangMonth; //generated Bangla Month
                            private $bangYear; //generated Bangla	Year

                            /*
                             * Set the initial date and time
                             *
                             * @param	int timestamp for any date
                             * @param	int, set the time when you want to change the date. if 0, then date will change instantly.
                             * 			If it's 6, date will change at 6'0 clock at the morning. Default is 6'0 clock at the morning
                             */

                            function __construct($timestamp, $hour = 6) {
                                $this->BanglaDate($timestamp, $hour);
                            }

                            /*
                             * PHP4 Legacy constructor
                             */

                            function BanglaDate($timestamp, $hour = 6) {
                                $this->engDate = date('d', $timestamp);
                                $this->engMonth = date('m', $timestamp);
                                $this->engYear = date('Y', $timestamp);
                                $this->morning = $hour;
                                $this->engHour = date('G', $timestamp);

//calculate the bangla date
                                $this->calculate_date();

//now call calculate_year for setting the bangla year
                                $this->calculate_year();

//convert english numbers to Bangla
                                $this->convert();
                            }

                            function set_time($timestamp, $hour = 6) {
                                $this->BanglaDate($timestamp, $hour);
                            }

                            /*
                             * Calculate the Bangla date and month
                             */

                            function calculate_date() {
//when English month is January
                                if ($this->engMonth == 1) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "পৌষ";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "পৌষ";
                                        }
                                    } else if ($this->engDate < 14 && $this->engDate > 1) { // Date 2-13
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "পৌষ";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "পৌষ";
                                        }
                                    } else if ($this->engDate == 14) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 13;
                                            $this->bangMonth = "মাঘ";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "পৌষ";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 13;
                                            $this->bangMonth = "মাঘ";
                                        } else {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "মাঘ";
                                        }
                                    }
                                }


//when English month is February		
                                else if ($this->engMonth == 2) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 18;
                                            $this->bangMonth = "মাঘ";
                                        } else {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "মাঘ";
                                        }
                                    } else if ($this->engDate < 13 && $this->engDate > 1) { // Date 2-12
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 18;
                                            $this->bangMonth = "মাঘ";
                                        } else {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "মাঘ";
                                        }
                                    } else if ($this->engDate == 13) { //Date 13
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 12;
                                            $this->bangMonth = "ফাল্গুন";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "মাঘ";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 12;
                                            $this->bangMonth = "ফাল্গুন";
                                        } else {
                                            $this->bangDate = $this->engDate - 13;
                                            $this->bangMonth = "ফাল্গুন";
                                        }
                                    }
                                }

//when English month is March		
                                else if ($this->engMonth == 3) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            if ($this->is_leapyear())
                                                $this->bangDate = $this->engDate + 17;
                                            else
                                                $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "ফাল্গুন";
                                        }
                                        else {
                                            if ($this->is_leapyear())
                                                $this->bangDate = $this->engDate + 16;
                                            else
                                                $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "ফাল্গুন";
                                        }
                                    }
                                    else if ($this->engDate < 15 && $this->engDate > 1) { // Date 2-13
                                        if ($this->engHour >= $this->morning) {
                                            if ($this->is_leapyear())
                                                $this->bangDate = $this->engDate + 17;
                                            else
                                                $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "ফাল্গুন";
                                        }
                                        else {
                                            if ($this->is_leapyear())
                                                $this->bangDate = $this->engDate + 16;
                                            else
                                                $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "ফাল্গুন";
                                        }
                                    }

                                    else if ($this->engDate == 15) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "চৈত্র";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "ফাল্গুন";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "চৈত্র";
                                        } else {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "চৈত্র";
                                        }
                                    }
                                }

//when English month is April		
                                else if ($this->engMonth == 4) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "চৈত্র";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "চৈত্র";
                                        }
                                    } else if ($this->engDate < 14 && $this->engDate > 1) { // Date 2-13
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "চৈত্র";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "চৈত্র";
                                        }
                                    } else if ($this->engDate == 14) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 13;
                                            $this->bangMonth = "বৈশাখ";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "চৈত্র";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 13;
                                            $this->bangMonth = "বৈশাখ";
                                        } else {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "বৈশাখ";
                                        }
                                    }
                                }


//when English month is May
                                else if ($this->engMonth == 5) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "বৈশাখ";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "বৈশাখ";
                                        }
                                    } else if ($this->engDate < 15 && $this->engDate > 1) { // Date 2-14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "বৈশাখ";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "বৈশাখ";
                                        }
                                    } else if ($this->engDate == 15) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        } else {
                                            $this->bangDate = 31;
                                            $this->bangMonth = "চৈত্র";
                                        }
                                    } else { //Date 16-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        } else {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        }
                                    }
                                }


//when English month is June
                                else if ($this->engMonth == 6) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        }
                                    } else if ($this->engDate < 15 && $this->engDate > 1) { // Date 2-14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 17;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        } else {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        }
                                    } else if ($this->engDate == 15) { //Date 15
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "আষাঢ়";
                                        } else {
                                            $this->bangDate = 31;
                                            $this->bangMonth = "জ্যৈষ্ঠ";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "আষাঢ়";
                                        } else {
                                            $this->bangDate = $this->engDate - 13;
                                            $this->bangMonth = "আষাঢ়";
                                        }
                                    }
                                }


//when English month is July		
                                else if ($this->engMonth == 7) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "আষাঢ়";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "আষাঢ়";
                                        }
                                    } else if ($this->engDate < 16 && $this->engDate > 1) { // Date 2-15
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "আষাঢ়";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "আষাঢ়";
                                        }
                                    } else if ($this->engDate == 16) { //Date 16
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "শ্রাবণ";
                                        } else {
                                            $this->bangDate = 31;
                                            $this->bangMonth = "আষাঢ়";
                                        }
                                    } else { //Date 17-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "শ্রাবণ";
                                        } else {
                                            $this->bangDate = $this->engDate - 16;
                                            $this->bangMonth = "শ্রাবণ";
                                        }
                                    }
                                }


//when English month is August
                                else if ($this->engMonth == 8) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "শ্রাবণ";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "শ্রাবণ";
                                        }
                                    } else if ($this->engDate < 16 && $this->engDate > 1) { // Date 2-15
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "শ্রাবণ";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "শ্রাবণ";
                                        }
                                    } else if ($this->engDate == 16) { //Date 16
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "ভাদ্র";
                                        } else {
                                            $this->bangDate = 31;
                                            $this->bangMonth = "শ্রাবণ";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "ভাদ্র";
                                        } else {
                                            $this->bangDate = $this->engDate - 16;
                                            $this->bangMonth = "ভাদ্র";
                                        }
                                    }
                                }


//when English month is September
                                else if ($this->engMonth == 9) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "ভাদ্র";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "ভাদ্র";
                                        }
                                    } else if ($this->engDate < 16 && $this->engDate > 1) { // Date 2-15
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "ভাদ্র";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "ভাদ্র";
                                        }
                                    } else if ($this->engDate == 16) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "আশ্বিন";
                                        } else {
                                            $this->bangDate = 31;
                                            $this->bangMonth = "ভাদ্র";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "আশ্বিন";
                                        } else {
                                            $this->bangDate = $this->engDate - 16;
                                            $this->bangMonth = "আশ্বিন";
                                        }
                                    }
                                }


//when English month is October
                                else if ($this->engMonth == 10) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "আশ্বিন";
                                        } else {
                                            $this->bangDate = $this->engDate + 14;
                                            $this->bangMonth = "আশ্বিন";
                                        }
                                    } else if ($this->engDate < 16 && $this->engDate > 1) { // Date 2-15
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "আশ্বিন";
                                        } else {
                                            $this->bangDate = $this->engDate + 14;
                                            $this->bangMonth = "আশ্বিন";
                                        }
                                    } else if ($this->engDate == 16) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "কার্তিক";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "আশ্বিন";
                                        }
                                    } else { //Date 17-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "কার্তিক";
                                        } else {
                                            $this->bangDate = $this->engDate - 16;
                                            $this->bangMonth = "কার্তিক";
                                        }
                                    }
                                }


//when English month is November
                                else if ($this->engMonth == 11) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "কার্তিক";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "কার্তিক";
                                        }
                                    } else if ($this->engDate < 15 && $this->engDate > 1) { // Date 2-14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "কার্তিক";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "কার্তিক";
                                        }
                                    } else if ($this->engDate == 15) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "অগ্রাহায়ণ";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "কার্তিক";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        } else {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        }
                                    }
                                }


//when English month is December
                                else if ($this->engMonth == 12) {
                                    if ($this->engDate == 1) { //Date 1
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        }
                                    } else if ($this->engDate < 15 && $this->engDate > 1) { // Date 2-14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate + 16;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        } else {
                                            $this->bangDate = $this->engDate + 15;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        }
                                    } else if ($this->engDate == 15) { //Date 14
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "পৌষ";
                                        } else {
                                            $this->bangDate = 30;
                                            $this->bangMonth = "অগ্রহায়ণ";
                                        }
                                    } else { //Date 15-31
                                        if ($this->engHour >= $this->morning) {
                                            $this->bangDate = $this->engDate - 14;
                                            $this->bangMonth = "পৌষ";
                                        } else {
                                            $this->bangDate = $this->engDate - 15;
                                            $this->bangMonth = "পৌষ";
                                        }
                                    }
                                }
                            }

                            /*
                             * Checks, if the date is leapyear or not
                             *
                             * @return boolen. True if it's leap year or returns false
                             */

                            function is_leapyear() {
                                if ($this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0))
                                    return true;
                                else
                                    return false;
                            }

                            /*
                             * Calculate the Bangla Year
                             */

                            function calculate_year() {
                                if ($this->engMonth >= 4) {
                                    if ($this->engMonth == 4 && $this->engDate < 14) { //1-13 on april when hour is greater than 6
                                        $this->bangYear = $this->engYear - 594;
                                    } else if ($this->engMonth == 4 && $this->engDate == 14 && $this->engHour <= 5) {
                                        $this->bangYear = $this->engYear - 594;
                                    } else if ($this->engMonth == 4 && $this->engDate == 14 && $this->engHour >= 6) {
                                        $this->bangYear = $this->engYear - 593;
                                    }
                                    /* else if($this->engMonth == 4 && ($this->engDate == 14 && $this->engDate) && $this->engHour <=5) //1-13 on april when hour is greater than 6
                                      {
                                      $this->bangYear = $this->engYear - 593;
                                      }
                                     */
                                    else
                                        $this->bangYear = $this->engYear - 593;
                                } else
                                    $this->bangYear = $this->engYear - 594;
                            }

                            /*
                             * Convert the English character to Bangla
                             *
                             * @param int any integer number
                             * @return string as converted number to bangla
                             */

                            function bangla_number($int) {
                                $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
                                $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');

                                $converted = str_replace($engNumber, $bangNumber, $int);
                                return $converted;
                            }

                            /*
                             * Calls the converter to convert numbers to equivalent Bangla number
                             */

                            function convert() {
                                $this->bangDate = $this->bangla_number($this->bangDate);
                                $this->bangYear = $this->bangla_number($this->bangYear);
                            }

                            /*
                             * Returns the calculated Bangla Date
                             *
                             * @return array of converted Bangla Date
                             */

                            function get_date() {
//return array($this->bangDate, $this->bangMonth, $this->bangYear);
                                return array($this->bangDate, $this->bangMonth, $this->bangYear);
                            }

                            function get_date1() {
//return array($this->bangDate, $this->bangMonth, $this->bangYear);
                                return ($data = $this->bangDate . '&nbsp;' . $this->bangMonth . '&nbsp;' . $this->bangYear);
                            }

                        }

                        $bn = new BanglaDate(time());
                        $bn->set_time(time(), 0);

                        echo ', ' . $bn->get_date1();

//$dateparts = explode(" ", file("http://yse-uk.com/hijridate/hijridate.php?style=hijri"));

                        class hijridate {

                            function convertHijri($date, $monthname = false) {
                                $y = substr($date, 0, 4);
                                $m = substr($date, 5, 2);
                                $d = substr($date, 8, 2);
                                if (($y > 1582) || (($y == 1582) && ($m > 10)) || (($y == 1582) && ($m == 10) && ($d > 14))) {
                                    $jd = (int) ((1461 * ($y + 4800 + (int) (($m - 14) / 12))) / 4) + (int) ((367 * ($m - 2 - 12 * ((int) (($m - 14) / 12)))) / 12) - (int) ( (3 * ((int) ( ($y + 4900 + (int) ( ($m - 14) / 12)) / 100))) / 4) + $d - 32075;  // change here 32075 to 32076
                                } else {
                                    $jd = 367 * $y - (int) ((7 * ($y + 5001 + (int) (($m - 9) / 7))) / 4) + (int) ((275 * $m) / 9) + $d + 1729777;
                                }

                                $l = $jd - 1948440 + 10632;
                                $n = (int) (($l - 1) / 10631);
                                $l = $l - 10631 * $n + 354;
                                $j = ((int) ((10985 - $l) / 5316)) * ((int) ((50 * $l) / 17719)) + ((int) ($l / 5670)) * ((int) ((43 * $l) / 15238));
                                $l = $l - ((int) ((30 - $j) / 15)) * ((int) ((17719 * $j) / 50)) - ((int) ($j / 16)) * ((int) ((15238 * $j) / 43)) + 29;
                                $m = (int) ((24 * $l) / 709);
                                $d = $l - (int) ((709 * $m) / 24);
                                $y = 30 * $n + $j - 30;

                                if (!$monthname) { // return basic
                                    return($d . '-' . $m . '-' . $y);
                                } else { // return full
                                    switch ($m) {
                                        case 1:
                                            $mn = 'Muharram';
                                            break;
                                        case 2:
                                            $mn = 'Safar';
                                            break;
                                        case 3:
                                            $mn = 'Rabiulawal';
                                            break;
                                        case 4:
                                            $mn = 'Rabius sani';
                                            break;
                                        case 5:
                                            $mn = 'Jamadilawal';
                                            break;
                                        case 6:
                                            $mn = 'Jamadil sani ';
                                            break;
                                        case 7:
                                            $mn = 'Rejab';
                                            break;
                                        case 8:
                                            $mn = 'Syaaban';
                                            break;
                                        case 9:
                                            $mn = 'Ramadhan';
                                            break;
                                        case 10:
                                            $mn = 'Syawal';
                                            break;
                                        case 11:
                                            $mn = 'Zulkaedah';
                                            break;
                                        case 12:
                                            $mn = 'Zulhijjah';
                                            break;
                                    }
                                    return($d . ' ' . $mn . ' ' . $y);
                                }
                            }

                        }

                        $hidate = new hijridate();
                        $hijriDateDisplay = $hidate->convertHijri($currentDate, True);

                        $engHijri = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'Muharram', 'Safar', 'Rabiulawal', 'Rabius sani', 'Jamadilawal', 'Jamadil sani', 'Rejab', 'Syaaban', 'Ramadhan', 'Syawal', 'Zulkaedah', 'Zulhijjah');
                        $bangHijri = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'মহাররম', 'সফর', 'রবিউল আউয়াল', 'রবিউস সানি', 'জুমাদিউল আউয়াল', 'জুমাদিউল সানি', 'রজব', 'শাবান', 'রমজান', 'শাউয়াল', 'জিলকদ্দ', 'জিলহজ্জ');

                        echo ', ' . $topdeskdate = str_replace($engHijri, $bangHijri, $hijriDateDisplay);
                        ?>
                        <div style="width:140px;" id="clock"></div>





                    </div>
                    <!--modified by jmrashed ads-6 -->

                    <?php
                    if (sizeof($advertizing6) > 0) {
                        if ($advertizing6[0]->type == 'Image') {
                            if ($advertizing6[0]->image != '') {
                                ?> 
                                <span class="pull-right hidden-xs hidden-sm headerTopAdd">
                                    <!-- <h1>1</h1> -->
                                    <a href="@php echo $advertizing6[0]->url;@endphp ">  
                                        <img src="{{ URL::asset('uploads/ads/'.$advertizing6[0]->image)}}" class="advertizing1 img img-responsive" style="height: 118px; width: 300px" />
                                    </a> 
                                </span>
                                <?php
                            }
                        }
                    }
                    ?>
                    <!-- end modified -->
                </div>
            </div>
        </header>



        <div class="container box_shadow">
            <div class="wrapping_padd">

                <div class="row">
                    <div class="blck_bar">
                        <div class="col-md-2 col-sm-3 col-xs-12 bar_position">
                            <div class="top-social-icons">
                                <a href="https://www.facebook.com/Boishakhimedia/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/Boishakhimedia" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.google.com/+BoishakhiTvmedia" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <a href="http://www.youtube.com/boishakhitvbd" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-12 bng_word_img"><div class="bar_position"><a href="{{ URL::asset('frontend_source/assets/fonts/solaimanlipi.ttf')}}"><img src="{{ URL::asset('frontend_source/assets/images/bangla_word.png')}}" border="0" /></a></div></div>
                        <div class="col-md-5 col-sm-3 col-xs-12 bar_position">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Language
                                    <span class="caret"></span></button>
                                <ul style="z-index:3;" class="dropdown-menu">
                                    <li><a href="{{URL('/')}}">বাংলা</a></li>
                                    <li><a href="{{URL('/english')}}">English</a></li>
                                </ul>
                            </div> 
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 bar_position">
                            {!! Form::open(array('url' => 'search', 'method' => 'get','name' => 'studentForm','novalidate','files' => true)) !!}
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="খোঁজ করুন..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default form-control" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="row nav_position">

                    <div class="col-md-11 col-sm-11">
                        <div class="row">
                            <nav id="nav">
                                <ul class="">
                                    <li><a href="{{URL('/')}}"><i class="fa fa-home"></i></a></li>
                                    <?php
                                    $i = 0;
                                    if (sizeof($menu) > 0) {
                                        foreach ($menu as $menuactive) {
                                            $menuid = $menuactive->menuid;
                                            if ($i <= 8) {
                                                $newsslug = strip_tags($menuactive->menutitle);
                                                $newsslug = str_replace(' ', '-', $newsslug);
                                                ?>
                                                <li>
                                                    <a href="{{URL('/news/'.$menuactive->menuid.'/'.$newsslug)}}"><?php echo $menuactive->menutitle; ?> </a>
                                                    <ul>
                                                        @php
                                                        $submenulist = App\models\MenuModel::where('menuparent',$menuid)->where('menuparent', '!=', 'none')->get();

                                                        @endphp

                                                        <?php
                                                        if (sizeof($submenulist) > 0) {
                                                            ?>

                                                            @foreach ($submenulist as $submenulisting)
                                                            @php
                                                            $newsslug = strip_tags($submenulisting->menutitle);
                                                            $newsslug = str_replace(' ', '-', $newsslug);
                                                            @endphp
                                                            <li><a href="{{URL('/newssub/'.$submenulisting->menuid.'/'.$newsslug)}}">{{ $submenulisting->menutitle }}</a></li>
                                                            @endforeach
                                                            <?php
                                                        }
                                                        ?>  

                                                    </ul>
                                                </li>
                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>

                        <div class="row">
                            <style type="text/css">
                                #nav_2sral > ul > li {width: 9%;}
                            </style>
                            <nav id="nav_2sral">
                                <ul class="">
                                    <li>
                                        <a href="{{URL('/news/37/শিক্ষা')}}"> শিক্ষা </a>
                                    </li>
                                    <?php
                                    $i = 0;
                                    if (sizeof($menu) > 0) {
                                        foreach ($menu as $menuactive) {
                                            if ($i >= 9 && $i < '19') {
                                                $newsslug = strip_tags($menuactive->menutitle);
                                                $newsslugfilter = str_replace(' ', '-', $newsslug);
                                                $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                                ?>

                                                <li>
                                                    <a href="{{URL('/news/'.$menuactive->menuid.'/'.$newsslug)}}"><?php echo $menuactive->menutitle; ?> </a>
                                                    <ul>
                                                        @php
                                                        $submenulist = App\models\MenuModel::where('menuparent',$menuactive->menuid)->where('menuparent', '!=', 'none')->get();

                                                        @endphp

                                                        <?php
                                                        if (sizeof($submenulist) > 0) {
                                                            ?>

                                                            @foreach ($submenulist as $submenulisting)
                                                            @php
                                                            $newsslug = strip_tags($submenulisting->menutitle);
                                                            $newsslug = str_replace(' ', '-', $newsslug);
                                                            @endphp
                                                            <li><a href="{{URL('/newssub/'.$submenulisting->menuid.'/'.$newsslug)}}">{{ $submenulisting->menutitle }}</a></li>
                                                            @endforeach
                                                            <?php
                                                        }
                                                        ?>  

                                                    </ul>
                                                </li>

                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>



                    <div class="col-md-1 col-sm-1">
                        <div class="row">
                            <a href="{{URL('/live')}}"><img src="{{ URL::asset('frontend_source/assets/images/live_btn.gif')}}" style="width:100%; height:54px; border:none;"> </a>
                        </div>
                    </div>
                </div>



                <!-- start main menu -->
                <div class="main_menu_area">
                    <div class="row">
                        <nav class="navbar main-menu">
                            <div class="navbar-header">
                                <div class="mobil_live_btn"><a href="{{URL('/live')}}"><img style="width:82px; height:54px; border:none;" src="{{ URL::asset('frontend_source/assets/images/live_btn.gif')}}"> </a></div>
                                <button type="button" style="background:#FFF;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="myNavbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{URL('/')}}">হোম</a></li>

                                    <?php
                                    $i = 0;
                                    if (sizeof($menu) > 0) {
                                        foreach ($menu as $menuactive) {
                                            if ($i <= 18) {
                                                $newsslug = strip_tags($menuactive->menutitle);
                                                $newsslug = str_replace(' ', '-', $newsslug);
                                                ?>
                                                <li class="dropdown">
                                                    <a href="{{URL('/news/'.$menuactive->menuid.'/'.$newsslug)}}" ><?php echo $menuactive->menutitle; ?></a>
                                                    <ul class="dropdown-menu">
                                                        @php
                                                        $submenulist = App\models\MenuModel::where('menuparent',$menuactive->menuid)->where('menuparent', '!=', 'none')->get();

                                                        @endphp
                                                        @foreach ($submenulist as $submenulisting)
                                                        @php
                                                        $newsslug = strip_tags($submenulisting->menutitle);
                                                        $newsslug = str_replace(' ', '-', $newsslug);
                                                        @endphp
                                                        <li><a href="{{URL('/newssub/'.$submenulisting->menuid.'/'.$newsslug)}}">{{ $submenulisting->menutitle }}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                                <?php
                                            }
                                            $i++;
                                        }
                                    }
                                    ?> 
                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
                <!-- end main menu -->

                <div class="row">
                    <div class="hd_line_bg">
                        <div class="col-md-1 col-sm-2 col-xs-4 head_ttl">শিরোনামঃ</div>
                        <div class="col-md-11 col-sm-10 col-xs-8 headline_sec">
                            <span>
                                <marquee align="top" behavior="scroll" direction="left" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="3" scrolldelay="30" truespeed="truespeed">
                                    @php
                                    $headingnews = DB::table('headlines')->select('headlines.newsid','headlines.titleposid','boi_news.newsid', 'boi_news.newstitle')
                                    ->leftJoin('boi_news','boi_news.newsid', '=', 'headlines.newsid')
                                    ->whereNotNull('headlines.titleposid')
                                    ->where([
                                    ['headlines.titleposid', '>', '0'],
                                    ])
                                    ->orderBy('headlines.titleposid','ASC')
                                    ->take(20)
                                    ->get();
                                    @endphp
                                    @foreach ($headingnews as $hdnews) 
                                    @php
                                    $newsslug = strip_tags($hdnews->newstitle);
                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);
                                    @endphp
                                    <i class="fa fa-hand-o-right"></i> <a href="{{URL('/'.$hdnews->newsid.'/'.$newsslugfilter)}}" style="color:#FFF;">{{$hdnews->newstitle}}</a>
                                    @endforeach
                                </marquee>
                            </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>



                <div class="row" style="text-align:center">
                    <div class="col-md-12 cntnt_top_margin">

                        <!-- modified by jmrashed advertizing1-->
                        <div class="row">
                            <?php
                            if (sizeof($advertizing1) > 0) {
                                if ($advertizing1[0]->type == 'Image') {
                                    if ($advertizing1[0]->image != '') {
                                        ?>
                                        <!-- <h1>2</h1> -->
                                        <a href=" @php echo $advertizing1[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing1[0]->image)}}" style="width: 1160px; height: 60px" /></a>

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
                        </div>
                        <!-- end modified  -->


                    </div> 
                </div>

                <!-- start main content -->
                @yield('contant')
                <!-- end main content -->


                <!-- modified by jmrashed advertizing12 -->
                <div class="row" style="padding:0px 6px 10px 6px; text-align:center;">
                    <div class="col-md-12 cntnt_top_margin">
                        <div class="row" >
                            <?php
                            if (sizeof($advertizing5) > 0) {
                                if ($advertizing5[0]->type == 'Image') {
                                    if ($advertizing5[0]->image != '') {
                                        ?>
                                        <!-- <h1>10</h1> -->
                                        <a href=" @php echo $advertizing5[0]->url;@endphp ">  <img src="{{ URL::asset('uploads/ads/'.$advertizing5[0]->image)}}" style="width: 1160px; height: 90px;" /></a>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <!-- ADS POSITIONING-7 CODE HERE BELOW   -->



                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div> 
                </div>
                <!-- end modified -->
            </div>

        </div>



        <!-- start footer area -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <aside class="footer-widget">
                            <h3 class="footer-title text-uppercase">সম্পাদনা ও প্রকাশনা</h3>
                            <div class="about-content">মোঃ রফিকুল আমিন<br>
                                চেয়ারম্যান ও ব্যবস্থাপনা পরিচালক 

                                <br>
                                <br>

                                টিপু আলম মিলন<br>
                                উপ-ব্যবস্থাপনা পরিচালক ও প্রধান সম্পাদক 
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4">
                        <aside class="footer-widget">

                            <div class="address">
                                <h3 class="footer-title text-uppercase">ঠিকানা</h3>
                                <p>বৈশাখী মিডিয়া লিমিটেড<br>
                                    ৩২, মহাখালী বাণিজ্যিক এলাকা, লেভেল - ৭, ঢাকা-১২১২<br>
                                    টেলিফোনঃ +৮৮ ০২ ৮৮৩৭০ ৮১ - ৫ <br>
                                    ফ্যাক্সঃ +৮৮ ০২ ৮৮৩৭ ৫৪১<br>
                                    ই-মেইলঃ info@boishakhi.tv<br>
                                    ওয়েবঃ www.boishakhi.tv</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4">
                        <aside class="tweet-post">
                            <h3 class="footer-title text-uppercase"> লগিন  </h3>
                            <form class="form-horizontal login-form" role="form" method="POST" action="{{ url('/admin/login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">

                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn  btn-danger" value="প্রবেশ করুন ">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> আমাকে মনে রাখুন </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-left">
                                                @if(Session::has('sorry'))
                                                <div class="alert alert-danger" style="text-align: center">  {!!Session::get('sorry')!!}</div>
                                                @endif
                                                <!--<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </aside>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <ul class="ftr_nav ftr_menu">
                            <?php
                            $i = 0;
                            if (sizeof($menu) > 0) {
                                foreach ($menu as $menuactive) {
                                    $newsslug = trim(strip_tags($menuactive->menutitle));
                                    $newsslugfilter = str_replace(' ', '-', $newsslug);
                                    $newsslugfilter = str_replace(',', '', $newsslugfilter);

                                    if ($i > 17 && $i != '20' && $i != '27') {
                                        ?>

                                        <li role="presentation"> <a href="{{URL('/news/'.$menuactive->menuid.'/'.$newsslugfilter)}}"><?php echo $menuactive->menutitle; ?></a></li>
                                        <?php
                                    }
                                    $i++;
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="copyright-area">
                            <div class="copy-text pull-left">
                                <p>&copy; 2017 All Rights Reserved, <a href="{{URL('/')}}">বৈশাখী টেলিভিশনের খবর বিভাগের তত্ত্বাবধানে </a>, Developed by <a href="http://boishakhitv.com/" target="_blank">Boishakhi TV </a></p>
                            </div>
                            <div class="pull-right social-share footer-social-icon">
                                <span>Follow Us: </span>
                                <ul class="">

                                    <li><a href="https://www.facebook.com/Boishakhimedia/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/Boishakhimedia" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.google.com/+BoishakhiTvmedia" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="http://www.youtube.com/boishakhitvbd" target="_blank"><i class="fa fa-youtube"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer area -->

    {!!Html::script('frontend_source/assets/js/jquery.min.js')!!}
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <script>
                                    var mainApp = angular.module("mainApp", []);

                                    mainApp.controller('studentController', function () {
                                    });

                                    var mainAppSubs = angular.module("mainAppSubs", []);


                                    function commentsSubmit()
                                    {

                                        var message = $("#message").val();
                                        var name = $("#name").val();
                                        var email = $("#email").val();
                                        var newsid = $("#newsid").val();
                                        var replyid = $("#replyid").val();

//alert(newsid+"_"+message+"_"+name+"_"+email);

                                        $.ajax({
                                            method: "get",
                                            url: "{{url('commentsadd')}}",
                                            data: {message: message, name: name, email: email, newsid: newsid, replyid: replyid}
                                        }).done(function (response)
                                        {
                                            $('#msg_show').show();
                                            $('#comments')[0].reset();
                                        });

                                    }

                                    function subscribeNews()
                                    {
                                        var subscribe = $("#subscribe").val();

                                        var x = subscribe;
                                        var atpos = x.indexOf("@");
                                        var dotpos = x.lastIndexOf(".");
                                        if (x == '' || atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)
                                        {
                                            alert("Not a valid e-mail address");
                                            return false;
                                        }
//alert(subscribe);

                                        $.ajax({
                                            method: "get",
                                            url: "{{url('subscribe')}}",
                                            data: {subscribe: subscribe}
                                        }).done(function (response)
                                        {
                                            if (response == 1)
                                            {
                                                document.getElementById('sc_show').innerHTML = "This email id already exit.";
                                            } else
                                            {
                                                document.getElementById('sc_show').innerHTML = "Successfully Subscribe.";
//$("#subscribe").val()=='';	
                                            }
                                        });

                                    }

                                    function reply(id)
                                    {
//alert(id);
                                        document.getElementById('replyid').value = id;
                                        document.getElementById('message').focus();

                                    }

    </script>
    <script>
        function updateClock( )
        {
            var currentTime = new Date( );
            var currentHours = currentTime.getHours( );
            var currentMinutes = currentTime.getMinutes( );
            var currentSeconds = currentTime.getSeconds( );

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
            currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = (currentHours < 12) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = (currentHours == 0) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
            //var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


            var finalEnlishToBanglaNumber = {'0': '০', '1': '১', '2': '২', '3': '৩', '4': '৪', '5': '৫', '6': '৬', '7': '৭', '8': '৮', '9': '৯'};

            String.prototype.getDigitBanglaFromEnglish = function () {
                var retStr = this;
                for (var x in finalEnlishToBanglaNumber) {
                    retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
                }
                return retStr;
            };

            var bangla_converted_number = currentTimeString.getDigitBanglaFromEnglish();

            $("#clock").html('সময়ঃ ' + bangla_converted_number);

        }

        $(document).ready(function ()
        {
            setInterval('updateClock()', 1000);
        });

        /*
         ========================= OFF START ==========================
         */

        /*jQuery(document).bind("contextmenu cut copy",function(e){
         e.preventDefault();
         alert('Copying is not allowed');
         });*/

        /*
         ========================= OFF END ============================
         */
    </script>

    <?php
    if (Request::segment(1) == 'somethingwrong') {
        ?>
        <script>

            setTimeout(function () {

                window.location.href = "{{URL('/')}}";

            }, 5000);

        </script>
        <?php
    }
    ?>
    {!!Html::script('frontend_source/assets/js/bootstrap.min.js')!!}
    {!!Html::script('frontend_source/assets/js/jquery.magnific-popup.min.js')!!}
    {!!Html::script('frontend_source/assets/js/jquery.scrollUp.min.js')!!}
    {!!Html::script('frontend_source/assets/js/main.js')!!}

</body>
</html>
