<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

use App\models\LaravelModel;
use App\models\BannerModel;
use App\models\MenuModel;
use App\models\NewsModel;
use App\models\UserModel;
use App\models\CommentsModel;
use App\models\VoteModel;
use App\models\AlbumModel;
use App\models\AdsModel;
use App\Headline;
use App\boi_news;
use App\boi_ads;

use Auth;
use Validator;
use DB;
use File;

class LaravelController extends Controller
{


    function admin()
    {

        return view('backend/login');
    }

    public function registration()
    {
        return view('backend/register');
    }

    public function registrationsubmit(Request $request)
    {

//dd($request->all());

// ==================== validation ==================

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
//'admin' => 'required',
        ]);

        $table = new LaravelModel();
        $table->name = $request->get('name');
        $table->email = $request->get('email');
        $table->password = bcrypt($request->get('password'));
        $table->save();

        return redirect::to('/registration')->with('success', 'Your Data Insert Successfully');
    }


    public function adminlogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',

        ]);


        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('dashboard');
        } else {
            return redirect::to('/admin')->with('sorry', 'your email or password incorrect');
        }
    }


    public function dashboard()
    {
        return view('backend/dashboard_middle');
    }

//============================== POSTS MANAGE ===========================

    public function posts()
    {

        $result = DB::table('boi_news')->select('boi_news.*', 'admins.id', 'admins.name')
            ->leftjoin('admins', 'admins.id', '=', 'boi_news.userid')
            ->orderBy('boi_news.newsid', 'DESC')->take(200)
            ->get();

        //	$result = DB::table('boi_news')->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(100)->get();
        return view('backend/post_page')->with('data', $result);
    }

    public function newadd()
    {
        $result = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend/addnewpost_page')->with('data', $result);
    }

//===================================== news headline ===================================


    public function hdn()
    {
        $result = DB::table('headlines')->select('headlines.*', 'boi_news.newsid', 'boi_news.newstitle')
            ->leftJoin('boi_news', 'boi_news.newsid', '=', 'headlines.newsid')
            ->orderBy('headlines.titleposid', 'ASC')
            ->take(20)
            ->get();

        return view('backend/addnewheadline_page')->with('data', $result);
    }

    public function submit_headline(Request $request)
    {
// ==================== validation ==================
//dd($request->all());


        $table = new Headline();
        $table->titleposid = $request->get('titleposid');
        $table->newsid = $request->get('newsid');
        $table->title = '';
        DB::table('headlines')
            ->where('titleposid', '>', $request->titleposid - 1)
            ->increment('titleposid');
        $table->save();
// return redirect()->back();
        return redirect::to('superadmin/headline')->with('success', 'Successfully Added.');
    }


    public function update_headline(Request $request)
    {
//dd($request->all());
        $input = $request->except('_token');

        $userid = Auth::user()->id;

        DB::table('headlines')->where('id', $request->get('id'))
            ->update(
                array(
                    'title' => $request->get('title'),

                )
            );

        return redirect::to('superadmin/headline');

    }


    public function headline_delete($id)
    {
        DB::table('headlines')->where('id', $id)->delete();
        return redirect::to('/superadmin/headline')->with('delete', 'Successfully Delete.');
    }

    public function headline_edit($id)
    {
        $edit = DB::table('headlines')->where('id', $id)->first();

        return view('backend.edit_headline')->with('edit', $edit);
    }

