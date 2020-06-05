<?php

use Illuminate\Support\Facades\Route;

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

Route::get('admin','UserController@FormLogin');
Route::post('admin','UserController@login');

Route::get('admin/logout','UserController@logout');

// admin
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    Route::group(['prefix'=>'dashboard'], function(){
        Route::get('index','DashboardController@overview');
    });

    Route::group(['prefix'=>'users'], function(){
        Route::get('list','UserController@getAll');

        Route::get('add','UserController@addUser');
        Route::post('add','UserController@postUser');

        Route::get('edit/{id}','UserController@formEditUser');
        Route::post('edit/{id}','UserController@editUser');
    });

    Route::group(['prefix'=>'clubs'], function(){
        Route::get('list','ClubController@getAll');

        Route::get('add','ClubController@addClub');
        Route::post('add','ClubController@postClub');

        Route::get('edit/{id}','ClubController@formEditClub');
        Route::post('edit/{id}','ClubController@editClub');

        Route::get('delete/{id}','ClubController@deleteClub');
    });

    Route::group(['prefix'=>'findamatch'], function(){
        Route::get('pending','FindAMatchController@getAll');
        Route::post('update/{id}','FindAMatchController@allow');
    });
});



// frontend
Route::group(['prefix'=>'front','middleware'=>'userlogin'],function(){
    Route::group(['prefix'=>'myclub'],function(){
        Route::get('info/{id}','ClubController@getInfo');
        Route::get('edit/{id}','ClubController@frontEditClub');
        Route::post('edit/{id}','ClubController@editmyclub');
        Route::get('create','ClubController@formCreateClub');
        Route::post('create','ClubController@createClub');
    });

    Route::group(['prefix'=>'clubs'],function(){
        Route::get('waiting','ClubController@waitingClub');
        Route::get('clubslist','ClubController@clubsList');
        Route::post('find','ClubController@newPost');
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('profile/{id}','UserController@getProfile');
    });
});



Route::get('front',function(){
    return view('front.home.index');
});
Route::get('front/login',function(){
    return view('front.user.login');
});
Route::post('front/login','UserController@userLogin');

Route::get('front/regist',function(){
    return view('front.user.regist');
});
Route::post('front/regist','UserController@userRegist');

Route::get('front/logout','UserController@userLogout');

Route::get('front/find',function(){
    return view('front.findamatch.find');
});

Route::post('front/mail/{id}','MailController@sendToUser');