<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	// ADMIN PAGES
	Route::get('/announcement-page', 'AdminPagesController@showAddAnnouncementPage')->name('announcement.page');

	Route::get('/bulletin-page', 'AdminPagesController@showAddBulletinPage')->name('bulletin.page');
	Route::get('/user-page', 'AdminPagesController@showAddUserPage')->name('user.page');

	// ADMIN POST FUNCTION
	Route::post('/post-announcement', 'AdminStoreController@postAnnouncement')->name('post.announcement');
	Route::post('/post-bulletin', 'AdminStoreController@postBulletin')->name('post.bulletin');
	Route::post('/add-student', 'AdminStoreController@addStudent')->name('add.student');


	// ANNOUNCEMENTS CONTROLLER

	Route::get('/get-announcements', 'AdminAnnouncementsController@getAnnouncements')->name('get.announcements');
	Route::get('/show-announcements-page', 'AdminAnnouncementsController@index')->name('show.announcements');
	Route::delete('/delete-announcement/{id}', 'AdminAnnouncementsController@destroy')->name('delete.announcement');
	


});


