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

// Route::get('/', function () {
//     return view('welcome');
// });

//login
Route::get('/', 'LoginController@showLogin')->name('user_login');

//reg
Route::get('/reg', 'AdminController@regPage')->name('reg');
// Route::get('/home', function() {
// 	return view('home');
// });
Route::get('users-like/{id}','HomeController@likeLove')->name('users-like');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Route::post('/home', 'HomeController@storeInfo')->name('store.info');

// Route::get('/deleteInfo/{id}', 'HomeController@deleteInfo')->name('delete');


// Route::get('/test', 'postController@show');

// Route::post('/contact','postController@add')->name('add');

// Route::get('/contact', 'postController@showdata');

//Route::get('/logout','postController@logout')->name('logout');

//Comment Place
Route::post('/store-comment','HomeController@storeComment')->name('store-comment');

//Admin Route
Route::get('/dashbord', 'AdminController@dashbordshow')->name('dashbord');
Route::get('/edit', 'AdminController@edit')->name('admin.edit');
Route::get('/update-place/{id}', 'AdminController@updatePlace')->name('admin.update-place');
Route::post('/update-place-data', 'AdminController@updatePlaceData')->name('admin.update-place-data');


Route::post('/dashbord','AdminController@addPlace')->name('addPlace');
Route::get('/liveview','AdminController@liveview')->name('liveview');
Route::get('/approve', 'AdminController@approvepage')->name('approve');
Route::get('/viewApprovePlace/{id}', 'AdminController@viewApprovePlace')->name('viewApprovePlace');
Route::get('/approvePost/{id}', 'AdminController@approvePost')->name('approvePost');
Route::get('/deleteUserPost/{id}', 'AdminController@deleteUserPost')->name('deleteUserPost');
Route::get('/messagelist', 'AdminController@messagelist')->name('messagelist');
Route::get('/deleteMessage/{id}', 'AdminController@deleteMessage')->name('deleteMessage');

Route::get('/test', 'AdminController@test')->name('test');
Route::post('/test', 'AdminController@testPost')->name('testPost');
//User Route

Route::get('/home', 'HomeController@blogShow')->name('home');

///
Route::get('/tab', 'HomeController@tab')->name('tab');

Route::get('/shareblog', 'HomeController@shareBlog')->name('shareblog');
Route::get('/suggestedplace', 'HomeController@suggestedPlace')->name('suggestedplace');
Route::get('/viewplace/{id}', 'HomeController@viewPlace')->name('viewplace');
Route::post('/addblog','HomeController@addBlog')->name('addblog');
Route::get('/cat/{cat}', 'HomeController@cat')->name('cat');
Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
Route::post('/updateUser/{id}', 'HomeController@updateUser')->name('updateUser');
Route::post('/addDetails/{id}', 'HomeController@addDetails')->name('addDetails');
Route::post('/UpdateDetails', 'HomeController@UpdateDetails')->name('UpdateDetails');
Route::get('/addPostPage', 'HomeController@addPostPage')->name('addPostPage');
Route::post('/userAddPost', 'HomeController@userAddPost')->name('userAddPost');
Route::post('/search', 'HomeController@search')->name('search');
Route::post('/review', 'HomeController@review')->name('review');
Route::post('/message', 'HomeController@message')->name('message');
Route::post('/like', 'HomeController@like')->name('like');
Route::post('/dislike', 'HomeController@dislike')->name('dislike');

//Ai Search
Route::get('/ai-search','AIcontroller@aiConctroller')->name('ai-search');
Route::post('/ai-data','AIcontroller@dataStore')->name('ai-data');

//User Route


Route::get('login/google', 'Auth\Social\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\Social\LoginController@handleProviderCallback');


//image Response

Route::get('image/{src}',function($src){
	return response()->file(storage_path().'/app/profiles/'.$src);
})->name('image');

Route::get('mainhome',function(){
	return view('mainhome');
})->name('mainhome');


Route::get('groups/{id}','HomeController@groups')->name('groups');
Route::get('group-create','HomeController@groupCreate')->name('group-create');

Route::post('create-group','HomeController@createGroup')->name('create-group');

Route::post('store-group-post','HomeController@storeGroupPost')->name('store-group-post');

Route::get('store-group-user/{id}/{user_id}','HomeController@storeGroupUser')->name('store-group-user');