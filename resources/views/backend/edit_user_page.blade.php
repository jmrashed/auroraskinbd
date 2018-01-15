@extends('backend.dashboard')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update User</h4>
                </div>
            </div>

            {!! Form::open(array('url' => 'superadmin/update_user', 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}
            <input type="hidden" name="id" value="{{$edit - > id}}" />
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default" id="replace">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form">

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <select name="type" id="type" class="form-control">

                                                    @if($edit->type==1)
                                                    <option value="1">Editor</option>
                                                    <option value="2">Reporter</option>
                                                    @elseif($edit->type==2)
                                                    <option value="2">Reporter</option>
                                                    <option value="1">Editor</option>
                                                    @endif
                                                    <option value="">Please Select</option>
                                                    <option value="1">Editor</option>
                                                    <option value="2">Reporter</option>
                                                </select>

                                            </div>
                                        </div>


                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="name" name="name" type="text" ng-model="name" required value="{{$edit - > name}}" placeholder="Enter name">


                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="designation" name="designation" type="text" ng-model="designation" required value="{{$edit - > desi}}" placeholder="Enter designation">


                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-12">
                                                <input class="form-control" id="email" name="email" type="text" ng-model="email" required value="{{$edit - > email}}" placeholder="Enter email ">


                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors - > first('email')}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors - > has('password') ? ' has-error' : ''}}">

                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control" ng-model="password" name="password" value="" placeholder="Password">

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors - > first('password')}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="panel panel-default" id="replace">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Publish</h3>
                                                </div>


                                                <div class="panel-heading">
                                                    <button class="btn btn-default waves-effect waves-light" >Save Draft</button>
                                                    <button class="btn btn-primary waves-effect waves-light">Publish</button>

                                                    <input type="hidden" name="newsstatus" id="newsstatus" value="{{$edit - > status}}" readonly="readonly"/>

                                                    <!--<button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>    
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default" id="replace">
                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <?php
                                $newsid = $edit->id;
                                foreach ($data as $activedata) {
                                    $menuid = $activedata->menuid;

                                    $cat = App\models\UserModel::Where('userid', $newsid)->where('menuid', $menuid)->first();


                                    $checksub = App\models\MenuModel::where('menuparent', $menuid)->get();
                                    //dd($checksub);
                                    ?>
                                    <span style="padding-left:10px;">
                                        <input type="checkbox" class="control-label" value="{{$activedata - > menuid.'_0'}}" <?php if (sizeof($cat) > 0) {
                                    if ($cat->menuid == $menuid) {
                                            ?> checked="checked" <?php }
                                   }
                                    ?>name="categories[]" /> {{$activedata - > menutitle}} </span> <br />
                                        <?php
                                        if ($checksub) {
                                            foreach ($checksub as $activedata) {
                                                $submenuid = $activedata->menuid;
                                                $subcat = App\models\UserModel::Where('userid', $newsid)->where('menusubid', $submenuid)->first();
                                                if (sizeof($subcat) > 0) {
                                                    //echo 'Test';
                                                    if ($subcat->menusubid == $submenuid) {
                                                        ?>
                                                    <span style="padding-left:30px;"><input type="checkbox" class="control-label" value="{{$menuid.'_'.$activedata - > menuid}}" checked="checked" name="categories[]" /> {{$activedata - > menutitle}} </span> <br />

                                                    <?php
                                                }
                                            } else {
                                                ?>


                                                <span style="padding-left:30px;"><input type="checkbox" class="control-label" value="{{$menuid.'_'.$activedata - > menuid}}" name="categories[]" /> {{$activedata - > menutitle}} </span> <br />
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>


                    </div>
                </div>



            </div>

            {!! Form::close() !!}

        </div> <!-- container -->
    </div> <!-- content -->

    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="full-width-modalLabel">Add Media</h4>
                </div>

                <div class="content">
                    <div class="container" ng-app = "mainApp" ng-controller = "studentController">
                        <!-- Page-Title -->


                        <div class="row">
                            <h1></h1>         
                            <div class="col-md-12">
                                <div class="panel panel-default" id="replace">

                                    <div class="modal-content p-0">
                                        <ul class="nav nav-tabs navtab-bg nav-justified">
                                            <li class="active">
                                                <a href="#home-2" data-toggle="tab" aria-expanded="true"> 
                                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                                    <span class="hidden-xs">Upload Files</span> 
                                                </a> 
                                            </li> 
                                            <li class="" id="cke_81_uiElement cke_80_label"> 
                                                <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                                    <span class="hidden-xs">Media Library</span> 
                                                </a> 
                                            </li> 
                                            <li class=""> 
                                                <a href="#messages-2" data-toggle="tab" aria-expanded="false"> 
                                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                                    <span class="hidden-xs">Insert Url</span> 
                                                </a> 
                                            </li> 

                                        </ul> 

                                        <div class="tab-content"> 
                                            <div class="tab-pane active" id="home-2"> 
                                                <div> 
                                                    <p>
                                                    <div class="container">
                                                        <div class="panel panel-default">
                                                  <!--        <div class="panel-heading"><strong>Upload Files</strong> <small>Bootstrap files upload</small></div>-->
                                                            <div class="panel-body">

                                                                <!-- Standar Form -->


                                                                <!-- Drop Zone -->
                                                                <!--          <h4>Or drag and drop files below</h4>-->
                                                                <div class="upload-drop-zone" id="drop-zone">


                                                                    <div class="fileUpload btn btn-purple waves-effect waves-light">
                                                                        <span>
                                                                            <i class="ion-upload m-r-5"></i>Upload
                                                                        </span>
                                                                        <input class="upload" type="file">
                                                                    </div>

                                                                    <!--              <button type="file" class="btn btn-lg btn-primary" id="js-upload-submit">Select Files</button>-->

                                                                </div>

                                                                <!-- Progress Bar -->
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                                        <span class="sr-only">60% Complete</span>
                                                                    </div>
                                                                </div>          
                                                            </div>
                                                        </div>
                                                    </div> <!-- /container -->
                                                    </p> 

                                                </div> 
                                            </div> 
                                            <div class="tab-pane" id="profile-2">
                                                <p>Fulfilled direction use continual set him propriety continued. Saw met applauded favourite deficient engrossed concealed and her. Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. Dashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined. </p> 
                                                <p>When be draw drew ye. Defective in do recommend suffering. House it seven in spoil tiled court. Sister others marked fat missed did out use. Alteration possession dispatched collecting instrument travelling he or on. Snug give made at spot or late that mr. </p> 
                                            </div> 
                                            <div class="tab-pane" id="messages-2">
                                                <p>When be draw drew ye. Defective in do recommend suffering. House it seven in spoil tiled court. Sister others marked fat missed did out use. Alteration possession dispatched collecting instrument travelling he or on. Snug give made at spot or late that mr. </p> 
                                                <p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p> 
                                            </div> 

                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>

                <!--<div class="modal-body">
                    <h4>Text in a modal</h4>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                    <hr>
                    <h4>Overflowing text to show scroll behavior</h4>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>-->
                <!--            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                            </div>-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    @include('backend/footer')

</div>
@stop()