<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superadmin')->user();

    //dd($users);

    return view('backend.dashboard_middle');
})->name('dashboard');




	Route::get('/home', 'LaravelController@dashboard');

	Route::get('/remove_top1', 'LaravelController@remove_top1');
	
	Route::get('/posts', 'LaravelController@posts');
	Route::get('/newadd', 'LaravelController@newadd');
	Route::post('/submit_post', 'LaravelController@submit_post');
	Route::get('/post-edit/{id}', 'LaravelController@post_edit');
	Route::post('/update_post', 'LaravelController@update_post');
	Route::get('/post-delete/{id}', 'LaravelController@post_delete');
	Route::get('/unpublish_post', 'LaravelController@unpublish_post');

// modified by jmrashed


	 Route::get('/media_manager/all', 'LaravelController@media_manager_all');
	// Route::get('/newadd', 'LaravelController@newadd');
	// Route::post('/submit_post', 'LaravelController@submit_post');
	// Route::get('/post-edit/{id}', 'LaravelController@post_edit');
	// Route::post('/update_post', 'LaravelController@update_post');
	// Route::get('/post-delete/{id}', 'LaravelController@post_delete');
	// Route::get('/unpublish_post', 'LaravelController@unpublish_post');










	
	Route::get('/headline', 'LaravelController@hdn');
	Route::post('/update_headline', 'LaravelController@update_headline');
	Route::post('/submit_headline', 'LaravelController@submit_headline');
	Route::get('/headline-edit/{id}', 'LaravelController@headline_edit');
	Route::get('/headline-delete/{id}', 'LaravelController@headline_delete');

	Route::get('/categories', 'LaravelController@categories');
	Route::post('/categoriessubmit', 'LaravelController@categoriessubmit');
	Route::get('/categoriesedit', 'LaravelController@categoriesedit');
	Route::get('/categoriesdelete/{id}', 'LaravelController@categoriesdelete');
	Route::post('/categoriesupdate', 'LaravelController@categoriesupdate');
	
	
	Route::get('/superadmin_user', 'LaravelController@superadmin_user');
	Route::get('/superadmin_useradd', 'LaravelController@superadmin_useradd');
	Route::post('/superadmin_submit_user', 'LaravelController@superadmin_submit_user');
	Route::post('/superadmin_update_user', 'LaravelController@superadmin_update_user');
	
	Route::get('/superadmin_user_delete/{id}', 'LaravelController@superadmin_user_delete');
	Route::get('/superadmin_user_edit/{id}', 'LaravelController@superadmin_user_edit');
	
	
	Route::get('/user', 'LaravelController@user');
	Route::get('/useradd', 'LaravelController@useradd');
	Route::post('/submit_user', 'LaravelController@submit_user');
	Route::post('/update_user', 'LaravelController@update_user');
	
	Route::get('/user-delete/{id}', 'LaravelController@user_delete');
	Route::get('/user-edit/{id}', 'LaravelController@user_edit');
	
	
	Route::get('/media', 'LaravelController@media');
	Route::get('/newaddmedia', 'LaravelController@newaddmedia');
	Route::post('/submit_media', 'LaravelController@submit_media');
	Route::post('/update_media', 'LaravelController@update_media');
	
	Route::get('/media-delete/{id}', 'LaravelController@media_delete');
	Route::get('/media-edit/{id}', 'LaravelController@media_edit');
	
	
	Route::get('/gallery', 'LaravelController@gallery');
	Route::get('/newaddgallery', 'LaravelController@newaddgallery');
	Route::post('/submit_gallery', 'LaravelController@submit_gallery');
	Route::post('/update_gallery', 'LaravelController@update_gallery');
	
	Route::get('/gallery_delete', 'LaravelController@gallery_delete');
	Route::get('/gallery-edit/{id}', 'LaravelController@gallery_edit');
	
	
	Route::get('/galleryalbum', 'LaravelController@galleryalbum');
	Route::get('/newaddgalleryalbum', 'LaravelController@newaddgalleryalbum');
	Route::post('/submit_galleryalbum', 'LaravelController@submit_galleryalbum');
	Route::post('/update_galleryalbum', 'LaravelController@update_galleryalbum');
	
	Route::get('/galleryalbum_delete', 'LaravelController@galleryalbum_delete');
	Route::get('/galleryalbum-edit/{id}', 'LaravelController@galleryalbum_edit');
	
	
	Route::get('/ads', 'LaravelController@ads');
	Route::get('/newaddads', 'LaravelController@newaddads');
	Route::post('/submit_ads', 'LaravelController@submit_ads');
	Route::post('/update_ads', 'LaravelController@update_ads');
	
	Route::get('/ads_delete', 'LaravelController@ads_delete');
	Route::get('/ads-edit/{id}', 'LaravelController@ads_edit');
	
	
	Route::get('/vote', 'LaravelController@vote');
	Route::get('/newaddvote', 'LaravelController@newaddvote');
	Route::post('/submit_vote', 'LaravelController@submit_vote');
	Route::post('/update_vote', 'LaravelController@update_vote');
	
	Route::get('/vote_delete', 'LaravelController@vote_delete');
	Route::get('/vote-edit/{id}', 'LaravelController@vote_edit');
	
	
	
	Route::get('/post-comments/{id}', 'LaravelController@post_comments');
	Route::get('/commentspublic', 'LaravelController@commentspublic');
	Route::get('/commentsunpublic', 'LaravelController@commentsunpublic');
	Route::get('/topnews', 'LaravelController@topnews');

	

