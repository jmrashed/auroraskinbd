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


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Post</h4>
                </div>
            </div>

            {!! Form::open(array('url' => 'admin/user_update_post_approval', 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form','files' => true )) !!}

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
                                                {{$edit->newstitle}}

                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                                @if($edit->news_image!='')
                                                <img src="{{ URL::asset('uploads/news/'.$edit->news_image) }}" style="width:100%;"/>
                                                @endif
                                                <?php echo $edit->newsdetails; ?>
                                                <?php
                                                if ($edit->youtube != '') {
                                                    $ex = explode("https://www.youtube.com/watch?v=", $edit->youtube);
                                                    $newLink = 'https://www.youtube.com/embed/' . $ex[1];
                                                    ?>

                                                    <iframe width="100%" height="180" src="{{$newLink}}" frameborder="0" allowfullscreen></iframe>
                                                    <?php
                                                }
                                                ?>

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
                            <a href="{{URL('admin/reporter-post')}}"><button type="button" class="btn btn-default waves-effect waves-light">Back</button></a>
                            @if($edit->newsstatus==2)
                            <button class="btn btn-primary waves-effect waves-light" onmouseover="checkStatus(3)">Publish</button>
                            @endif
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
                                $userid = Auth::user()->id;
                                $newsid = $edit->newsid;
                                foreach ($data as $activedata) {
                                    $menuid = $activedata->menuid;

                                    $checksub = App\models\MenuModel::where('menuparent', $menuid)->get();
                                    $cat = App\models\UserModel::Where('userid', $userid)->where('menuid', $menuid)->first();
                                    if (sizeof($cat) > 0) {
                                        if ($cat->menuid == $menuid) {
                                            $menu = App\models\NewsModel::Where('newsmainid', $newsid)->where('menuid', $menuid)->first();
                                            ?>
                                            <span style="padding-left:10px;">
                                                <?php if (sizeof($menu) > 0) {
                                                    if ($menu->menuid == $menuid) {
                                                        ?> {{$activedata->menutitle}} </span> <br /> <?php }
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
                                                SEO Title : <br />
                                                {{$edit->newsseotitle}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                SEO Description : <br />
                                                {{$edit->newsseodetails}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                SEO key tag : <br />
                                                {{$edit->newsseodetails}}
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

    @include('backend/footer')

</div>


@stop()