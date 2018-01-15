<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
            <th>Title</th>
            <th>Status</th>
            <th>Categories</th>

            <th>	Date</th>
        </tr>
    </thead>


    <tbody id="replace">
        <?php
        $i = 0;
        foreach ($data as $activedata) {
            $menuid = $activedata->menuid;
            ?>

            <tr>
                <td><input type="checkbox" name="serial[]" id="serial{{$i}}" value="{{$activedata->menuid}}"></td>
                <td>{{$activedata->newstitle}}

                    @if($activedata->newsstatus==1)
                    <div class="row-actions">
                        <span class="edit"><a href="{{URL('admin/user_post_edit/'.$activedata->newsid)}}">Edit</a> | </span>

                        <span class="trash">
                            <a href="{{URL('admin/user_post_delete/'.$activedata->newsid)}}" class="submitdelete">
                                Delete</a></span>
                    </div>
                    @endif
                </td>
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
            $i++;
        }
        ?>

    </tbody>
    <thead>
        <tr>
            <th><input type="checkbox" onchange="checkAll(this)" name="chk[]"  id="checkedVal"/></th>
            <th>Title</th>
            <th>Status</th>
            <th>Categories</th>

            <th>Date</th>
        </tr>
    </thead>
</table>