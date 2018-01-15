<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('backend.dashboard_middle');
})->name('dashboard');

	Route::get('/home', 'AdminController@dashboard');

	Route::get('/remove_top', 'AdminController@remove_top');
	
	Route::get('/user_posts', 'AdminController@user_posts');
	Route::get('/user_newadd', 'AdminController@user_newadd');
	Route::get('/unpublish_post', 'AdminController@unpublish_post');

	Route::post('/user_submit_post', 'AdminController@user_submit_post');
	
	Route::get('/headline', 'AdminController@hdn');
	Route::post('/update_headline', 'AdminController@update_headline');
	Route::post('/submit_headline', 'AdminController@submit_headline');
	Route::get('/headline-edit/{id}', 'AdminController@headline_edit');
	Route::get('/headline-delete/{id}', 'AdminController@headline_delete');


	Route::get('/user_post_edit/{id}', 'AdminController@user_post_edit');
	Route::get('/search_news', 'AdminController@search_news');
	Route::get('/search_news_editor', 'AdminController@search_news_editor');

	Route::post('/user_update_post', 'AdminController@user_update_post');
	Route::get('/user_post_delete/{id}', 'AdminController@user_post_delete');
	
	Route::get('/reporter-post', 'AdminController@reporter_post');
	
	Route::get('/view_post/{id}', 'AdminController@view_post');
	Route::post('/user_update_post_approval', 'AdminController@user_update_post_approval');
	
	Route::get('/activenews', 'AdminController@activenews');
	
	/*
		==========================================
	*/
	
	
	
	Route::get('/media', 'AdminController@media');
	Route::get('/newaddmedia', 'AdminController@newaddmedia');
	Route::post('/submit_media', 'AdminController@submit_media');
	Route::post('/update_media', 'AdminController@update_media');
	
	Route::get('/media-delete/{id}', 'AdminController@media_delete');
	Route::get('/media-edit/{id}', 'AdminController@media_edit');
	
	
	Route::get('/gallery', 'AdminController@gallery');
	Route::get('/newaddgallery', 'AdminController@newaddgallery');
	Route::post('/submit_gallery', 'AdminController@submit_gallery');
	Route::post('/update_gallery', 'AdminController@update_gallery');
	
	Route::get('/gallery_delete', 'AdminController@gallery_delete');
	Route::get('/gallery-edit/{id}', 'AdminController@gallery_edit');
	
	
	Route::get('/galleryalbum', 'AdminController@galleryalbum');
	Route::get('/newaddgalleryalbum', 'AdminController@newaddgalleryalbum');
	Route::post('/submit_galleryalbum', 'AdminController@submit_galleryalbum');
	Route::post('/update_galleryalbum', 'AdminController@update_galleryalbum');
	
	Route::get('/galleryalbum_delete', 'AdminController@galleryalbum_delete');
	Route::get('/galleryalbum-edit/{id}', 'AdminController@galleryalbum_edit');
	
	
	Route::get('/vote', 'AdminController@vote');
	Route::get('/newaddvote', 'AdminController@newaddvote');
	Route::post('/submit_vote', 'AdminController@submit_vote');
	Route::post('/update_vote', 'AdminController@update_vote');
	
	Route::get('/vote_delete', 'AdminController@vote_delete');
	Route::get('/vote-edit/{id}', 'AdminController@vote_edit');

