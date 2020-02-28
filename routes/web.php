<?php

/*
|--------------------------------------------------------------------------
| Tuyến đường web
|--------------------------------------------------------------------------
|
| Đây là nơi bạn thiết lập các tuyến đường cho giao diện frontend bên ngoài
| trang web của bạn. Thật tuyệt vời!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    /**********************************************
     ********* Thiết lập cho đa ngôn ngữ **********
     **********************************************/
    Route::get('locale', function () {return \App::getLocale();});
    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);
        $parts = parse_url(URL::previous());
        return redirect($locale.substr($parts['path'],5));
    });
    /**********************************************
     ********* Thiết lập cho giao diện   **********
     **********************************************/

    
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/home', 'PostsController@index')->name('home');
    Route::get('/posts', 'PostsController@store')->name('posts');

    Route::get('/home', 'HomeController@index')->name('home');




    
    /**********************************************
     ******* Đăng nhập vào hệ thống quản lý *******
     **********************************************/
    // Đăng nhập cho người dùng quản trị
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/', 'LoginController@index')->name('index.administration');
        Route::post('/attempt', 'LoginController@attempt')->name('post.administration');
        Route::post('/logout','LoginController@logout')->name('logout.admin');
    });
    // Đăng nhập cho người dùng bình thường
    Auth::routes();
});