<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Boishakhi Tv</title>
        <link rel="stylesheet" href="<?php echo e(URL::asset('backend_source/login_panel/css/style.css')); ?>">
        <link rel="shortcut icon" href="<?php echo e(URL::asset('frontend_source/images/logo.png')); ?>">

    </head>

    <body>

        <div class="container">
            <div class="info">
                <!-- <h1>BASA</h1> -->
                <h3>&nbsp;</h3>
            </div>
        </div>

        <div class="form">
            <div class="thumbnail"><img src="<?php echo e(URL::asset('frontend_source/images/logo.png')); ?>" style="width:120px; height:120px;"/></div>
            <?php if(Session::has('sorry')): ?>
            <div class="alert alert-danger" style="text-align: center">  <?php echo Session::get('sorry'); ?></div>
            <?php endif; ?>

            <form class="form-horizontal login-form" role="form" method="POST" action="<?php echo e(url('/superadmin/login')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email">
                        <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                        <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <button type="submit">login</button>
                <!--    <p class="message">Not registered? <a href="#">Create an account</a></p>-->
            </form>
        </div>
        <script src="<?php echo e(URL::asset('backend_source/login_panel/js/index.js')); ?>"></script>
    </body>
</html>