//========================================= news headline end ============================


    public function submit_post(Request $request, LaravelFacebookSdk $fb)
    {
//dd($request->all());
        if ($request->file('userfile') != '') {

            $folder_location = 'uploads/news';
            $image = $request->file('userfile');
            $file_name_image = 'boishakhi_' . time() . '.' . $image->getClientOriginalExtension();
            $success = $image->move($folder_location, $file_name_image);
        } else {
            $file_name_image = '';
        }

        $userid = Auth::user()->id;


        if ($request->get('heading_news') != '') {
            $heading_news = $request->get('heading_news');
        } else {
            $heading_news = 0;
        }

        if ($request->get('today_program') != '') {
            $today_program = $request->get('today_program');
        } else {
            $today_program = 0;
        }

        if ($request->get('latest') != '') {
            $latest = $request->get('latest');
        } else {
            $latest = 0;
        }

        if ($request->get('nirbachito') != '') {
            $nirbachito = $request->get('nirbachito');
        } else {
            $nirbachito = 0;
        }

        if ($request->top_news == "") {
            $top_news = 10000;
        } else {
            $top_news = $request->top_news;
        }
        $ckeditor_data = $request->get('article_ckeditor');
        $str_replace_data = str_replace('embed_tag', 'iframe', $ckeditor_data);

        //dd($str_replace_data);

        $table = new boi_news();
        $table->userid = $userid;
        $table->news_sub_title_1 = $request->get('news_sub_title_1');
        $table->newstitle = $request->get('title');
        $table->news_sub_title_2 = $request->get('news_sub_title_2');

        $table->newsdetails = $str_replace_data;
        $table->youtube = $request->get('youtube');
        $table->news_image = $file_name_image;
        $table->newsstatus = $request->get('newsstatus');
        $table->newsseotitle = $request->get('seotitle');
        $table->newsseometatag = $request->get('seometa');
        $table->newsseodetails = $request->get('seodescription');
        $table->readcount = '0';
        $table->top_news = $top_news;
        //$table->serial = '';
        $table->heading_news = $heading_news;
        $table->today_program = $today_program;
        $table->latest = $latest;
        $table->nirbachito = $nirbachito;
        $table->newsupdatetime = date('d F Y h:i:s');
        $table->newscreatetime = date('d F Y h:i:s');
        if ($request->top_news > 0) {
            DB::table('boi_news')
                ->where('top_news', '>', $request->top_news - 1)
                ->increment('top_news');
        }
        $table->save();

        $lastID = DB::table('boi_news')->where('userid', $userid)->orderBy('newsid', 'DESC')->take(1)->first();
        $last_newid = $lastID->newsid;


        //facebook auto post share
        // Here onoffswitch i used because user can submit the post on facebook or not. If status on then post autoshare to facebbok else post submit the news portal only.
//
//        if ($request->onoffswitch) {
//            $img_href = "http://www.boishakhionline.com/" . $folder_location . "/$file_name_image";
//            $slug = $request->get('title');
//            $newsslug = str_replace(' ', '-', $slug);
//            $href = "http://www.boishakhionline.com/" . $last_newid . "/$newsslug";
//            $content = [
//                "message" => '',
//                "name" => $request->get('title'),
//                "caption" => 'boishakhionline.com',
//                "description" => strip_tags($request->get('article_ckeditor')),
//                "link" => $href,
//                "picture" => $img_href,
//                "access_token" =>'EAABtacEZAI6kBAFAZA4JsRdlhvZB5WFi8xGPn0pmy2FhBX7oaqMMfuqlry33RwZAtXX5QSqqfrVIvZAxZCEKaxDvow1iHTz6jbzYIbRti5plMKsAEeDFf3dcZAUw8hc5BWmgYkzO2erriO8ikaW9aGEkk9M366sD1kZD'
//
//               // "access_token" => 'EAAazL9hbtdQBAOoVfCF3fRchW3hqqIHYS327FY9hBbDIiZBz0ZCcZAb4ZAzMtSFPFSvve9KZBzbZAvtByBWMegroIiAELQmCt98vScdMbhYjcYdut2uHRevojrfe2I33czJ3XH2f0HaVBa7Sp4cNBBOX6SqGn4kpXHDeDW06HKZBAZDZD'
//            ];
//            try {
//                $response = $fb->post('/207891002587587/feed/', $content);
//
//            } catch (\Facebook\Exceptions\FacebookSDKException $e) {
//                dd($e->getMessage());
//            }
//            $userNode = $response->getGraphUser();
//        }
//        //facebook auto post share end


        if (sizeof($request->get('categories')) > 0) {
            foreach ($request->get('categories') as $menus) {
                if ($name = explode("_", $menus)) {
                    $mid = $name[0];
                    $sid = $name[1];

                    DB::table('boi_news_categoris')->insert(
                        [
                            'menuid' => $mid,
                            'menusubid' => $sid,
                            'newsmainid' => $last_newid
                        ]
                    );
                } else {
                    DB::table('boi_news_categoris')->insert(
                        [
                            'menuid' => $menus,
                            'menusubid' => '',
                            'newsmainid' => $last_newid
                        ]
                    );
                }
            }
        }

//=============================== SERIAL ADDED =================================

        if ($request->get('serial') != '' && $request->get('top_news') == '1') {
            $serialsCheck = DB::table('boi_news')
                ->where([
                    ['newsid', '!=', $last_newid],
                    ['top_news', '=', '1'],
                    ['serial', '>=', $request->get('serial')],
                ])
                ->get();

            foreach ($serialsCheck as $numbercheck) {
                $newserial = $numbercheck->serial + 1;
                $newsid = $numbercheck->newsid;
                if ($numbercheck->serial <= 15) {
                    DB::table('boi_news')
                        ->where('newsid', $newsid)
                        ->update(array('serial' => $newserial));
                }
            }
        } else {
            return redirect::to('/superadmin/post-edit/' . $last_newid)->with('success', 'Successfully Added.');
        }

        return redirect::to('/superadmin/post-edit/' . $last_newid)->with('success', 'Successfully Added.');
//return redirect::to('admin/user_posts')->with('success', 'Successfully Added.');	
    }


    public function update_post(Request $request)
    {

        $input = $request->except('_token');

        $userid = Auth::user()->id;


        if ($request->get('heading_news') != '') {
            $heading_news = $request->get('heading_news');
        } else {
            $heading_news = 0;
        }

        if ($request->get('today_program') != '') {
            $today_program = $request->get('today_program');
        } else {
            $today_program = 0;
        }

        if ($request->get('latest') != '') {
            $latest = $request->get('latest');
        } else {
            $latest = 0;
        }

        if ($request->get('nirbachito') != '') {
            $nirbachito = $request->get('nirbachito');
        } else {
            $nirbachito = 0;
        }

        if ($request->top_news == "") {
            $top_news = 10000;
        } else {
            $top_news = $request->top_news;
        }

        $last_newid = $request->get('id');

//=============================== Edit New Position =================================

//if($request->get('top_news_main')!=$request->get('top_news'))
        if ($request->get('top_news') > 0) {

            if ($request->get('top_news_main') != $request->get('top_news')) {

                if ($request->get('top_news_main') > $request->get('top_news')) {

                    $arrayName = array();

                    for ($i = $request->get('top_news'); $i < $request->get('top_news_main'); $i++) {
                        $arrayName[] = $i;
                    }

                    $serialsCheck0 = DB::table('boi_news')
                        ->where('top_news', '>=', $request->get('top_news'))
                        ->where('top_news', '<', $request->get('top_news_main'))->get();
                    //->whereBetween('top_news', $arrayName)->get();


                    foreach ($serialsCheck0 as $numbercheck) {
                        $newserial = $numbercheck->top_news + 1;
                        $newsid = $numbercheck->newsid;

                        if ($numbercheck->top_news > 0) {
                            DB::table('boi_news')
                                ->where('newsid', $newsid)
                                ->update(array('top_news' => $newserial));
                        }

                    }

                    //dd($arrayName);
                } else {
                    $arrayName2 = array();

                    for ($i = $request->get('top_news_main'); $i < $request->get('top_news'); $i++) {
                        $arrayName2[] = $i;
                    }

                    $serialsCheck = DB::table('boi_news')
                        ->where('top_news', '<=', $request->get('top_news'))
                        ->where('top_news', '>', $request->get('top_news_main'))->get();
                    //->whereBetween('top_news', $arrayName2)->get();

                    foreach ($serialsCheck as $numbercheck) {
                        $newserial = $numbercheck->top_news - 1;
                        $newsid = $numbercheck->newsid;

                        if ($numbercheck->top_news > 0) {

                            DB::table('boi_news')
                                ->where('newsid', $newsid)
                                ->update(array('top_news' => $newserial));
                        }

                    }

                    //dd($arrayName2);
                }


                DB::table('boi_news')->where('newsid', $request->get('id'))
                    ->update(
                        array(
                            'top_news' => $request->get('top_news'),
                            'newsupdatetime' => date('d F Y h:i:s')
                        )
                    );
            }
        }
        $ckeditor_data = $request->get('article_ckeditor');
        $str_replace_data = str_replace('embed_tag', 'iframe', $ckeditor_data);

        //dd($str_replace_data);

        DB::table('boi_news')->where('newsid', $request->get('id'))
            ->update(
                array(
                    'news_sub_title_1' => $request->get('news_sub_title_1'),
                    'newstitle' => $request->get('title'),
                    'news_sub_title_2' => $request->get('news_sub_title_2'),
                    'newsdetails' => $str_replace_data,
                    'youtube' => $request->get('youtube'),
                    'newsstatus' => $request->get('newsstatus'),
                    'newsseotitle' => $request->get('seotitle'),
                    'newsseometatag' => $request->get('seometa'),
                    'newsseodetails' => $request->get('seodescription'),
                    'top_news' => $top_news,
                    //'serial' 				=> $serial,
                    //'heading_news' 			=> $heading_news,
                    'today_program' => $today_program,
                    'latest' => $latest,
                    'nirbachito' => $nirbachito,
                    'newsupdatetime' => date('d F Y h:i:s')
                )
            );

        $categoris = DB::table('boi_news_categoris')->where('newsmainid', $last_newid)->get();
        foreach ($categoris as $key => $value) {
            DB::table('boi_news_categoris')->where('newsmainid', $last_newid)->delete();
        }

        if (sizeof($request->get('categories')) > 0) {
            foreach ($request->get('categories') as $menus) {
                if ($name = explode("_", $menus)) {
                    $mid = $name[0];
                    $sid = $name[1];

                    DB::table('boi_news_categoris')->insert(
                        [
                            'menuid' => $mid,
                            'menusubid' => $sid,
                            'newsmainid' => $last_newid
                        ]
                    );
                } else {
                    DB::table('boi_news_categoris')->insert(
                        [
                            'menuid' => $menus,
                            'menusubid' => '',
                            'newsmainid' => $last_newid
                        ]
                    );
                }
            }
        }

        $file = $request->file('userfile');

        if (!empty($file)) {
            $folder_location = 'uploads/news';
            $image = $request->file('userfile');
//$archivo			= $image->getClientOriginalName();
            $file_name_image = 'boishakhi_' . time() . '.' . $image->getClientOriginalExtension();
            $success = $image->move($folder_location, $file_name_image);

            DB::table('boi_news')->where('newsid', $request->get('id'))
                ->update(array('news_image' => $file_name_image));

            return redirect::to('/superadmin/post-edit/' . $last_newid)->with('success', 'Successfully Update.');
//return redirect::to('/admin/user_posts')->with('success', 'Successfully Update.');	  
        } else {
            return redirect::to('/superadmin/post-edit/' . $last_newid)->with('success', 'Successfully Update.');
//return redirect::to('/admin/user_posts')->with('success', 'Successfully Update.');	 
        }

        return redirect::to('/superadmin/post-edit/' . $last_newid)->with('success', 'Successfully Update.');
//return redirect::to('/admin/user_posts')->with('success', 'Successfully Update.');
    }


    public function post_edit($id)
    {
        $edit = DB::table('boi_news')->where('newsid', $id)->first();
        $data = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend.edit_post_page', compact('edit', 'data'));
    }


    public function remove_top1(Request $request)
    {
        //dd($request->get('id'));
        //$userid = Auth::user()->id;
        $serialsCheck = DB::table('boi_news')
            ->where('newsid', $request->get('id'))
            ->get();

        $topNews = 0;

        foreach ($serialsCheck as $numbercheck) {

            $topNews = $numbercheck->top_news;
        }

        if ($topNews > 0) {
            $serialsCheck = DB::table('boi_news')
                ->where('top_news', '>', $topNews)
                ->get();

            DB::table('boi_news')->where('newsid', $request->get('id'))
                ->update(array('top_news' => '10000'));


            foreach ($serialsCheck as $numbercheck1) {
                $newserial = $numbercheck1->top_news - 1;
                $newsid = $numbercheck1->newsid;

                DB::table('boi_news')
                    ->where('newsid', $newsid)
                    ->update(array('top_news' => $newserial));

            }
        } else {
            DB::table('boi_news')->where('newsid', $request->get('id'))
                ->update(array('top_news' => '10000'));
        }

        return 0;
        //return redirect::to('admin/user_post_edit/'.$request->get('id'));
    }


    public function unpublish_post(Request $request)
    {
        //dd($request->get('id'));
        //$userid = Auth::user()->id;
        $serialsCheck = DB::table('boi_news')
            ->where('newsid', $request->get('id'))
            ->get();

        $topNews = 0;

        foreach ($serialsCheck as $numbercheck) {

            $topNews = $numbercheck->top_news;
        }

        if ($topNews > 0) {
            $serialsCheck = DB::table('boi_news')
                ->where('top_news', '>', $topNews)
                ->get();

            DB::table('boi_news')->where('newsid', $request->get('id'))
                ->update(array('top_news' => '10000', 'newsstatus' => '1'));


            foreach ($serialsCheck as $numbercheck1) {
                $newserial = $numbercheck1->top_news - 1;
                $newsid = $numbercheck1->newsid;

                DB::table('boi_news')
                    ->where('newsid', $newsid)
                    ->update(array('top_news' => $newserial));

            }
        } else {
            DB::table('boi_news')->where('newsid', $request->get('id'))
                ->update(array('top_news' => '10000', 'newsstatus' => '1'));
        }

        return 0;
        //return redirect::to('admin/user_post_edit/'.$request->get('id'));
    }


    public function post_delete($id)
    {

        $serialsCheck = DB::table('boi_news')
            ->where('newsid', $id)
            ->get();

        $topNews = 0;

        foreach ($serialsCheck as $numbercheck) {

            $topNews = $numbercheck->top_news;
        }

        if ($topNews > 0) {
            $serialsCheck = DB::table('boi_news')
                ->where('top_news', '>', $topNews)
                ->get();

            DB::table('boi_news')->where('newsid', $id)->delete();


            foreach ($serialsCheck as $numbercheck1) {
                $newserial = $numbercheck1->top_news - 1;
                $newsid = $numbercheck1->newsid;

                DB::table('boi_news')
                    ->where('newsid', $newsid)
                    ->update(array('top_news' => $newserial));

            }
        } else {
            DB::table('boi_news')->where('newsid', $id)->delete();
        }


        $categoris = DB::table('boi_news_categoris')->where('newsmainid', $id)->get();

        foreach ($categoris as $key => $value) {
            DB::table('boi_news_categoris')->where('newsmainid', $id)->delete();
        }

        return redirect::to('/superadmin/posts')->with('success', 'Successfully Delete.');
    }






    /*
    ==============================================================================================================
    ============================================ POSTS MANAGE USER ===============================================
    ==============================================================================================================
    */


