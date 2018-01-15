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
    }

</style>


<?php /* ?><div class="content-page">
  <!-- Start content -->
  <div class="content">
  <div class="container">
  <!-- Page-Title -->
  <div class="row">
  <div class="col-sm-12">
  <h4 class="pull-left page-title">Update Post</h4>
  </div>
  </div>

  {!! Form::open(array('url' => 'superadmin/user_update_post', 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}

  <input class="form-control" id="id" name="id" type="hidden" value="{{$edit->newsid}}">

  <div class="row">
  <div class="col-md-8">
  <div class="panel panel-default" id="replace">
  <div class="panel-body">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="form">

  <div class="form-group">

  <div class="col-lg-12">
  <input class="form-control" id="title" name="title" type="text" ng-model="title" required placeholder="Enter title here" value="{{$edit->newstitle}}">

  </div>
  <!--<h4>&nbsp;</h4>
  <div class="col-lg-12">
  <button class="btn btn-default waves-effect" type="button" data-toggle="modal" data-target="#full-width-modal"><i class="md md-perm-media"></i> Add Media</button>

  </div>-->
  </div>

  <div class="form-group ">
  <div class="col-lg-12">
  <textarea class="form-control" id="article-ckeditor" name="article_ckeditor" style="height:400px;" placeholder="Description">{{$edit->newsdetails}}</textarea>
  </div>
  </div>

  <div class="form-group">
  <div class="col-lg-12">
  <div class="fileUpload btn btn-purple waves-effect waves-light">
  <span>
  <i class="ion-upload m-r-5"></i>Upload
  </span>
  <input class="upload" type="file" name="userfile">
  </div>
  @if($edit->news_image!='')
  <img src="{{ URL::asset('uploads/news/'.$edit->news_image) }}" width="100" height="100" />
  @endif
  </div>
  </div>



  <div class="form-group">
  <div class="col-lg-12">
  <input class="form-control" id="youtube" name="youtube" type="text" value="{{$edit->youtube}}" placeholder="Youtube Url">
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
  <h3 class="panel-title">Publish</h3>
  </div>


  <div class="panel-heading">
  <button class="btn btn-default waves-effect waves-light" onmouseover="checkStatus(1)" ng-disabled = "studentForm.title.$invalid"> Unpublished </button>
  <button class="btn btn-primary waves-effect waves-light" onmouseover="checkStatus(2)" ng-disabled = "studentForm.title.$invalid">Approval for Publishing</button>

  <input type="hidden" name="newsstatus" id="newsstatus" readonly="readonly" value="{{$edit->newsstatus}}"/>

  <!--<button class="btn btn-default waves-effect" type="button" onclick="goBack()">Cancel</button>-->
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
  foreach($data as $activedata)
  {
  $menuid = $activedata->menuid;
  $cat = App\models\UserModel::Where('userid' , Auth::user()->id)->where('menuid' , $menuid)->first();

  $checksub = App\models\MenuModel::where('menuparent',$menuid)->get();
  if(sizeof($cat)>0)
  {
  if($cat->menuid==$menuid)
  {
  $menu = App\models\NewsModel::Where('newsmainid' , $newsid)->where('menuid' , $menuid)->first();

  ?>
  <span style="padding-left:10px;"><input type="checkbox" class="control-label" <?php if(sizeof($cat)>0){if($menu->menuid==$menuid){?> checked="checked" <?php }}?> value="{{$activedata->menuid.'_0'}}" name="categories[]" /> {{$activedata->menutitle}} </span> <br />
  <?php
  }
  }
  ?>
  <?php
  if($checksub)
  {
  foreach($checksub as $activedata)
  {
  $submenuid = $activedata->menuid;
  $subcat = App\models\UserModel::Where('userid' , Auth::user()->id)->where('menusubid' , $submenuid)->first();
  if(sizeof($subcat)>0)
  {
  //echo 'Test';
  if($subcat->menusubid==$submenuid)
  {
  $menusubcat = App\models\NewsModel::Where('newsmainid' , $newsid)->where('menusubid' , $submenuid)->first();

  ?>
  <span style="padding-left:30px;"><input type="checkbox" class="control-label" value="{{$menuid.'_'.$activedata->menuid}}" <?php if(sizeof($menusubcat)>0){if($menusubcat->menuid==$menuid){?> checked="checked" <?php }}?> name="categories[]" /> {{$activedata->menutitle}} </span> <br />
  <?php
  }
  }
  ?>
  <?php
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

  <div class="col-md-4">
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
  </div>

  <div class="col-md-8">
  <div class="panel panel-default" id="replace">
  <div class="panel-heading">
  <h3 class="panel-title">SEO</h3>
  </div>
  <div class="panel-body">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="form">

  <div class="form-group">
  <div class="col-lg-12">
  <input class="form-control" id="seotitle" name="seotitle" type="text" value="{{$edit->newsseotitle}}" placeholder="SEO title here">
  </div>
  </div>

  <div class="form-group">
  <div class="col-lg-12">
  <textarea class="form-control" id="seodescription" name="seodescription" style="height:200px;" placeholder="SEO Description">{{$edit->newsseodetails}}</textarea>
  </div>
  </div>

  <div class="form-group">
  <div class="col-lg-12">
  <input class="form-control" id="seometa" name="seometa" type="text" value="{{$edit->newsseodetails}}" placeholder="SEO key tag">
  </div>
  </div>

  </div>

  </div>

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
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div>


  @include('backend/footer')

  </div><?php */ ?>
jasdbfadsb fuadshnfuadshfnuadsfunasdhfui hasd fuhadsfunha uhadsfnuahsdfuinahsdufi
<?php
echo $title;
echo $edit->newsid;
?>
@stop()