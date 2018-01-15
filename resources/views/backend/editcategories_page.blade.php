
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Category</h3>

    </div>
    <div class="panel-body" ng-app = "mainApp" ng-controller = "studentController">
        {!! Form::open(array('url' => 'superadmin/categoriesupdate', 'method' => 'post','name' => 'studentForm','novalidate','files' => true)) !!}

        <input type="hidden" name="menuid" value="{{$edit - > menuid}}">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form">

                    <div class="form-group">
                        <label for="firstname" class="control-label col-lg-12">Name</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="name" name="menutitle" type="text" ng-model="menutitle" ng-minlength="4" value="{{$edit - > menutitle}}" required>
                            </span>
                        </div>
                    </div>
                    <h6>&nbsp;</h6>

                    <div class="form-group ">
                        <label for="firstname" class="control-label col-lg-12">Slug</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="menuslug" name="menuslug" type="text" value="{{$edit - > menuslug}}">
                        </div>
                    </div>
                    <h6>&nbsp;</h6>
                    <div class="form-group ">

                        <label for="firstname" class="control-label col-lg-12">Parent</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="menuparent">
                                <?php
                                if ($edit->menuparent != 'none') {
                                    $p = $edit->menuparent;
                                    $checksub = App\models\MenuModel::where('menuid', $p)->first();
                                    ?>


                                    <option value="{{$checksub - > menuid}}">{{$checksub - > menutitle}}</option>
                                <?php } ?>
                                <option value="none">None</option>
                                <?php
                                foreach ($data as $activedata) {
                                    ?>
                                    <option value="{{$activedata - > menuid}}">{{$activedata - > menutitle}}</option>
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
                            <textarea class="form-control" id="menudescription" name="menudescription">{{$edit - > menudescription}}</textarea>
                        </div>
                    </div>
                    <h1>&nbsp;</h1>
                    <div class="form-group ">
                        <label for="firstname" class="control-label col-lg-12">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="menustatus">
                                <?php if ($edit->menustatus == '1') { ?>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                <?php } else { ?>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <h1>&nbsp;</h1>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success waves-effect waves-light" ng-disabled = "studentForm.name.$invalid">Save</button>
                            <button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {!! Form::close() !!}
    </div>


</div>