// =============================================================================================================================================  facebook auto post share  ====================================================================================================


    function rssfeed()
    {
        $sector_heading = 'boishakhionline';
        $this->data['feed_name'] = base_url();
        $this->data['encoding'] = 'utf-8';
        $this->data['feed_url'] = base_url();
        $this->data['page_language'] = 'en';
        $this->data['page_description'] = 'Boishakhi Online';


        $query = $this->News_model->get_lastnewsfeeds();


        $xml = new Xml_writer;
        $str = '<?xml version="1.0" encoding="utf-8" ?>';
        $str .= '<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">';
        $str .= '<channel>';
        $str .= '<title>' . $this->data['feed_name'] . '</title>';
        $str .= '<link>' . $this->data['feed_url'] . '</link>';
        $str .= '<description>' . $this->data['page_description'] . '</description>';
        $str .= '<language>' . $this->data['page_language'] . '</language>';
        $str .= '<atom:link href="' . base_url() . 'feeds/' . $sector_heading . '.xml" rel="self" type="application/rss+xml"/>';

        foreach ($query as $row) {
            $sbuzz_image = $row->image;
            $sbid = $row->newsid;
            $category_id = $row->catid;
            $slug = $row->menunameslug;
            $sbuzz_name = $row->title;
            $sbuzz_descrip23 = $row->details;
            $d1 = (explode(' ', $sbuzz_descrip23));
            $sbuzz_descrip = $d1[0] . " " . $d1[1] . " " . $d1[2] . " " . $d1[3] . " " . $d1[4] . " " . $d1[5] . " " . $d1[6] . " " . $d1[7] . " " . $d1[8] . " " . $d1[9] . " " . $d1[10] . " " . $d1[11] . " " . $d1[12] . " " . $d1[13] . " " . $d1[14] . " " . $d1[15] . " " . $d1[16] . " " . $d1[17] . " " . $d1[18] . " " . $d1[19];

//$sbuzz_descrip = explode(' ',$sbuzz_descrip23);

            $time = time();

            $str .= '<item>';
            $str .= '<title>' . xml_convert(stripslashes($sbuzz_name)) . '</title>';
            $str .= '<link>' . base_url() . 'details/' . $slug . '/' . $sbid . '/' . $time . '</link>';
            $str .= '<description>' . '<![CDATA[' . stripslashes($sbuzz_descrip) . ']]' . '></description>';
            $str .= '<guid isPermaLink="false">' . $sbid . '</guid>';
            $str .= '<media:thumbnail width="92" height="52" url="' . base_url() . 'uploads/news/' . $sbuzz_image . '"/>';
            $str .= '</item>';
        }

        $str .= '</channel>';
        $str .= '</rss>';
        if (!write_file('./feeds/' . $sector_heading . '.xml', $str)) {

        } else {
            redirect('News');
        }
    }


