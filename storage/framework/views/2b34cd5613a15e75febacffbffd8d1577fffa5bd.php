<?php $__env->startSection('content'); ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="pull-left page-title">Media</h4> &nbsp;&nbsp;
                    <a href="<?php echo e(url(Request::segment(1).'/newaddmedia')); ?>"><button class="btn btn-default waves-effect" type="button" style="margin-top:5px;">Add New</button></a>
                </div>


                <div class="col-sm-8">
                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success" style="text-align: center">  <?php echo Session::get('success'); ?></div>
                    <?php endif; ?>

                    

                    <?php if($errors->has('menutitle')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('menutitle')); ?></strong>
                    </span>
                    <?php endif; ?>

                    <?php if($errors->has('menuslug')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('menuslug')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>



            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                            <h3 class="panel-title">All Menu Data</h3>
                        </div>-->
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                <th>Title</th>
                                                <th>Youtube</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $activedata) {
                                                ?>

                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial<?php echo e($i); ?>" value="<?php echo e($activedata->id); ?>"></td>
                                                    <td><?php echo e($activedata->title); ?>

                                                        <div class="row-actions">
                                                            <span class="edit"><a href="<?php echo e(URL(Request::segment(1).'/media-edit/'.$activedata->id)); ?>">Edit</a> | </span>

                                                            <span class="trash">
                                                                <a href="<?php echo e(URL(Request::segment(1).'/media-delete/'.$activedata->id)); ?>" class="submitdelete">
                                                                    Delete</a></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo e($activedata->youtube); ?>

                                                    </td>
                                                    <td>
                                                        <?php if($activedata->status==1): ?>
                                                        Draft
                                                        <?php else: ?>
                                                        Publish
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                <th>Title</th>
                                                <th>Youtube</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>

                                    
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>




        </div> <!-- container -->

    </div> <!-- content -->

    <?php echo $__env->make('backend/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>