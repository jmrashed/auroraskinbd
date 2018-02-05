<?php $__env->startSection('contant'); ?>
 <?php 
$what_we_do="Cosmetic plastic surgery includes surgical and nonsurgical procedures that enhance and reshape structures of the body to 
improve appearance and confidence. Healthy individuals with a positive outlook and realistic expectations are appropriate candidates for 
cosmetic procedures. Plastic surgery is a personal choice and should be done for yourself, not to meet someone else's expectations or to 
try to fit an ideal image. Because it is elective, cosmetic surgery is usually not covered by health insurance.";
 ?>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class=""></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="3" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div class="container">
          <div class="carousel-caption">
            <h3>With a Touch of <span>Kindness.</span></h3>
            <p>Child Care Treatments</p>
            <h6>Our Medical Center is the preferred choice for diplomats and employees from 64 embassies, consulates and UN agencies, as well as private patients from over 60 countries.</h6>
          </div>
        </div>
      </div>
      <div class="item item2">
        <div class="container">
          <div class="carousel-caption">
            <h3>With a Touch of <span>Kindness.</span></h3>
            <p>Child Care Treatments</p>
            <h6>Our Medical Center is the preferred choice for diplomats and employees from 64 embassies, consulates and UN agencies, as well as private patients from over 60 countries.</h6>
          </div>
        </div>
      </div>
      <div class="item item3 ">
        <div class="container">
          <div class="carousel-caption">
            <h3>With a Touch of <span>Kindness.</span></h3>
            <p>Child Care Treatments</p>
            <h6>Our Medical Center is the preferred choice for diplomats and employees from 64 embassies, consulates and UN agencies, as well as private patients from over 60 countries.</h6>
          </div>
        </div>
      </div>
      <div class="item item4">
        <div class="container">
          <div class="carousel-caption">
            <h3>With a Touch of <span>Kindness.</span></h3>
            <p>Child Care Treatments</p>
            <h6>Our Medical Center is the preferred choice for diplomats and employees from 64 embassies, consulates and UN agencies, as well as private patients from over 60 countries.</h6>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="fa fa-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="fa fa-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
  </div>

<div class="about">
    <div class="container">
      <h3 class="heading-agileinfo">About Us<span>We offer extensive medical procedures to outbound and inbound patients.</span></h3>

    <div class="row">
      <div class="col-md-6 about-w3right">
        <img src="<?php echo e(asset('/frontend_source/images')); ?>/g6.jpg" class="img-responsive" alt="" style="padding:10px">
      </div>
      <div class="col-md-6 about-w3left">
          <h4 style="color: orange; font-size:22px;">What We Do</h4>
         <p class="text-justify"><?php echo e($what_we_do); ?></p>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6 about-w3right">
        <img src="<?php echo e(asset('/frontend_source/images')); ?>/g4.jpg" class="img-responsive" alt="" style="padding:10px">
      </div>
      <div class="col-md-6 about-w3left">
          <h4 style="color: orange; font-size:22px;">How It Works</h4>
         <p class="text-justify"><?php echo e($what_we_do); ?></p>
      </div>
    </div>



      <div class="clearfix"> </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.fontend_mastar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>