// =============================================================================================================================================  facebook auto post share  ====================================================================================================


    public function user_posts()
    {
        $userid = Auth::user()->id;

        $reporter = DB::table('boi_user_categoris')->select('boi_user_categoris.*', 'boi_menu.menuid', 'boi_menu.menutitle', 'admins.id', 'admins.name', 'admins.desi')
            ->leftjoin('boi_menu', 'boi_menu.menuid', '=', 'boi_user_categoris.menuid')
            ->leftjoin('admins', 'admins.id', '=', 'boi_user_categoris.userid')
            /*->groupBy('boi_user_categoris.userid')*/
            ->orderBy('admins.id', 'DESC')
            ->get();

        $categories = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        $data = DB::table('boi_news')->select('boi_news.*', 'admins.id', 'admins.name')
            ->leftjoin('admins', 'admins.id', '=', 'boi_news.userid')
            ->where('boi_news.userid', $userid)
            ->orderBy('boi_news.newsid', 'DESC')
            ->get();

        /*if(Auth::user()->id==2)// 2 for reporter
        {*/
        return view('backend/user_post_page', compact('data', 'categories', 'reporter'));
        /*}
        else
        {
        return view('backend/editor_user_post_page' , compact('data','categories','reporter'));
        } */
    }

    public function user_newadd()
    {
        $result = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend/user_addnewpost_page')->with('data', $result);
    }


    public function user_submit_post(Request $request)
    {

        if ($request->file('userfile') != '') {

            $image = $request->file('userfile');
            $folder_location = 'uploads/news';
            $file_name_image = $image->getClientOriginalName();
            $success = $image->move($folder_location, $file_name_image);
        } else {
            $file_name_image = '';
        }

        $userid = Auth::user()->id;

        DB::table('boi_news')->insert(
            [
                'userid' => $userid,
                'newstitle' => $request->get('title'),
                'newsdetails' => $request->get('article_ckeditor'),
                'youtube' => $request->get('youtube'),
                'news_image' => $file_name_image,
                'newsstatus' => $request->get('newsstatus'),
                'newsseotitle' => $request->get('seotitle'),
                'newsseometatag' => $request->get('seometa'),
                'newsseodetails' => $request->get('seodescription'),
                'readcount' => '0',
                'top_news' => $request->get('top_news'),
                'serial' => $request->get('serial'),
                'heading_news' => $request->get('heading_news'),
                'today_program' => $request->get('today_program'),
                'latest' => $request->get('latest'),
                'nirbachito' => $request->get('nirbachito'),
                'newsupdatetime' => date('d F Y h:i:s')
            ]
        );

        $lastID = DB::table('boi_news')->orderBy('newsid', 'DESC')->take(1)->first();
        $last_newid = $lastID->newsid;


        foreach ($request->get('categories') as $menus) {
//echo $menus.'<br />';

            if ($name = explode("_", $menus)) {
                $mid = $name[0];
                $sid = $name[1];
//echo $mid.'<br />';

                DB::table('boi_news_categoris')->insert(
                    [
                        'menuid' => $mid,
                        'menusubid' => $sid,
                        'newsmainid' => $last_newid
                    ]
                );
            } else {
                DB::table('boi_news_categoris')->insert(
                    [
                        'menuid' => $menus,
                        'menusubid' => '',
                        'newsmainid' => $last_newid
                    ]
                );
            }
        }

        return redirect::to('/admin/user_posts')->with('success', 'Successfully Added.');
    }

    public function user_update_post(Request $request)
    {

        $input = $request->except('_token');

        $userid = Auth::user()->id;

        DB::table('boi_news')->where('newsid', $request->get('id'))
            ->update(
                array(
                    'news_sub_title_1' => $request->get('news_sub_title_1'),
                    'newstitle' => $request->get('title'),
                    'news_sub_title_2' => $request->get('news_sub_title_2'),
                    'newsdetails' => $request->get('article_ckeditor'),
                    'youtube' => $request->get('youtube'),
                    'newsstatus' => $request->get('newsstatus'),
                    'newsseotitle' => $request->get('seotitle'),
                    'newsseometatag' => $request->get('seometa'),
                    'newsseodetails' => $request->get('seodescription'),
                    'top_news' => $request->get('top_news'),
                    'serial' => $request->get('serial'),
                    'heading_news' => $request->get('heading_news'),
                    'today_program' => $request->get('today_program'),
                    'latest' => $request->get('latest'),
                    'nirbachito' => $request->get('nirbachito'),
                    'newsupdatetime' => date('d F Y h:i:s')
                )
            );

//$lastID 	= DB::table('boi_news')->orderBy('newsid','DESC')->take(1)->first();
        $last_newid = $request->get('id');

        $categoris = DB::table('boi_news_categoris')->where('newsmainid', $last_newid)->get();
        foreach ($categoris as $key => $value) {
            DB::table('boi_news_categoris')->where('newsmainid', $last_newid)->delete();
        }

        foreach ($request->get('categories') as $menus) {
//echo $menus.'<br />';

            if ($name = explode("_", $menus)) {
                $mid = $name[0];
                $sid = $name[1];
//echo $mid.'<br />';

                DB::table('boi_news_categoris')->insert(
                    [
                        'menuid' => $mid,
                        'menusubid' => $sid,
                        'newsmainid' => $last_newid
                    ]
                );
            } else {
                DB::table('boi_news_categoris')->insert(
                    [
                        'menuid' => $menus,
                        'menusubid' => '',
                        'newsmainid' => $last_newid
                    ]
                );
            }
        }

        $file = $request->file('userfile');

        if (!empty($file)) {
            $image = $request->file('userfile');
            $folder_location = 'uploads/news';
            $file_name_image = $image->getClientOriginalName();
            $success = $image->move($folder_location, $file_name_image);


            DB::table('boi_news')->where('newsid', $request->get('id'))
                ->update(array('news_image' => $file_name_image));

            return redirect::to('/admin/user_posts')->with('success', 'Successfully Update.');
        } else {
            return redirect::to('/admin/user_posts')->with('success', 'Successfully Update.');
        }

    }


    public function user_update_post_approval(Request $request)
    {

        $input = $request->except('_token');

        $userid = Auth::user()->id;

        DB::table('boi_news')->where('newsid', $request->get('id'))
            ->update(
                array('newsstatus' => $request->get('newsstatus')

                )
            );

        return redirect::to('/admin/reporter-post')->with('success', 'Successfully Update.');

    }


    public function user_post_edit($id)
    {
//dd($id);
        $edit = DB::table('boi_news')->where('newsid', $id)->first();
        $data = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend/edit_user_post', compact('edit', 'data'));
    }

    public function search_news(Request $request)
    {

//dd($request->all());
        $categories = $request->get('categories');
        $reporter = $request->get('reporter');

        if ($categories != '' && $reporter != '') {
            $data = DB::table('boi_news_categoris')->select('boi_news_categoris.*', 'boi_news.*')
                ->leftjoin('boi_news', 'boi_news.newsid', '=', 'boi_news_categoris.newsmainid')
                ->where('boi_news_categoris.menuid', $categories)
                ->where('boi_news.userid', $reporter)
                ->orderBy('boi_news.newsid', 'DESC')
                ->get();
        } elseif ($categories != '' && $reporter == '') {
            $data = DB::table('boi_news_categoris')->select('boi_news_categoris.*', 'boi_news.*')
                ->leftjoin('boi_news', 'boi_news.newsid', '=', 'boi_news_categoris.newsmainid')
                ->where('boi_news_categoris.menuid', $categories)
                ->orderBy('boi_news.newsid', 'DESC')
                ->get();
        } elseif ($categories == '' && $reporter != '') {
            $data = DB::table('boi_news_categoris')->select('boi_news_categoris.*', 'boi_news.*')
                ->leftjoin('boi_news', 'boi_news.newsid', '=', 'boi_news_categoris.newsmainid')
                ->where('boi_news.userid', $reporter)
                ->orderBy('boi_news.newsid', 'DESC')
                ->get();
        } elseif ($categories == '' && $reporter == '') {
            $data = DB::table('boi_news')->where('userid', Auth::user()->id)->orderBy('newsid', 'DESC')->get();
        }


        return view('backend/search_news', compact('data'));
    }


    public function search_news_editor(Request $request)
    {

        $userid = Auth::user()->id;


//dd($request->all());
        $categories = $request->get('categories');
        $reporter = $request->get('reporter');

        if ($categories != '') {
            $allowlist = DB::table('boi_user_categoris')->where('userid', $userid)->where('menuid', $categories)->get();
        } elseif ($categories == '' && $reporter == '') {
            $allowlist = DB::table('boi_user_categoris')->where('userid', $userid)->get();
        }

        return view('backend/search_news_editor', compact('allowlist', 'reporter'));
    }


    public function user_post_delete($id)
    {
        DB::table('boi_news')->where('newsid', $id)->delete();
        $categoris = DB::table('boi_news_categoris')->where('newsmainid', $id)->get();

        foreach ($categoris as $key => $value) {
            DB::table('boi_news_categoris')->where('newsmainid', $id)->delete();
        }

        return redirect::to('/admin/user_posts')->with('success', 'Successfully Delete.');
    }


    public function categories()
    {
        $data = DB::table('boi_menu')->where('menuparent', 'none')->orderBy('menuid', 'DESC')->get();

        $lastid = DB::table('boi_menu')->select('menuposid', 'menuparent')->where('menuparent', 'none')->orderBy('menuposid', 'DESC')->first();

        return view('backend/categories_page', compact('data', 'lastid'));
    }

    public function categoriessubmit(Request $request)
    {
// ==================== validation ==================
//dd($request->all());

        $this->validate($request, [
            'menutitle' => 'unique:boi_menu',
            'menuslug' => 'unique:boi_menu',
        ]);

        $table = new MenuModel();
        $table->menuposid = $request->get('menuposid');
        $table->menutitle = $request->get('menutitle');
        $table->menuslug = $request->get('menuslug');


        if ($request->get('menuslug') == '') {
            $text = $request->get('menutitle');
            /*$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
            // trim
            $text = trim($text, '-');
            // transliterate
            //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            // lowercase
            $text = strtolower($text);
            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);*/

            $table->menuslug = $text;
        } else {
            $text = $request->get('menuslug');
            /*$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
            // trim
            $text = trim($text, '-');
            // transliterate
            //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            // lowercase
            $text = strtolower($text);
            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);*/

            $table->menuslug = $text;
        }


        $table->menuparent = $request->get('parentmenu');
        $table->menudescription = $request->get('description');
        $table->menustatus = $request->get('status');
        $table->save();

        return redirect::to('/superadmin/categories')->with('success', 'Successfully Added.');

    }

    public function categoriesedit(Request $request)
    {
//dd($request->all());

        $req = $request->get('id');
        $edit = DB::table('boi_menu')->where('menuid', $req)->first();

        $data = DB::table('boi_menu')->where('menuparent', 'none')->orderBy('menuid', 'DESC')->get();
        return view('backend/editcategories_page', compact('edit', 'data'));
    }

    public function categoriesupdate(Request $request)
    {
//dd($request->get('menuid'));
        $input = $request->except('_token');

        $update_govt = MenuModel::where('menuid', $request->get('menuid'));
        $update_govt->update($input);

        return redirect::to('/superadmin/categories')->with('success', 'Successfully Update.');
    }

    public function categoriesdelete($id)
    {
        $user = MenuModel::where('menuid', $id);
        $user->delete();

        return redirect::to('/superadmin/categories')->with('success', 'Successfully Delete.');
    }


