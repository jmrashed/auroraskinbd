<?php $__env->startSection('contant'); ?>  


<?php
$engtime = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');



$bangtime = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
?>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="<?php echo e(URL::asset('uploads/homeslider/1.jpg')); ?>" alt="Los Angeles" style="width: 100%">
            </div>

            <div class="item">
              <img src="<?php echo e(URL::asset('uploads/homeslider/1.jpg')); ?>" alt="Chicago" style="width: 100%">
            </div>

            <div class="item">
              <img src="<?php echo e(URL::asset('uploads/homeslider/1.jpg')); ?>" alt="New York" style="width: 100%">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h2>History</h2>
        <p class="text-justify lead">
            Association of cutaneous surgeons ( Bangladesh) is the first well organized group of dermatosurgeons in Bangladesh, starts it’s activity since march 2013 with a successful workshop on chemical peeling.<br>
            A group of young & enthusiastic dermatologists are involved here to upgrade their skill and knowledge on dermatosurgery. Dermatosurgery is a vital, time demanded & promising part of dermatology. So far it was wrongly practiced by other specialities. Develop countries are practicing dermatosurgery by their dermatosurgeons.

        </p>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h2>Aims</h2>
        <p class="text-justify lead">
            Now it is the time to take the responsibilities of all cutaneous surgery by dermatosurgeons. We have got cordial support from our pioneer & legand dermatologists.<br>
            We have already arranged  two workshop successful in a regular basis (2013 & 2014) where foregign speakers, renown & young dermatologists enjoy & learn a lot.  This schedule will continue in future with the help of all well wishers.
        </p>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h2>Objectives</h2>
        <p class="text-justify lead">
            We awlays need the supports of our respected senior teachers for the betterment of the object & make a strong base of dermatosurgery through which young dermatosurgeons can build up their carier.
        </p>
    </div>


</div>

 



<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.fontend_mastar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>