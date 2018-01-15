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
        echo $reporter;
        $i = 0;
        foreach ($allowlist as $allowdata) {

            if ($reporter == '') {
                $allnews = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.newsstatus', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news_categoris.menuid', 'boi_news_categoris.newsmainid', 'admins.id', 'admins.name')
                                ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                ->leftJoin('admins', 'admins.id', '=', 'boi_news.userid')
                                ->where('boi_news.newsstatus', '2')->where('boi_news_categoris.menuid', $allowdata->menuid)->orderBy('boi_news.newsid', 'DESC')->get();
            } else {
                $allnews = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.newsstatus', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news_categoris.menuid', 'boi_news_categoris.newsmainid', 'admins.id', 'admins.name')
                                ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
                                ->leftJoin('admins', 'admins.id', '=', 'boi_news.userid')
                                ->where('boi_news.newsstatus', '2')->where('boi_news_categoris.menuid', $allowdata->menuid)->where('admins.id', $reporter)->orderBy('boi_news.newsid', 'DESC')->get();
            }

            $ii = 0;
            foreach ($allnews as $activedata) {

                $menuid = $activedata->menuid;
                ?>

                <tr>
                    <td><input type="checkbox" name="serial[]" id="serial{{$i}}" value="{{$activedata->menuid}}"></td>
                    <td>{{$activedata->newstitle}}

                        @if($activedata->newsstatus==2)
                        <div class="row-actions">
                            <span class="edit"><a href="{{URL('admin/view_post/'.$activedata->newsid)}}" class="submitdelete">View</a> </span>
                            @endif
                    </td>
                    <td>{{$activedata->name}}</td>
                    <td>
                        @if($activedata->newsstatus==1)
                        Save Draft
                        @elseif($activedata->newsstatus==2)
                        Approval for Publishing
                        @elseif($activedata->newsstatus==3)
                        Approved
                        @endif
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
                        {{$date[0].' '.$date[1].' '.$date[2]}}
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