//============================== GALLERY MANAGE ===========================

    public function gallery()
    {
        $result = DB::table('boi_gallery')->select('boi_gallery.*', 'boi_galleryalbum.id as bgid', 'boi_galleryalbum.atitle')
            ->leftJoin('boi_galleryalbum', 'boi_galleryalbum.id', '=', 'boi_gallery.type')
            ->orderBy('boi_gallery.id', 'DESC')->get();

        return view('backend/banner_page')->with('data', $result);;
    }

    public function newaddgallery()
    {
        $galleryalbum = DB::table('boi_galleryalbum')->orderBy('id', 'DESC')->get();
        return view('backend/addbanner_page', compact('galleryalbum'));
    }

    public function submit_gallery(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | max:255',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $folder_location = 'uploads/gallery';
        $file_name_image = $image->getClientOriginalName();
        $success = $image->move($folder_location, $file_name_image);


        $bannertable = new BannerModel();
        $bannertable->type = $request->get('type');
        $bannertable->title = $request->get('title');
        $bannertable->image = $file_name_image;
        $bannertable->status = $request->get('status');
        $bannertable->save();

        return redirect::to('/superadmin/gallery')->with('success', 'Successfully Added.');

    }

    public function gallery_edit($id)
    {
        $edit = DB::table('boi_gallery')->select('boi_gallery.*', 'boi_galleryalbum.id as bgid', 'boi_galleryalbum.atitle')
            ->leftJoin('boi_galleryalbum', 'boi_galleryalbum.id', '=', 'boi_gallery.type')
            ->where('boi_gallery.id', $id)->first();

        $galleryalbum = DB::table('boi_galleryalbum')->orderBy('id', 'DESC')->get();

        return view('backend/editbanner_page', compact('edit', 'galleryalbum'));
    }


    public function update_gallery(Request $request)
    {

        $input = $request->except('_token');

//dd($input);
        if ($input) {

            $update_govt = BannerModel::findorfail($request->get('id'));
            $update_govt->update($input);

            $file = $request->file('image');

            if (!empty($file)) {
                $validator = Validator::make($request->all(), [
                    'image' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect::to('superadmin/editbanner/' . $request->get('id'))->withErrors($validator);
                } else {
                    $image = $request->file('image');
                    $folder_location = 'uploads/gallery';
                    $file_name_image = $image->getClientOriginalName();
                    $success = $image->move($folder_location, $file_name_image);

                    $update_govt = BannerModel::where('id', '=', $request->get('id'));
                    $update_govt->update(['image' => $file_name_image]);

                    return redirect::to('/superadmin/gallery')->with('success', 'Update Successfully Done.');
                }
            } else {
                return redirect::to('/superadmin/gallery')->with('success', 'Update Successfully Done.');
            }
        }
    }

    public function gallery_delete(Request $request)
    {
// dd($request->get('data'));

        $req = $request->get('data');
//dd($req);
        foreach ($req as $key => $value) {
//dd($value);
            $result = DB::table('boi_gallery')->where('id', $value)->first();

            File::delete(public_path() . '/uploads/gallery/' . $result->image);

            $user = BannerModel::find($value);
            $user->delete();
        }
        return 0;
    }


//============================== GALLERY ALBUM MANAGE ===========================

    public function galleryalbum()
    {
        $result = DB::table('boi_galleryalbum')->orderBy('id', 'DESC')->get();
        return view('backend/galbum_page')->with('data', $result);;
    }

    public function newaddgalleryalbum()
    {
        return view('backend/addgalbum_page');
    }

    public function submit_galleryalbum(Request $request)
    {
        $this->validate($request, [
            'atitle' => 'required | max:255',
        ]);

        $bannertable = new AlbumModel();
        $bannertable->atitle = $request->get('atitle');
        $bannertable->save();

        return redirect::to('/superadmin/galleryalbum')->with('success', 'Successfully Added.');

    }

    public function galleryalbum_edit($id)
    {
        $result = DB::table('boi_galleryalbum')->where('id', $id)->first();
        return view('backend/editgalbum_page')->with('edit', $result);;
    }


    public function update_galleryalbum(Request $request)
    {
        $input = $request->except('_token');

        $update_govt = AlbumModel::findorfail($request->get('id'));
        $update_govt->update($input);

        return redirect::to('/superadmin/galleryalbum')->with('success', 'Update Successfully Done.');
    }

    public function galleryalbum_delete(Request $request)
    {
// dd($request->get('data'));

        $req = $request->get('data');
//dd($req);
        foreach ($req as $key => $value) {
            $user = AlbumModel::find($value);
            $user->delete();
        }
        return 0;
    }

    /*
    ==============================================================================================================
    ============================================ GALLERY MANAGE ==================================================
    ==============================================================================================================
    */


    public function ads()
    {

        $ads = DB::table('boi_ads')->orderBy('id', 'DESC')->get();

        return view('backend/banner_page_02', compact('ads'));
    }

    public function newaddads()
    {
        $categories = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend/addbanner_page_02', compact('categories'));
    }

    public function submit_ads(Request $request)
    {
//dd($request->all());

        $this->validate($request, [
            'title' => 'required | max:255',
        ]);


        if ($request->file('image') != '') {
            $image = $request->file('image');
            $folder_location = 'uploads/ads';
            $file_name_image = $image->getClientOriginalName();
            $success = $image->move($folder_location, $file_name_image);
        } else {
            $file_name_image = '';
        }


        $bannertable = new AdsModel();
        $bannertable->type = $request->get('type');
        $bannertable->title = $request->get('title');
        $bannertable->categorie_id = $request->get('categorie_id');
        $bannertable->url = $request->get('url');
        $bannertable->image = $file_name_image;
        $bannertable->code = $request->get('code');
        $bannertable->positioning = $request->get('positioning');
        $bannertable->status = $request->get('status');
        $bannertable->save();

        return redirect::to('/superadmin/ads')->with('success', 'Successfully Added.');

    }

    public function ads_edit($id)
    {
        $edit = DB::table('boi_ads')->where('id', $id)->first();

        return view('backend/editbanner_page_02', compact('edit'));
    }


    public function update_ads(Request $request)
    {

        $input = $request->except('_token');

//dd($input);
        if ($input) {

            $update_govt = AdsModel::findorfail($request->get('id'));
            $update_govt->update($input);

                $update_ads = AdsModel::findorfail($request->get('id'));
                $update_ads->categorie_id= $request->categorie_id;
                $update_ads->url= $request->url;
                $update_ads->type= $request->type;
                $update_ads->positioning= $request->positioning;
                $update_ads->title= $request->title;
                $update_ads->code= $request->code;
                $update_ads->save();
  



            $file = $request->file('image');

            if (!empty($file)) {
                $validator = Validator::make($request->all(), [
                    'image' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect::to('superadmin/editbanner_page_02/' . $request->get('id'))->withErrors($validator);
                } else {
                    $image = $request->file('image');
                    $folder_location = 'uploads/ads';
                    $file_name_image = $image->getClientOriginalName();
                    $success = $image->move($folder_location, $file_name_image);

                    $update_govt = AdsModel::where('id', '=', $request->get('id'));
                    $update_govt->update(['image' => $file_name_image]);

                    return redirect::to('/superadmin/ads')->with('success', 'Update Successfully Done.');
                }
            } else {
                //$update_ads = AdsModel::findorfail($request->get('id'));


                return redirect::to('/superadmin/ads')->with('success', 'Update Successfully Done.');
            }
        }
    }

    public function ads_delete(Request $request)
    {
// dd($request->get('data'));

        $req = $request->get('data');
//dd($req);
        foreach ($req as $key => $value) {
//dd($value);
            $result = DB::table('boi_ads')->where('id', $value)->first();

            if ($result->image != '') {
                File::delete(public_path() . '/uploads/ads/' . $result->image);
            }

            $user = AdsModel::find($value);
            $user->delete();
        }
        return 0;
    }


//============================== VOTE MANAGE ===========================

    public function vote()
    {
        $result = DB::table('boi_vote')->orderBy('id', 'DESC')->get();
        return view('backend/vote_page')->with('data', $result);;
    }

    public function newaddvote()
    {
        return view('backend/addvote_page');
    }

    public function submit_vote(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | max:255',
        ]);

        $bannertable = new VoteModel();
        $bannertable->title = $request->get('title');
        $bannertable->date = date('Y-m-d');
        $bannertable->status = $request->get('status');
        $bannertable->save();

        return redirect::to('/superadmin/vote')->with('success', 'Successfully Added.');

    }

    public function vote_edit($id)
    {
        $result = DB::table('boi_vote')->where('id', $id)->first();
        return view('backend/editvote_page')->with('edit', $result);
    }


    public function update_vote(Request $request)
    {
        $input = $request->except('_token');

        $update_govt = VoteModel::findorfail($request->get('id'));
        $update_govt->update($input);

        return redirect::to('/superadmin/vote')->with('success', 'Update Successfully Done.');

    }

    public function vote_delete(Request $request)
    {
        $req = $request->get('data');
//dd($req);
        foreach ($req as $key => $value) {
            $user = VoteModel::find($value);
            $user->delete();
        }
        return 0;
    }


