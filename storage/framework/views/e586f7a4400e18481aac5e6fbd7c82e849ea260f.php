<?php $__env->startSection('content'); ?>

<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Add Menu</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="<?php echo e(Url('dashboard')); ?>">Dashboard</a></li>
                <li><a href="<?php echo e(Url('banner')); ?>">Menu</a></li>
                <li class="active">Add Menu</li>
            </ol>
        </div>
    </div>


    <?php if(Session::has('success')): ?>
    <span style="color: green;" class="alert alert-success"> <?php echo Session::get('success'); ?> </span>
    <?php endif; ?>

    <?php if(Session::has('delete')): ?>
    <span style="color: red;" class="alert alert-success"> <?php echo Session::get('delete'); ?> </span>
    <?php endif; ?>
    <div class="row" ng-app = "mainApp" ng-controller = "studentController">
        <?php echo Form::open(array('url' => 'admin/submit_headline', 'method' => 'post','name' => 'studentForm','class' => 'cmxform form-horizontal tasi-form','novalidate','files' => true)); ?>

        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Field Required</h3></div>
                <div class="panel-body">
                    <div class=" form">

                        <div class="form-group">
                            <label for="firstname" class="control-label col-lg-2"> Position *</label>
                            <div class="col-lg-10">
                                <select name="titleposid" class="form-control" id="exampleSelect1">
                                    <option> Select Title Position </option>
                                    <option value="1"> Position One </option>
                                    <option value="2"> Position Two </option>
                                    <option value="3"> Position Three </option>
                                    <option value="4"> Position Four </option>
                                    <option value="5"> Position Five </option>
                                    <option value="6"> Position Six </option>
                                    <option value="7"> Position Seven </option>
                                    <option value="8"> Position Eight </option>
                                    <option value="9"> Position Nine </option>
                                    <option value="10"> Position Ten </option>
                                    <option value="11"> Position Eleven </option>
                                    <option value="12"> Position Tweleve </option>
                                    <option value="13"> Position Thirteen </option>
                                    <option value="14"> Position Fourteen </option>
                                    <option value="15"> Position Fifteen </option>
                                    <option value="16"> Position Sixteen </option>
                                    <option value="17"> Position Seventeen </option>
                                    <option value="18"> Position Eighteen </option>
                                    <option value="19"> Position Nineteen </option>
                                    <option value="20"> Position Twenty </option>
                                </select>
                            </div>
                        </div>

                        <?php
                        $title = DB::table('boi_news')->select('newsid','userid','newstitle')
                        ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(50)->get();
                        ?>

                        <div class="form-group">
                            <label for="firstname" class="control-label col-lg-2"> Headline </label>
                            <div class="col-lg-10">
                                <select name="newsid" class="form-control" id="exampleSelect1">
                                    <option> Select Headline News </option>

                                    <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($headline - > newsid); ?>"> <?php echo e($headline - > newstitle); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button disabled="" class="btn btn-success waves-effect waves-light" ng-disabled = "studentForm.firstname.$invalid || studentForm.menutype.$invalid">Save</button>
                                <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                            </div>
                        </div>
                    </div> <!-- .form -->
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
        <!--  <?php echo Form::close(); ?> -->
    </div> <!-- End row -->
</div> <!-- container -->

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="col-sm-4">
                <h4 class="pull-left page-title"> Headline News </h4> &nbsp;&nbsp;
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th> Headline Position  </th>
                                                <th> News Headline </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datavalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td> <?php echo e($datavalue - > titleposid); ?> </td>
                                                <td> <?php echo e($datavalue - > newstitle); ?> </td>
                                                <td>     
                                                    <div class="row">
                                                        
                                                        <span class="trash" style="margin-left: 10px;">
                                                            <a href="<?php echo e(URL('admin/headline-delete/'.$datavalue - > id)); ?>" class="submitdelete">
                                                                Delete</a></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>