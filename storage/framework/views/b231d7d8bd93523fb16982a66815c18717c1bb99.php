<?php $__env->startSection('contant'); ?>  


  <!-- banner -->
<div class="banner_inner_content_agile_w3l">
  
</div>
  <!--//banner -->
    <!-- /inner_content -->
  <div class="banner-bottom">
    <div class="container">
      <div class="inner_sec_info_agileits_w3">
              <h2 class="heading-agileinfo">Mail Us<span>We offer extensive medical procedures to outbound and inbound patients.</span></h2>
        <div class="contact-form">
               <form method="post" action="#">
               <div class="left_form">
                <div>
                  <span><label>Name</label></span>
                  <span><input name="userName" type="text" class="textbox" required=""></span>
                </div>
                <div>
                  <span><label>E-mail</label></span>
                  <span><input name="userEmail" type="text" class="textbox" required=""></span>
                </div>
                <div>
                  <span><label>Fax</label></span>
                  <span><input name="userPhone" type="text" class="textbox" required=""></span>
                </div>
              </div>
              <div class="right_form">
                <div>               
                  <span><label>Message</label></span>
                  <span><textarea name="Message" required=""> </textarea></span>
                </div>
                 <div>
                  <span><input type="submit" value="Submit" class="myButton"></span>
                </div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
      </div>
    

    </div>
  </div>
    <!-- /map -->
      <div class="map_w3layouts_agile">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84010033106!2d-74.25819252532891!3d40.70583163828471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1475140387172" style="border:0"></iframe>

      </div>
    <!-- //map -->

<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.fontend_mastar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>