//============================== MENU MANAGE ===========================

    public function menu()
    {

        $result = DB::table('menu')->select('menu.*', 'menutype.menuid', 'menutype.menuname')
            ->join('menutype', 'menutype.menuid', '=', 'menu.menutype')
            ->orderBy('id', 'DESC')
            ->get();
//->where(['something' => 'something', 'otherThing' => 'otherThing'])

        return view('backend/menu_page')->with('data', $result);
    }

    public function addmenu()
    {
        $result = DB::table('menutype')->orderBy('menuid', 'ASC')->get();
        return view('backend/addmenu_page')->with('data', $result);
    }

    public function menusubmit(Request $request)
    {
// ==================== validation ==================

        $this->validate($request, [
            'menutype' => 'required',
            'firstname' => 'required',
        ]);

        $table = new MenuModel();
        $table->name = $request->get('firstname');
        $table->menutype = $request->get('menutype');
        $table->menuslug = $request->get('firstname');
        $table->status = $request->get('status');
        $table->save();

//return redirect()->back();
        return redirect::to('/menu')->with('success', 'Successfully Added.');

    }

    public function menuedit($id)
    {
//dd($id);
//$result = DB::table('menu')->where('id',$id)->first();
        $result = DB::table('menu')->select('menu.*', 'menutype.menuid', 'menutype.menuname')
            ->join('menutype', 'menutype.menuid', '=', 'menu.menutype')
            ->where('menu.id', $id)
            ->first();
//->where(['something' => 'something', 'otherThing' => 'otherThing'])
//dd($result);
        $data = DB::table('menutype')->orderBy('menuid', 'ASC')->get();
        return view('backend/editmenu_page', compact('result', 'data'));
    }


    public function menuupdate(Request $request)
    {

        $input = $request->except('_token');

        $update_govt = MenuModel::findorfail($request->get('id'));
        $update_govt->update($input);

//return redirect()->back();
        return redirect::to('/menu')->with('success', 'Update Successfully Done.');

    }

    public function deletemenu(Request $request)
    {
// dd($request->get('data'));

        $req = $request->get('data');
//dd($req);
        foreach ($req as $key => $value) {
            $user = MenuModel::find($value);
            $user->delete();
        }
        return 0;
    }


    /*
    ==============================================================================================================
    ============================================ ADMIN USER MANAGE ===============================================
    ==============================================================================================================
    */

    public function user()
    {
        $result = DB::table('admins')->orderBy('id', 'DESC')->get();
        return view('backend/user_page')->with('data', $result);
    }


    public function useradd()
    {
        $result = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend/addnewuser_page')->with('data', $result);
    }


    protected function submit_user(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6',
        ]);

        DB::table('admins')->insert(
            [
                'type' => $request->get('type'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'desi' => $request->get('designation'),
                'status' => $request->get('newsstatus'),
                'password' => bcrypt($request->get('password'))
            ]
        );

        $lastID = DB::table('admins')->orderBy('id', 'DESC')->take(1)->first();
        $last_userid = $lastID->id;


        foreach ($request->get('categories') as $menus) {
//echo $menus.'<br />';

            if ($name = explode("_", $menus)) {
                $mid = $name[0];
                $sid = $name[1];

                DB::table('boi_user_categoris')->insert(
                    [
                        'menuid' => $mid,
                        'menusubid' => $sid,
                        'userid' => $last_userid
                    ]
                );
            } else {
                DB::table('boi_user_categoris')->insert(
                    [
                        'menuid' => $menus,
                        'menusubid' => '',
                        'userid' => $last_userid
                    ]
                );
            }
        }

        return redirect::to('/superadmin/user')->with('success', 'Successfully Added.');
    }

    protected function update_user(Request $request)
    {

        $input = $request->except('_token');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|',
            'designation' => 'required|max:255|',
        ]);

        if ($request->get('password') == '') {
            DB::table('admins')->where('id', $request->get('id'))
                ->update(
                    array(
                        'type' => $request->get('type'),
                        'name' => $request->get('name'),
                        'email' => $request->get('email'),
                        'desi' => $request->get('designation'),
                        'status' => $request->get('newsstatus')
                    )
                );
        } else {
            DB::table('admins')->where('id', $request->get('id'))
                ->update(
                    array(
                        'type' => $request->get('type'),
                        'name' => $request->get('name'),
                        'email' => $request->get('email'),
                        'desi' => $request->get('designation'),
                        'status' => $request->get('newsstatus'),
                        'password' => bcrypt($request->get('password'))
                    )
                );
        }

        $last_userid = $request->get('id');

        $categoris = DB::table('boi_user_categoris')->where('userid', $last_userid)->get();
        foreach ($categoris as $key => $value) {
            DB::table('boi_user_categoris')->where('userid', $last_userid)->delete();
        }

        foreach ($request->get('categories') as $menus) {
//echo $menus.'<br />';

            if ($name = explode("_", $menus)) {
                $mid = $name[0];
                $sid = $name[1];

                DB::table('boi_user_categoris')->insert(
                    [
                        'menuid' => $mid,
                        'menusubid' => $sid,
                        'userid' => $last_userid
                    ]
                );
            } else {
                DB::table('boi_user_categoris')->insert(
                    [
                        'menuid' => $menus,
                        'menusubid' => '',
                        'userid' => $last_userid
                    ]
                );
            }
        }

        return redirect::to('/superadmin/user')->with('success', 'Successfully Update.');
    }


    public function user_edit($id)
    {
        $edit = DB::table('admins')->where('id', $id)->first();
        $data = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend.edit_user_page', compact('edit', 'data'));
    }

    public function user_delete($id)
    {

        DB::table('admins')->where('id', $id)->delete();
        $categoris = DB::table('boi_user_categoris')->where('userid', $id)->get();

        if (sizeof($categoris) > 0) {
            foreach ($categoris as $key => $value) {
                DB::table('boi_user_categoris')->where('userid', $id)->delete();
            }
        }

        return redirect::to('/superadmin/user')->with('success', 'Successfully Delete.');
    }


    /*
    ==============================================================================================================
    ============================================ SUPER ADMIN USER MANAGE =========================================
    ==============================================================================================================
    */

    public function superadmin_user()
    {
        $result = DB::table('superadmins')->orderBy('id', 'DESC')->get();
        return view('backend/superadmin_user_page')->with('data', $result);
    }


    public function superadmin_useradd()
    {
        return view('backend/superadmin_addnewuser_page');
    }


    protected function superadmin_submit_user(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6',
        ]);

        DB::table('superadmins')->insert(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password'))
            ]
        );


        return redirect::to('/superadmin/superadmin_user')->with('success', 'Successfully Added.');
    }

    protected function superadmin_update_user(Request $request)
    {

        $input = $request->except('_token');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|',
        ]);

        if ($request->get('password') == '') {
            DB::table('superadmins')->where('id', $request->get('id'))
                ->update(
                    array(
                        'name' => $request->get('name'),
                        'email' => $request->get('email')
                    )
                );
        } else {
            DB::table('superadmins')->where('id', $request->get('id'))
                ->update(
                    array(
                        'name' => $request->get('name'),
                        'email' => $request->get('email'),
                        'password' => bcrypt($request->get('password'))
                    )
                );
        }

        return redirect::to('/superadmin/superadmin_user')->with('success', 'Successfully Update.');
    }


    public function superadmin_user_edit($id)
    {
        $edit = DB::table('superadmins')->where('id', $id)->first();

        return view('backend/superadmin_edit_user_post', compact('edit'));
    }

    public function superadmin_user_delete($id)
    {

        DB::table('superadmins')->where('id', $id)->delete();
        return redirect::to('/superadmin/superadmin_user')->with('success', 'Successfully Delete.');
    }


