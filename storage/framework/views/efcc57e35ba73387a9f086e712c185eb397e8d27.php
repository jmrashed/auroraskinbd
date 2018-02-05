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
                    <?php echo Form::open(array('url' => '/sendmail', 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form','files' => true )); ?>


                    <div class="left_form">
                        <div>
                            <span><label>Name</label></span>
                            <span><input name="name" type="text" class="textbox" required="" placeholder="Enter your full name"></span>
                        </div>
                        <div>
                            <span><label>E-mail</label></span>
                            <span><input name="email" type="text" class="textbox" required="" placeholder="Enter your valid email"></span>
                        </div>
                        <div>
                            <span><label>Address</label></span>
                            <span><input name="address" type="text" class="textbox" required="" placeholder="Enter your current location"></span>
                        </div>
                    </div>
                    <div class="right_form">
                        <div>               
                            <span><label>Message</label></span>
                            <span><textarea name="message" required="" placeholder="Write your message"> </textarea></span>
                        </div>
                        <div>
                            <span><input type="submit" value="Submit" class="myButton"></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <?php echo Form::close(); ?>

            </div>
        </div>


    </div>
</div>
<!-- /map -->
<div class="map_w3layouts_agile">
  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84010033106!2d-74.25819252532891!3d40.70583163828471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1475140387172" style="border:0"></iframe>-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8506738775204!2d90.37896276460738!3d23.752703834588313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ae46e8b7a5%3A0xc0f38ea035a73d9e!2sUnion+Heights%2C+Panthapath%2C+Dhaka+1215!5e0!3m2!1sen!2sbd!4v1517810576663" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- //map -->

<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.fontend_mastar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>