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

class FrontendController extends Controller {

    public function index() {
        $homeSliders = DB::table('boi_gallery')->select('*')->where([['status', 1], ['type', 1]])->orderby('created_at', 'DESC')->paginate(15);
        $client_speach = DB::table('auro_info')->select('*')->where([['status', 1], ['slug', 'client_speach']])->orderby('created_at', 'DESC')->take(5)->get();
        return view('frontend/index');
    }

    public function about_us() {
        $what_we_do = DB::table('auro_info')->select('*')->where([['status', 1], ['slug', 'what_we_do']])->orderby('created_at', 'DESC')->first();
        return view('frontend/about_us')->with('what_we_do', $what_we_do);
    }

    public function contact_us() {
        return view('frontend/contact_us');
    }

    public function consultants() {
        return view('frontend/consultants');
    }

    public function gallery() {
        $boi_gallerys = DB::table('boi_gallery')->select('*')->where('status', 1)->orderby('created_at', 'DESC')->paginate(15);
        return view('frontend/gallery')->with('boi_gallerys', $boi_gallerys);
    }

    public function services() {
        $services = DB::table('auro_info')->select('*')->where([['status', 1], ['slug', 'services']])->orderby('created_at', 'DESC')->get();
        //dd($services);
        return view('frontend/services')->with('services',$services);
    }

    public function appointment() {
        return view('frontend/appointment');
    }
    public function sendmail(Request $request) {
        dd($request);
        return view('frontend/appointment');
    }

}