//============================== MEDIA MANAGE ===========================

    public function media()
    {
        $result = DB::table('media')->orderBy('id', 'DESC')->get();
        return view('backend/media_page')->with('data', $result);
    }


    public function newaddmedia()
    {
        return view('backend/add_media_page');
    }


    protected function submit_media(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255|unique:media',
            'youtube' => 'required|max:255',
        ]);

        DB::table('media')->insert(
            [
                'title' => $request->get('title'),
                'youtube' => $request->get('youtube'),
                'status' => $request->get('newsstatus')
            ]
        );

        return redirect::to('/superadmin/media')->with('success', 'Successfully Added.');
    }

    protected function update_media(Request $request)
    {

        $input = $request->except('_token');

        $this->validate($request, [
            'title' => 'required|max:255|unique:media',
            'youtube' => 'required|max:255',
        ]);

        DB::table('media')->where('id', $request->get('id'))
            ->update(
                array(
                    'title' => $request->get('title'),
                    'youtube' => $request->get('youtube'),
                    'status' => $request->get('newsstatus')
                )
            );

        return redirect::to('/superadmin/media')->with('success', 'Successfully Update.');
    }


    public function media_edit($id)
    {
        $edit = DB::table('media')->where('id', $id)->first();

        return view('backend.edit_media_page', compact('edit'));
    }

    public function media_delete($id)
    {
        $categoris = DB::table('media')->where('id', $id)->get();

        if (sizeof($categoris) > 0) {
            foreach ($categoris as $key => $value) {
                DB::table('media')->where('id', $id)->delete();
            }
        }

        return redirect::to('/superadmin/media')->with('success', 'Successfully Delete.');
    }

    public function post_comments($id)
    {
        $news = DB::table('boi_news')->where('newsid', $id)->first();
        $post_comments = DB::table('boi_comments')->where('newsid', $id)->where('replyid', '0')->orderBy('newsid', 'DESC')->get();

        return view('backend.post_comments_page', compact('post_comments', 'news'));
    }

    public function commentspublic(Request $request)
    {

//dd($request->all());
        DB::table('boi_comments')->where('cid', $request->get('cid'))
            ->update(
                array('active' => 1)
            );

        return 0;
    }

    public function commentsunpublic(Request $request)
    {

//dd($request->all());
        DB::table('boi_comments')->where('cid', $request->get('cid'))
            ->update(
                array('active' => 0)
            );

        return 0;
    }


