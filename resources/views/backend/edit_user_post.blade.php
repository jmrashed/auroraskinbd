@extends('backend.dashboard')



@section('content')

<style type="text/css">

    /* layout.css Style */

    .upload-drop-zone {

        height: 200px;

        border-width: 2px;

        margin-bottom: 20px;

    }



    /* skin.css Style*/

    .upload-drop-zone {

        color: #ccc;

        border-style: dashed;

        border-color: #ccc;

        line-height: 200px;

        text-align: center

    }

    .upload-drop-zone.drop {

        color: #222;

        border-color: #222;

    }/*onoffswitch css area is end here*/

    .add_new_post_title{  color: white;  width: 100%; padding: 10px;  background: #66b88e;}

    .custom_header{  background: #66b88e;      margin: 5px -5px; padding: 15px; }

    .control-label{ font-size: 17px; color: white; font-weight: bold; text-align: left; }



</style>

<script>

    + function($) {

    'use strict';
// UPLOAD CLASS DEFINITION

// ======================



    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');
    var startUpload = function(files) {

    console.log(files)

    }



    uploadForm.addEventListener('submit', function(e) {

    var uploadFiles = document.getElementById('js-upload-files').files;
    e.preventDefault()



            startUpload(uploadFiles)

    })



            dropZone.ondrop = function(e) {

            e.preventDefault();
            this.className = 'upload-drop-zone';
            startUpload(e.dataTransfer.files)

            }



    dropZone.ondragover = function() {

    this.className = 'upload-drop-zone drop';
    return false;
    }



    dropZone.ondragleave = function() {

    this.className = 'upload-drop-zone';
    return false;
    }



    }(jQuery);</script>

<div class="content-page">

    <!-- Start content -->

    <div class="content">

        <div class="container">

            <!-- Page-Title --> 

            <!-- Page-Title -->

            <div class="row">



                <h4 class="pull-left page-title add_new_post_title">Update Post</h4> 



                @if(Session::has('success'))



                <div class="col-md-offset-4 col-sm-2">

                    <a href="{{ url('admin/user_newadd')}}"><button class="btn btn-default waves-effect" type="button" style="margin-top:5px;">Add New</button></a>

                </div>



                <div class="col-sm-6">

                    <div class="alert alert-success" style="text-align: center">  {!!Session::get('success')!!}</div>

                </div>

                @endif

            </div>





            {!! Form::open(array('url' => 'admin/user_update_post', 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}



            <input class="form-control" id="id" name="id" type="hidden" value="{{$edit - > newsid}}">



            <div class="row">

                <div class="col-md-8">

                    <div class="panel panel-default" id="replace">

                        <div class="panel-body">

                            <div style="" class="row custom_header">



                                <div class="form-group">

                                    <label class="control-label col-sm-2">Sub Title 1 </label>

                                    <div class="col-sm-10">

                                        <input class="form-control"  name="news_sub_title_1" type="text" title="Enter Subtitle 1 title optional"   placeholder="Enter Subtitle 1 title " value="{{$edit - > news_sub_title_1}}"> 

                                    </div>

                                </div>







                                <div class="form-group">

                                    <label class="control-label col-sm-2">Main Title <span style="color: red;"> * </span> <br><small style="text-align: left; color: red">[* required] </small></label>

                                    <div class="col-sm-10">

                                        <textarea  class="form-control"  style="height: 90px"  id="ckeditor" name="title" type="text" ng-model="title" required placeholder="Enter Main title here">{{$edit - > newstitle}}</textarea>                



                                    </div>

                                </div>







                                <div class="form-group">

                                    <label class="control-label col-sm-2">Sub Title 2 </label>

                                    <div class="col-sm-10">

                                        <input class="form-control" name="news_sub_title_2" type="text"  title="Enter Subtitle 2 title optional"   placeholder="Enter Subtitle 2 title"  value="{{$edit - > news_sub_title_2}}"> 

                                    </div>

                                </div>

                            </div>







                            <div class="form-group ">

                                <div class="col-lg-12">

                                    <textarea class="form-control" id="article-ckeditor" name="article_ckeditor" style="height:400px;" placeholder="Description">{{$edit - > newsdetails}}</textarea>

                                </div>

                            </div>



                            <div class="panel panel-default" id="replace">

                                <div class="form-group">

                                    <div class="col-lg-3">

                                        <div class="fileUpload btn btn-purple waves-effect waves-light">

                                            <span>

                                                <i class="ion-upload m-r-5"></i>Featured Image

                                            </span>

                                            <input class="upload" type="file" name="userfile" id="photo" onChange="PreviewImage();">

                                        </div>

                                    </div>



                                    <div class="col-lg-9">

                                        <div id="uploadPreview12" style="width:100%; height:180px; border:1px solid #CCC;">

                                            @if($edit->news_image!='')

                                            <img id="uploadPreview" src="{{ URL::asset('uploads/news/'.$edit->news_image) }}" style="width:100%; height:180px;" />

                                            @else

                                            <img class="prodct_img" id="uploadPreview" src="{{ URL::asset('backend_source/images/default.jpg') }}" style="width:100%; height:180px;"/>

                                            @endif



                                        </div>

                                        <span style="color:#999">Dimensions : 945px x 529px</span>

                                    </div>



                                </div>

                                <div class="custom_header row">

                                    <div class="form-group">

                                        <div class="col-lg-12">

                                            <input class="form-control" id="youtube" name="youtube" type="text" value="{{$edit - > youtube}}" placeholder="Youtube Url">

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="col-lg-12">

                                            <input class="form-control" id="seotitle" name="seotitle" type="text" value="{{$edit - > newsseotitle}}" placeholder="SEO title here">

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="col-lg-12">

                                            <textarea class="form-control" id="seodescription" name="seodescription" style="height:200px;" placeholder="SEO Description">{{$edit - > newsseodetails}}</textarea>

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="col-lg-12">

                                            <input class="form-control" id="seometa" name="seometa" type="text" value="{{$edit - > newsseometatag}}" placeholder="SEO key tag">

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <?php $username = Auth::user()->name; ?>                             

                                        <input class="form-control" name="newsupdateby" type="hidden" value="<?= $username; ?>">

                                    </div>



                                </div>

                            </div>

                        </div>

                    </div>   

                </div>



                <div class="col-md-4">

                    <div class="panel panel-default" id="replace">

                        <div class="panel-heading">

                            <h3 class="panel-title">Publish</h3>

                        </div>





                        <div class="panel-heading">

                            @if($edit->newsstatus==3)

                            <button type="button" class="btn btn-default waves-effect waves-light" onmouseover="checkStatus(1)" ng-disabled = "studentForm.title.$invalid" onclick="unpublish_post1({{$edit - > newsid}})" style="margin: 2px;"> 

                                Unpublished </button>

                            @endif

                            <button class="btn btn-primary waves-effect waves-light" onmouseover="checkStatus(3)" ng-disabled = "studentForm.title.$invalid" style="margin: 2px;">Publish</button>



                            <input type="hidden" name="newsstatus" id="newsstatus" readonly="readonly" value="{{$edit - > newsstatus}}"/>



                            <button class="btn btn-default waves-effect" type="button" onclick="goBack()" style="margin: 2px;">Back</button>



                            @if($edit->top_news > 0)



                            <button class="btn btn-default waves-effect" type="button" onclick="remove_top1({{$edit - > newsid}})" style="margin: 2px;"> Remove Top News</button>



                            @endif

                            <?php
                            $newsslug = strip_tags($edit->newstitle);

                            $newsslugfilter = str_replace(' ', '-', $newsslug);

                            $newsslugfilter = str_replace(',', '', $newsslugfilter);
                            ?>

                            <a href="{{url('/')}}/{{$edit - > newsid}}/{{$newsslugfilter}}" class="btn btn-success" style="margin: 2px;">View</a>

                        </div>

                    </div>

                </div>



                <div class="col-md-4">

                    <div class="panel panel-default" id="replace">

                        <div class="panel-heading">

                            <h3 class="panel-title">Publish Section</h3>

                        </div>





                        <div class="panel-heading">



                            <div class="form-group">

                                {{-- < label for = "firstname" class = "control-label col-lg-2" > Position * < /label> --}}

                                <div class="col-lg-12">

                                    <input type="hidden" name="top_news_main" value="{{$edit - > top_news}}">

                                    <select name="top_news" class="form-control" id="exampleSelect1">



                                        @if($edit->top_news=="1")



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



                                        @elseif($edit->top_news=="2")

                                        <option value="2"> Position Two </option>

                                        <option value="1"> Position One </option>

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

                                        @elseif($edit->top_news=="3")

                                        <option value="3"> Position Three </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

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

                                        @elseif($edit->top_news=="4")

                                        <option value="4"> Position Four </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>



                                        <option value="3"> Position Three </option>



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

                                        @elseif($edit->top_news=="5")

                                        <option value="5"> Position Five </option>



                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

                                        <option value="3"> Position Three </option>

                                        <option value="4"> Position Four </option>



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

                                        @elseif($edit->top_news=="6")

                                        <option value="6"> Position Six </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

                                        <option value="3"> Position Three </option>

                                        <option value="4"> Position Four </option>

                                        <option value="5"> Position Five </option>

                                        <option value="7"> Position Seven </option>

                                        <option value="8"> Position Eight </option>

                                        <option value="9"> Position Nine </option>

                                        <option value="10"> Position Ten </option>

                                        <option value="11"> Position Eleven </option>

                                        <option value="12"> Position Tweleve </option>

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="7")

                                        <option value="7"> Position Seven </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

                                        <option value="3"> Position Three </option>

                                        <option value="4"> Position Four </option>

                                        <option value="5"> Position Five </option>

                                        <option value="6"> Position Six </option>



                                        <option value="8"> Position Eight </option>

                                        <option value="9"> Position Nine </option>

                                        <option value="10"> Position Ten </option>

                                        <option value="11"> Position Eleven </option>

                                        <option value="12"> Position Tweleve </option>

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="8")

                                        <option value="8"> Position Eight </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

                                        <option value="3"> Position Three </option>

                                        <option value="4"> Position Four </option>

                                        <option value="5"> Position Five </option>

                                        <option value="6"> Position Six </option>

                                        <option value="7"> Position Seven </option>



                                        <option value="9"> Position Nine </option>

                                        <option value="10"> Position Ten </option>

                                        <option value="11"> Position Eleven </option>

                                        <option value="12"> Position Tweleve </option>

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="9")

                                        <option value="9"> Position Nine </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

                                        <option value="3"> Position Three </option>

                                        <option value="4"> Position Four </option>

                                        <option value="5"> Position Five </option>

                                        <option value="6"> Position Six </option>

                                        <option value="7"> Position Seven </option>

                                        <option value="8"> Position Eight </option>

                                        <option value="10"> Position Ten </option>

                                        <option value="11"> Position Eleven </option>

                                        <option value="12"> Position Tweleve </option>

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="10")

                                        <option value="10"> Position Ten </option>

                                        <option value="1"> Position One </option>

                                        <option value="2"> Position Two </option>

                                        <option value="3"> Position Three </option>

                                        <option value="4"> Position Four </option>

                                        <option value="5"> Position Five </option>

                                        <option value="6"> Position Six </option>

                                        <option value="7"> Position Seven </option>

                                        <option value="8"> Position Eight </option>

                                        <option value="9"> Position Nine </option>

                                        <option value="11"> Position Eleven </option>

                                        <option value="12"> Position Tweleve </option>

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="11")

                                        <option value="11"> Position Eleven </option>

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

                                        <option value="12"> Position Tweleve </option>

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="12")

                                        <option value="12"> Position Tweleve </option>

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

                                        <option value="13"> Position Thirteen </option>

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>



                                        @elseif($edit->top_news=="13")

                                        <option value="13"> Position Thirteen </option>

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

                                        <option value="14"> Position Fourteen </option>

                                        <option value="15"> Position Fifteen </option>





                                        @elseif($edit->top_news=="14")

                                        <option value="14"> Position Fourteen </option>

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

                                        <option value="15"> Position Fifteen </option>





                                        @elseif($edit->top_news=="15")

                                        <option value="15"> Position Fifteen </option>

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



                                        @else

                                        <option value=""> Select Top news Position </option>

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

                                        @endif
                                        <option value="100"> Remove from Top News </option>

                                    </select>

                                </div>

                            </div>





                            <span style="padding-left:10px;"><input type="checkbox" class="control-label" value="1" name="today_program" <?php if ($edit->today_program == 1) { ?> checked="checked" <?php } ?>/> আজকের বিশেষ আয়োজন</span> <br />

                            <span style="padding-left:10px;"><input type="checkbox" class="control-label" value="1" name="latest" <?php if ($edit->latest == 1) { ?> checked="checked" <?php } ?>/> সর্বশেষ</span> <br />

                            <span style="padding-left:10px;"><input type="checkbox" class="control-label" value="1" name="nirbachito" <?php if ($edit->nirbachito == 1) { ?> checked="checked" <?php } ?>/> নির্বাচিত</span> <br />

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
                                $newsid = $edit->newsid;

                                foreach ($data as $activedata) {

                                    $menuid = $activedata->menuid;



                                    $cat = App\models\NewsModel::Where('newsmainid', $newsid)->where('menuid', $menuid)->first();





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

                                            $subcat = App\models\NewsModel::Where('newsmainid', $newsid)->where('menusubid', $submenuid)->first();

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



                <!--<div class="col-md-4">
                
                <div class="panel panel-default" id="replace">
                
                <div class="panel-heading">
                
                <h3 class="panel-title">Tags</h3>
                
                </div>
                
                
                
                <div class="panel-body">
                
                <div class="form-group ">
                
                
                
                <div class="col-sm-9">
                
                <input type="text" class="form-control" name="tags" />
                
                </div>
                
                <div class="col-sm-2">
                
                <button class="btn btn-default waves-effect" type="button">Add</button>
                
                </div>
                
                
                
                <div class="col-sm-12">
                
                <p>Separate tags with commas</p>
                
                </div>
                
                
                
                </div>
                
                </div>
                
                
                
                </div>
                
                </div>-->









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