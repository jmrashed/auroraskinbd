<?php $__env->startSection('content'); ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="pull-left page-title">Reporter Posts</h4> &nbsp;&nbsp;
                    <!--<a href="<?php echo e(url('admin/user_newadd')); ?>"><button class="btn btn-default waves-effect" type="button" style="margin-top:5px;">Add New</button></a>-->
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

                                    <table width="100%" align="right">
                                        <tr>
                                            <td width="57%">All News Data</td>
                                            <td width="10%">
                                                <a href="JavaScript:void(0)" onclick="PublishNews()"><button class="btn btn-purple waves-effect waves-light m-b-5" type="button">Publish</button></a>
                                            </td>
                                            <td width="18%" align="right">
                                                <select name="categories" id="categories" class="form-control" onchange="searchNewsEditor()">
                                                    <option value="">Categories</option>
                                                    <?php
                                                    foreach ($categories as $categoriesallow) {
                                                        $cat = App\models\UserModel::Where('userid', Auth::user()->id)->where('menuid', $categoriesallow->menuid)->first();
                                                        if (sizeof($cat) > 0) {
                                                            if ($cat->menuid == $categoriesallow->menuid) {
                                                                ?>
                                                                <option value="<?php echo e($categoriesallow->menuid); ?>"><?php echo e($categoriesallow->menutitle); ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td width="15%">
                                                <select name="reporter" id="reporter" class="form-control" onchange="searchNewsEditor()">
                                                    <?php
                                                    if (Auth::user()->type == 2) {
                                                        ?>
                                                        <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                                                        <?php
                                                    } else {
                                                        echo '<option value="">Reporter</option>';
                                                        foreach ($reporter as $reporteractive) {
                                                            ?>
                                                            <option value="<?php echo e($reporteractive->id); ?>"><?php echo e($reporteractive->name); ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <div style="clear:both; padding-top:10px;"></div>

                                    <div id="replace">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                    <th>Title</th>
                                                    <th>Reporter</th>
                                                    <th>Status</th>
                                                    <th>Categories</th>

                                                    <th>	Date</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($allowlist as $allowdata) {

                                                    $allnews = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.newsstatus', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news_categoris.menuid', 'boi_news_categoris.newsmainid', 'admins.id', 'admins.name')
                                                                    ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                                                    ->leftJoin('admins', 'admins.id', '=', 'boi_news.userid')
                                                                    ->where('boi_news.newsstatus', '2')->where('boi_news_categoris.menuid', $allowdata->menuid)->orderBy('boi_news.newsid', 'DESC')->get();

                                                    $ii = 0;
                                                    foreach ($allnews as $activedata) {

                                                        $menuid = $activedata->menuid;
                                                        ?>

                                                        <tr>
                                                            <td><input type="checkbox" name="serial[]" id="serial<?php echo e($i); ?>" value="<?php echo e($activedata->newsid); ?>"></td>
                                                            <td><?php echo e($activedata->newstitle); ?>


                                                                <?php if($activedata->newsstatus==2): ?>
                                                                <div class="row-actions">
                                                                    <span class="edit"><a href="<?php echo e(URL('admin/view_post/'.$activedata->newsid)); ?>" class="submitdelete">View</a> </span>
                                                                    <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($activedata->name); ?></td>
                                                            <td>
                                                                <?php if($activedata->newsstatus==1): ?>
                                                                Save Draft
                                                                <?php elseif($activedata->newsstatus==2): ?>
                                                                Approval for Publishing
                                                                <?php elseif($activedata->newsstatus==3): ?>
                                                                Approved
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $newsid = $activedata->newsid;
                                                                $result = DB::table('boi_news_categoris')->select('boi_news_categoris.*', 'boi_menu.menuid', 'boi_menu.menutitle')
                                                                        ->leftjoin('boi_menu', 'boi_menu.menuid', '=', 'boi_news_categoris.menuid')
                                                                        ->where('boi_news_categoris.newsmainid', $newsid)
                                                                        /* ->groupBy('boi_news_categoris.menuid') */
                                                                        ->get();

                                                                if (sizeof($result) > 0) {
                                                                    foreach ($result as $categories) {
                                                                        echo $categories->menutitle . '<br />';
                                                                    }
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                $date = explode(' ', $activedata->newsupdatetime)
                                                                ?>
                                                                <?php echo e($date[0].' '.$date[1].' '.$date[2]); ?>

                                                            </td>

                                                        </tr>
                                                        <?php
                                                        $ii++;
                                                    }
                                                    $i++;
                                                }
                                                ?>

                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
                                                    <th>Title</th>
                                                    <th>Reporter</th>
                                                    <th>Status</th>
                                                    <th>Categories</th>

                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>




        </div> <!-- container -->

    </div> <!-- content -->

    <script type="text/javascript">

        function searchNews()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var categories = $("#categories").val();
            var reporter = $("#reporter").val();

            //alert(categories+"_"+reporter);

            $.ajax({
                method: "get",
                url: "<?php echo e(url('admin/search_news')); ?>",
                data: {categories: categories, reporter: reporter}
            })
                    .done(function (response) {
                        //alert(response);
                        $('#replace').html(response);
                        $('#datatable').dataTable();
                    });

        }

        function searchNewsEditor()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var categories = $("#categories").val();
            var reporter = $("#reporter").val();

            //alert(categories+"_"+reporter);

            $.ajax({
                method: "get",
                url: "<?php echo e(url('admin/search_news_editor')); ?>",
                data: {categories: categories, reporter: reporter}
            })
                    .done(function (response) {
                        //alert(response);
                        $('#replace').html(response);
                        $('#datatable').dataTable();
                    });

        }


    </script>

    <?php echo $__env->make('backend/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>