//====================================== REPORTER ==================================

    public function reporter_post()
    {
        $userid = Auth::user()->id;

        $reporter = DB::table('boi_user_categoris')->select('boi_user_categoris.*', 'boi_menu.menuid', 'boi_menu.menutitle', 'admins.id', 'admins.name', 'admins.desi')
            ->leftjoin('boi_menu', 'boi_menu.menuid', '=', 'boi_user_categoris.menuid')
            ->leftjoin('admins', 'admins.id', '=', 'boi_user_categoris.userid')
            /*->groupBy('boi_user_categoris.userid')*/
            ->orderBy('admins.id', 'DESC')
            ->get();
        $categories = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();
        $allowlist = DB::table('boi_user_categoris')->where('userid', $userid)->get();

        return view('backend/editor_user_post_page', compact('categories', 'allowlist', 'reporter'));
    }

    public function view_post($id)
    {
//dd($id);
        $edit = DB::table('boi_news')->where('newsid', $id)->first();
        $data = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuid', 'DESC')->get();

        return view('backend/view_user_page', compact('edit', 'data'));
    }


    public function activenews(Request $request)
    {
        $req = $request->get('data');
        foreach ($req as $key => $value) {
            DB::table('boi_news')->where('newsid', $value)
                ->update(
                    array('newsstatus' => 3)
                );
        }
        return 0;
    }


    public function topnews(Request $request)
    {
        $req = $request->get('data');

        foreach ($req as $key => $value) {
            DB::table('boi_news')->where('newsid', $value)
                ->update(
                    array('newsstatus' => 3)
                );
        }
        return 0;
    }

////////// Logout
    public function logout()
    {
        auth::logout();
        return redirect::to('/admin')->with('sorry', 'Successfully logout.');

    }


}
