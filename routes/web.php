<?php

 

Route::group(['prefix' => 'superadmin'], function () {
	Route::get('/login', 'SuperadminAuth\LoginController@showLoginForm');
	Route::post('/login', 'SuperadminAuth\LoginController@login');
	Route::get('/logout', 'SuperadminAuth\LoginController@logout');
	
	Route::get('/register', 'SuperadminAuth\RegisterController@showRegistrationForm');
	Route::post('/register', 'SuperadminAuth\RegisterController@register');
	
	Route::post('/password/email', 'SuperadminAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('/password/reset', 'SuperadminAuth\ResetPasswordController@reset');
	Route::get('/password/reset', 'SuperadminAuth\ForgotPasswordController@showLinkRequestForm');
	Route::get('/password/reset/{token}', 'SuperadminAuth\ResetPasswordController@showResetForm');

});



Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});

$ex= explode('/',Request::path());

if(($ex[0]!='superadmin') && ($ex[0]!='admin'))
{
 
     $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superadmin')->user();

    Route::get('/', 'FrontendController@index');
	Route::get('/news/{id}/{title}', 'FrontendController@news');
  Route::get('/newssub/{id}/{title}', 'FrontendController@newssub');
	Route::get('/news/rashifol/{id}/{title}', 'FrontendController@news_rashifol');

	Route::get('/{id}/{title}', 'FrontendController@news_details');
	Route::get('/search', 'FrontendController@search');
	Route::get('/live', 'FrontendController@live');
	Route::get('/commentsadd', 'FrontendController@commentsadd');
	Route::get('/subscribe', 'FrontendController@subscribe');
	Route::get('/online_vote', 'FrontendController@online_vote');
	Route::get('/result-vote', 'FrontendController@vote_result');
	Route::get('/news-gallery/{id}/{title}', 'FrontendController@news_gallery');
	Route::get('/albums-news', 'FrontendController@news_album');
	Route::get('/news-video', 'FrontendController@news_video');
	Route::get('/english', 'FrontendController@english');
	/*Route::get('/somethingwrong', 'FrontendController@somethingwrong');*/
}