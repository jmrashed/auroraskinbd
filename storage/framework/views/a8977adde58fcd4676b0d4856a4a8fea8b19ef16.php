<?php $__env->startSection('content'); ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="pull-left page-title">Categories</h4>
                </div>

                <div class="col-sm-8">
                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success" style="text-align: center">  <?php echo Session::get('success'); ?></div>
                    <?php endif; ?>

                    

                    <?php if($errors->has('menutitle')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors - > first('menutitle')); ?></strong>
                    </span>
                    <?php endif; ?>

                    <?php if($errors->has('menuslug')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors - > first('menuslug')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>



            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="panel panel-default" id="replace">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Category</h3>
                        </div>
                        <div class="panel-body" ng-app = "mainApp" ng-controller = "studentController">
                            <?php echo Form::open(array('url' => 'superadmin/categoriessubmit', 'method' => 'post','name' => 'studentForm','novalidate','files' => true)); ?>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form">

                                        <div class="form-group sr-only">
                                            <label for="firstname" class="control-label col-lg-12">Menu Position Id</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" id="menutitle" name="menuposid" type="text" 
                                                       value="<?php echo $lastid->menuposid+1;
                                                       ?>" ng-minlength="4" required>

                                                <span style = "color:red" ng-show = "studentForm.menutitle.$dirty && studentForm.menutitle.$invalid">
                                                    <span ng-show = "studentForm.menutitle.$error.required">Name is required.</span>
                                                </span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="firstname" class="control-label col-lg-12">Name</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" id="menutitle" name="menutitle" type="text" ng-model="name" ng-minlength="4" required>

                                                <span style = "color:red" ng-show = "studentForm.menutitle.$dirty && studentForm.menutitle.$invalid">
                                                    <span ng-show = "studentForm.menutitle.$error.required">Name is required.</span>
                                                </span>
                                            </div>
                                        </div>
                                        <h6>&nbsp;</h6>

                                        <div class="form-group ">
                                            <label for="firstname" class="control-label col-lg-12">Slug</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" id="slug" name="menuslug" type="text">
                                            </div>
                                        </div>
                                        <h6>&nbsp;</h6>
                                        <div class="form-group ">
                                            <label for="firstname" class="control-label col-lg-12">Parent</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="parentmenu">
                                                    <option value="none">None</option>
                                                    <?php
                                                    if($data)
                                                    foreach ($data as $activedata) {
                                                        ?>
                                                        <option value="<?php echo e($activedata - > menuid); ?>"><?php echo e($activedata - > menutitle); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <h1>&nbsp;</h1>
                                        <div class="form-group ">
                                            <label for="firstname" class="control-label col-lg-12">Description</label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" id="description" name="description"></textarea>
                                            </div>
                                        </div>
                                        <h1>&nbsp;</h1>
                                        <div class="form-group ">
                                            <label for="firstname" class="control-label col-lg-12">Status</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h1>&nbsp;</h1>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-success waves-effect waves-light" disabled="" ng-disabled = "studentForm.menutitle.$invalid">Save</button>
                                                <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <?php echo Form::close(); ?>

                        </div>


                    </div>
                </div>


                <div class="col-md-8">
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
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $activedata) {
                                                $menuid = $activedata->menuid;

                                                $checksub = App\models\MenuModel::where('menuparent', $menuid)->get();
                                                //dd($checksub);
                                                ?>

                                                <tr>
                                                    <td><input type="checkbox" name="serial[]" id="serial<?php echo e($i); ?>" value="<?php echo e($activedata - > menuid); ?>"></td>
                                                    <td><?php echo e($activedata - > menutitle); ?>

                                                        <div class="row-actions">
                                                            <span class="edit"><a href="JavaScript:void()" onclick="edit('<?php echo e($activedata - > menuid); ?>')">Edit</a> | </span>

                                                            <span class="trash">
                                                                <a href="<?php echo e(URL('superadmin/categoriesdelete/'.$activedata - > menuid)); ?>" class="submitdelete">
                                                                    Delete</a></span>
                                                        </div>
                                                    </td>
                                                    <td><?php echo e($activedata - > menudescription); ?></td>
                                                    <td>
                                                        <?php echo e($activedata - > menuslug); ?>

                                                    </td>
                                                    <td>


                                                        <?php if($activedata->menustatus==1): ?>

                                                        <img src="<?php echo e(URL::asset('backend_source/images/active.png')); ?>" width="22" height="22" />

                                                        <?php else: ?>

                                                        <img src="<?php echo e(URL::asset('backend_source/images/notactive.png')); ?>" width="22" height="22" />
                                                        <?php endif; ?>
                                                    </td>

                                                </tr>

                                                <?php
                                                if ($checksub) {
                                                    foreach ($checksub as $activedata) {
                                                        ?>
                                                        <tr>
                                                            <td><input type="checkbox" name="serial[]" id="serial<?php echo e($i); ?>" value="<?php echo e($activedata - > menuid); ?>"></td>
                                                            <td> __ <?php echo e($activedata - > menutitle); ?>

                                                                <div class="row-actions">
                                                                    <span class="edit"><a href="JavaScript:void()" onclick="edit('<?php echo e($activedata - > menuid); ?>')">Edit</a> | </span>

                                                                    <span class="trash">
                                                                        <a href="<?php echo e(URL('superadmin/categoriesdelete/'.$activedata - > menuid)); ?>" class="submitdelete">
                                                                            Delete</a></span>
                                                                </div>
                                                            </td>
                                                            <td><?php echo e($activedata - > menudescription); ?></td>
                                                            <td>
                                                                <?php echo e($activedata - > menuslug); ?>

                                                            </td>
                                                            <td>


                                                                <?php if($activedata->menustatus==1): ?>

                                                                <img src="<?php echo e(URL::asset('backend_source/images/active.png')); ?>" width="22" height="22" />

                                                                <?php else: ?>

                                                                <img src="<?php echo e(URL::asset('backend_source/images/notactive.png')); ?>" width="22" height="22" />
                                                                <?php endif; ?>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                                <?php
                                                $i++;
                                            }
                                            ?>

                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Slug</th>
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