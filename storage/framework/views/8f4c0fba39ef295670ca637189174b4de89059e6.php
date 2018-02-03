<?php $__env->startSection('content'); ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <?php if(Session::has('pagetitle')): ?>
                        <?php echo Session::get('pagetitle'); ?>

                        <?php endif; ?>
                        Gallery Manage
                    </h4>
                    <!-- <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Datatable</li>
                    </ol> -->
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?php echo e(url(Request::segment(1).'/newaddgallery')); ?>"><button class="btn btn-purple waves-effect waves-light m-b-5" type="button">Add Gallery</button></a></li>

                        <?php if(Request::segment(1)=='admin'): ?>
                        <li><a href="JavaScript:void(0)" onclick="DeleteGallery1()"><button class="btn btn-danger waves-effect waves-light m-b-5" type="button">Delete</button></a></li>
                        <?php else: ?>
                        <li><a href="JavaScript:void(0)" onclick="DeleteGallery()"><button class="btn btn-danger waves-effect waves-light m-b-5" type="button">Delete</button></a></li>

                        <?php endif; ?>

                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Gallery Data</h3>


                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-success" style="text-align: center">  <?php echo Session::get('success'); ?></div>
                            <?php endif; ?>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Gallery Album</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $activedata) {
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial<?php echo e($i); ?>" value="<?php echo e($activedata->id); ?>"></td>
                                                    <td><?php echo e($activedata->title); ?></td>
                                                    <td><img src="<?php echo e(URL::asset('uploads/gallery/'.$activedata->image)); ?>" width="40" height="40" style="border-radius:45px;"></td>
                                                    <td><?php echo e($activedata->atitle); ?></td>
                                                    <td>
                                                        <?php if($activedata->status==1): ?>

                                                        <button class="btn btn-info waves-effect waves-light m-b-5">Active</button>

                                                        <?php else: ?>

                                                        <button class="btn btn-danger waves-effect waves-light m-b-5">Unactive</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(url(Request::segment(1).'/gallery-edit/'.$activedata->id)); ?>">
                                                            <button class="btn btn-icon waves-effect waves-light btn-purple m-b-5">
                                                                Edit <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->

    <?php echo $__env->make('backend/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>