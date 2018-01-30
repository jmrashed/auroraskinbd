<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\CommentsModel;
use Illuminate\Support\Facades\Route;


use App\models\LaravelModel;
use App\models\BannerModel;
use App\models\MenuModel;
use App\models\NewsModel;
use App\models\UserModel;
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


class FrontendController extends Controller
{

    function get_ads($id){

        $fronted_ads[1]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '1'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[2]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '2'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[3]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '3'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[4]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '4'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[5]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '5'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[6]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '6'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[7]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '7'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[8]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '8'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[9]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '9'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[10]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '10'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[11]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '11'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[12]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '12'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[13]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '13'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[14]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '14'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[15]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '15'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first();
        $fronted_ads[16]= DB::table('boi_ads')->select('*')->where([['status', '1'], ['positioning', '16'], ['categorie_id', $id]])->orderBy('id', 'DESC')->first(); 


        return $fronted_ads;
    }


    public function index()
    { 
        return view('frontend/index');
    }
    public function about_us()
    { 
        return view('frontend/about_us');
    }
    public function contact_us()
    { 
        return view('frontend/contact_us');
    }
    public function departments()
    { 
        return view('frontend/departments');
    }

    public function gallery()
    { 
        return view('frontend/gallery');
    }

    public function services()
    { 
        return view('frontend/services');
    }
     
   public function appointment()
    { 
        return view('frontend/appointment');
    }





    public function news($id, $title)
    {
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();

        $latest_one_news = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.userid', 'boi_news.newsstatus', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news_categoris.menuid', 'boi_news_categoris.menusubid', 'boi_news_categoris.newsmainid')
            ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
            ->where('boi_news_categoris.menuid', $id)
            ->where('boi_news_categoris.menusubid', '0')
            ->where('boi_news.newsstatus', '3')
            ->orderBy('boi_news.newsid', 'DESC')
            ->take(1)
            ->first();
        //dd($latest_one_news);

        $all_category_news = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.userid', 'boi_news.newsstatus', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news_categoris.menuid', 'boi_news_categoris.menusubid', 'boi_news_categoris.newsmainid')
            ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
            ->where('boi_news_categoris.menuid', $id)
            ->where('boi_news_categoris.menusubid', '0')
            ->where('boi_news.newsstatus', '3')
            ->orderBy('boi_news.newsid', 'DESC')
            ->paginate(13);

        $categories = DB::table('boi_menu')->select('menuid', 'menutitle')->where('menuid', $id)->first();

        $viewcount = DB::table('boi_news')->select('newsid', 'readcount')->where('newsid', $id)->first();
        //$add 			= 1 + $viewcount->readcount;
        //DB::table('boi_news')->where('newsid', $id)->update(array('readcount' => $add)); // update for read news

        $popular = DB::table('boi_news')->select('newsid', 'readcount', 'newstitle', 'newsdetails', 'newsupdatetime', 'news_image', 'newsupdatetime')
            ->where('newsstatus', '3')->where('readcount', '>', '0')->orderBy('newsid', 'DESC')->take(4)->get();

        $fronted_ads = $this->get_ads($id);
        return view('frontend/news_categories', compact('menu', 'latest_news', 'all_category_news', 'categories', 'popular', 'heading_news', 'fronted_ads', 'latest_one_news'));
    }

































    public function newssub($id, $title)
    {

        //dd($id);
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();

        $all_category_news = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news_categoris.menuid', 'boi_news_categoris.menusubid', 'boi_news_categoris.newsmainid')
            ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
            ->where('boi_news_categoris.menusubid', $id)
            ->orderBy('boi_news.newsid', 'DESC')
            ->paginate(5);

        $categories = DB::table('boi_menu')->select('menuid', 'menutitle')->where('menuid', $id)->first();

        //$viewcount		= DB::table('boi_news')->select('newsid','readcount')->where('newsid', $id)->first();
        //$add 			= 1 + $viewcount->readcount;
        //DB::table('boi_news')->where('newsid', $id)->update(array('readcount' => $add)); // update for read news

        $popular = DB::table('boi_news')->select('newsid', 'readcount', 'newstitle', 'newsdetails', 'newsupdatetime', 'news_image', 'newsupdatetime')
            ->where('newsstatus', '3')->where('readcount', '>', '0')->orderBy('newsid', 'DESC')->take(4)->get();

        // $advertizing1	= DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning','=','1')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing8	= DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning','=','8')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing7	= DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning','=','7')->orderBy('id', 'DESC')->take(1)->get();


        // $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        $fronted_ads = $this->get_ads($id);
        return view('frontend/sub_news_categories', compact('menu', 'latest_news', 'all_category_news', 'categories', 'popular', 'heading_news', 'fronted_ads'));
    }


    public function news_details($id, $title)
    {


        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->where('newsid', '!=', $id)->orderBy('newsid', 'DESC')->take(13)->get();

        $details = DB::table('boi_news')->select('newscreatetime', 'boi_news.created_at', 'boi_news.newsid', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.news_sub_title_1', 'boi_news.news_sub_title_2', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news.youtube', 'boi_news.newsseometatag', 'boi_news.newsseotitle', 'boi_news.newsseodetails', 'boi_news_categoris.menuid', 'boi_news_categoris.newsmainid')
            ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
            ->where('boi_news.newsid', $id)->first();

        $publisher = DB::table('admins')->select('admins.id', 'admins.name', 'boi_news.newsid', 'boi_news.userid')
            ->leftJoin('boi_news', 'boi_news.userid', '=', 'admins.id')
            ->where('boi_news.newsid', $id)->first();

        $categories = DB::table('boi_news_categoris')->select('boi_news_categoris.menuid', 'boi_news_categoris.newsmainid', 'boi_menu.menuid', 'boi_menu.menutitle')
            ->leftJoin('boi_menu', 'boi_menu.menuid', '=', 'boi_news_categoris.menuid')
            ->where('boi_news_categoris.newsmainid', $id)->first();

        $TT=  DB::table('boi_news_categoris')->select('menuid')->where('newsmainid', $id)->first();
        $categori_id= $TT->menuid;
      //  dd($TT);

    $relatedpost=  DB::table('boi_news')->select('newscreatetime', 'boi_news.created_at', 'boi_news.newsid', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.news_sub_title_1', 'boi_news.news_sub_title_2', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news.youtube', 'boi_news.newsseometatag', 'boi_news.newsseotitle', 'boi_news.newsseodetails', 'boi_news_categoris.menuid', 'boi_news_categoris.newsmainid')
            ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
            ->where('boi_news_categoris.menuid','=', $categori_id)             
            ->orderBy('boi_news.newsid', 'desc')
            ->take(3)->get(); 
// echo '<pre>';
// print_r($relatedpost);
// echo '</pre>';
//          //  dd($relatedpost); 
// exit; 


        $viewcount = DB::table('boi_news')->select('newsid', 'readcount')->where('newsid', $id)->first();
        $add = 1 + $viewcount->readcount;
        DB::table('boi_news')->where('newsid', $id)->update(array('readcount' => $add)); // update for read news

        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();

        $post_comments = DB::table('boi_comments')->where('active', '1')->where('newsid', $id)->where('replyid', '0')->orderBy('newsid', 'ASC')->get();
        $comments_count = DB::table('boi_comments')->where('newsid', $id)->where('active', '1')->get()->count();


        // $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();
  

        // $MebuId = DB::table('boi_news')->select('boi_news.newsid', 'boi_news_categoris.menuid')
        //         ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
        //         ->where('boi_news.newsid', $id)
        //         ->get(); 




        return view('frontend/news_details', compact('menu', 'latest_news', 'details', 'publisher', 'categories', 'popular', 'post_comments', 'comments_count', 'heading_news','relatedpost'));
    }


    public function search(Request $request)
    {
        $searchval = $request->get('search');

        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();

        $all_category_news = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.userid', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.news_image', 'boi_news.newsupdatetime', 'boi_news.youtube', 'boi_news_categoris.menuid', 'boi_news_categoris.newsmainid', 'admins.id', 'admins.name')
            ->leftJoin('boi_news_categoris', 'boi_news_categoris.newsmainid', '=', 'boi_news.newsid')
            ->leftJoin('admins', 'admins.id', '=', 'boi_news.userid')
            ->where('boi_news.newstitle', 'LIKE', '%' . $searchval . '%')->paginate(5);


        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();


        /* modified by jmrashed  */
        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        return view('frontend/news_search', compact('menu', 'latest_news', 'all_category_news', 'popular', 'searchval', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12'));
    }


    public function live()
    {


        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();


        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();


        /* modified by jmrashed  */
        // $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        // $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        $i=1;
        $all_ads=DB::table('boi_ads')->select('*')->where([['status', '1'], ['categorie_id', '1000']])->orderBy('positioning', 'ASC')->get();
        foreach ($all_ads as $key) {
            $fronted_ads[$i++]=$key;       
        }

        return view('frontend/news_live', compact('menu', 'latest_news', 'all_category_news', 'popular', 'heading_news', 'fronted_ads'));

    }

    public function commentsadd(Request $request)
    {
        //dd($request->all());

        DB::table('boi_comments')->insert(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'comment' => $request->get('message'),
                'newsid' => $request->get('newsid'),
                'replyid' => $request->get('replyid'),
                'active' => '0',
                'datetime' => date('d F Y h:i:s')
            ]
        );
        return 0;
    }

    public function subscribe(Request $request)
    {
        //dd($request->all());
        $check = DB::table('subscribe')->where('email', $request->get('subscribe'))->first();

        if (sizeof($check) > 0) {
            return 1;
        } else {
            DB::table('subscribe')->insert(
                [
                    'email' => $request->get('subscribe')
                ]
            );
            return 0;
        }
    }

    public function online_vote(request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id' => 'required',
            //'ip_address' => 'unique:election'
        ]);

        //  dd($request->ip());
        $ip_address = $request->ip();
        $checking = DB::table('election')->where('ip_address', '=', $ip_address)->where('online_vote_id', '=', $request->get('online_vote_id'))->first();
        //  dd($checking);
        if ($checking == "") {
            $oldCheck = DB::table('election')->where('online_vote_id', '=', $request->get('online_vote_id'))->first();
            if (sizeof($oldCheck) > 0) {
                if ($request->get('id') == 1) {
                    $newTotalAdd = 1 + $oldCheck->yes;
                    DB::table('election')->where('online_vote_id', $request->get('online_vote_id'))
                        ->update(
                            array(
                                'yes' => $newTotalAdd
                            )
                        );
                    echo 1;
                } elseif ($request->get('id') == 2) {
                    $newTotalAdd = 1 + $oldCheck->no;
                    DB::table('election')->where('online_vote_id', $request->get('online_vote_id'))
                        ->update(
                            array(
                                'no' => $newTotalAdd
                            )
                        );
                    echo 1;
                } elseif ($request->get('id') == 3) {
                    $newTotalAdd = 1 + $oldCheck->noComments;
                    DB::table('election')->where('online_vote_id', $request->get('online_vote_id'))
                        ->update(
                            array(
                                'noComments' => $newTotalAdd
                            )
                        );
                    echo 1;
                }
            } else {
                $newTotalAdd = 1;

                if ($request->get('id') == 1) {

                    DB::table('election')->insert(
                        [
                            'yes' => $newTotalAdd,
                            'noComments' => 0,
                            'no' => 0,
                            'online_vote_id' => $request->get('online_vote_id'),
                            'ip_address' => $ip_address
                        ]
                    );
                    echo 1;
                } elseif ($request->get('id') == 2) {
                    DB::table('election')->insert(
                        [
                            'no' => $newTotalAdd,
                            'noComments' => 0,
                            'yes' => 0,
                            'online_vote_id' => $request->get('online_vote_id'),
                            'ip_address' => $ip_address
                        ]
                    );
                    echo 1;
                } elseif ($request->get('id') == 3) {
                    DB::table('election')->insert(
                        [
                            'noComments' => $newTotalAdd,
                            'yes' => 0,
                            'no' => 0,
                            'online_vote_id' => $request->get('online_vote_id'),
                            'ip_address' => $ip_address
                        ]
                    );
                    echo 1;
                }
            }
        } else {
            echo 0;
        }
    }

    public function vote_result()
    {
        //dd("123"); exit;
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();


        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();
        $vote = DB::table('boi_vote')->where('status', '1')->orderBy('id', 'DESC')->paginate(5);
        /* modified by jmrashed  */
        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        $categories = DB::table('boi_menu')->select('menuid', 'menutitle')->where('menuid', 1000)->first();

        return view('frontend/vote_result', compact('menu', 'vote', 'latest_news', 'popular', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12', 'categories'));
    }

    public function news_gallery($id, $title)
    {
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();


        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();


        $gallery = DB::table('boi_gallery')->where('type', $id)->where('status', '1')->orderBy('id', 'DESC')->paginate(20);

        /* modified by jmrashed  */
        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        return view('frontend/gallery', compact('menu', 'gallery', 'latest_news', 'popular', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12'));
    }

    public function news_video()
    {
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();


        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();


        $video = DB::table('media')->where('status', '2')->orderBy('id', 'DESC')->paginate(20);
        /* modified by jmrashed  */
        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        return view('frontend/video', compact('menu', 'video', 'latest_news', 'popular', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12'));
    }


    public function somethingwrong()
    {
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();

        return view('frontend/error', compact('menu', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12'));
        //return view('clean404/index');
    }

    public function english()
    {
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();

        return view('frontend/english', compact('menu', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12'));
        //return view('clean404/index');
    }

    public function news_album()
    {
        $menu = DB::table('boi_menu')->where('menuparent', 'none')->where('menustatus', '1')->orderBy('menuposid', 'ASC')->get();

        $heading_news = DB::table('boi_news')->select('newsid', 'userid', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news', 'serial', 'heading_news', 'today_program', 'latest', 'nirbachito', 'newsstatus')
            ->where('newsstatus', '3')->where('heading_news', '1')->orderBy('newsid', 'DESC')->take(20)->get();

        $latest_news = DB::table('boi_news')->select('newsid', 'userid', 'newsstatus', 'newstitle', 'newsdetails', 'news_image', 'newsupdatetime', 'top_news')
            ->where('newsstatus', '3')->orderBy('newsid', 'DESC')->take(13)->get();


        $popular = DB::table('boi_news')->select('boi_news.newsid', 'boi_news.readcount', 'boi_news.newstitle', 'boi_news.newsdetails', 'boi_news.newsupdatetime', 'boi_news.news_image', 'boi_news.newsupdatetime')
            ->where('boi_news.newsstatus', '3')->where('boi_news.readcount', '>', '0')->orderBy('boi_news.newsid', 'DESC')->take(4)->get();


        $gallery = DB::table('boi_galleryalbum')->orderBy('id', 'DESC')->paginate(20);

        /* modified by jmrashed  */
        $advertizing1 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '1')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing2 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '2')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing3 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '3')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing4 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '4')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing5 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '5')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing6 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '6')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing7 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '7')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing8 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '8')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing9 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '9')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing10 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '10')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing11 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '11')->orderBy('id', 'DESC')->take(1)->get();
        $advertizing12 = DB::table('boi_ads')->select('*')->where('status', '1')->where('positioning', '=', '12')->orderBy('id', 'DESC')->take(1)->get();

        return view('frontend/album', compact('menu', 'gallery', 'latest_news', 'popular', 'heading_news', 'advertizing1', 'advertizing2', 'advertizing3', 'advertizing4', 'advertizing5', 'advertizing6', 'advertizing7', 'advertizing8', 'advertizing9', 'advertizing10', 'advertizing11', 'advertizing12'));
    }
}
