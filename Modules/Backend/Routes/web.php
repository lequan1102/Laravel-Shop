<?php

/*
| --------------------------------------------------------------------------
| Các tuyến đường web
| --------------------------------------------------------------------------
|
| Đây là nơi bạn có thể đăng ký các tuyến web cho ứng dụng của bạn. Những
| tuyến đường này được tải bởi RouteServiceProvider trong một nhóm chứa
| các nhóm phần mềm trung gian "web". Bây giờ tạo ra một cái gì đó tuyệt vời!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('locale', function () {
        return \App::getLocale();
    });
    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);
        $parts = parse_url(URL::previous());
        return redirect($locale.substr($parts['path'],3));
    });

    Route::prefix('admin')->group(function() {
        /*
        * Dashbroad Route
        */
        Route::group(['prefix' => 'dashbroad'], function(){
            Route::get('/','DashbroadController@index')->name('index.dashbroad');
            Route::get('/create','DashbroadController@create')->name('create.dashbroad');
            Route::post('/store','DashbroadController@store')->name('store.dashbroad');
            Route::get('/edit','DashbroadController@edit')->name('edit.dashbroad');

            Route::post('/update','DashbroadController@update')->name('update.dashbroad');
            Route::get('/destroy','DashbroadController@destroy')->name('destroy.dashbroad');
        });
            /*
        * Products Route
        */
        Route::group(['prefix' => 'products'], function(){
            Route::get('/','ProductsController@index')->name('index.products');
            Route::get('/create','ProductsController@create')->name('create.products');
            Route::post('/store','ProductsController@store')->name('store.products');
            Route::get('/edit/{id}','ProductsController@edit')->name('edit.products');

            Route::post('/update/{id}','ProductsController@update')->name('update.products');
            Route::get('/destroy/{id}','ProductsController@destroy')->name('destroy.products');
        });
        /*
        * Category Route
        */
        Route::group(['prefix' => 'category'], function(){
            Route::get('/','CategoryController@index')->name('index.category');
            Route::get('/create','CategoryController@create')->name('create.category');
            Route::post('/store','CategoryController@store')->name('store.category');
            Route::get('/edit/{id}','CategoryController@edit')->name('edit.category');
            Route::get('/show/{id}','CategoryController@show')->name('show.category');
            Route::post('/update/{id}','CategoryController@update')->name('update.category');
            Route::get('/destroy/{id}','CategoryController@destroy')->name('destroy.category');
        });
        /*
        * Posts Route
        */
        Route::group(['prefix' => 'posts'], function(){
            Route::get('/','PostsController@index')->name('index.posts');
            Route::get('/create','PostsController@create')->name('create.posts');
            Route::post('/store','PostsController@store')->name('store.posts');
            Route::get('/edit/{id}','PostsController@edit')->name('edit.posts');

            Route::post('/update/{id}','PostsController@update')->name('update.posts');
            Route::get('/destroy/{id}','PostsController@destroy')->name('destroy.posts');
        });
        /*
        * Users Route
        */
        Route::group(['prefix' => 'users'], function(){
            Route::get('/','UsersController@index')->name('index.users');
            Route::get('/create','UsersController@create')->name('create.users');
            Route::post('/store','UsersController@store')->name('store.users');
            Route::get('/edit','UsersController@edit')->name('edit.users');

            Route::post('/update','UsersController@update')->name('update.users');
            Route::get('/destroy','UsersController@destroy')->name('destroy.users');
        });
        /*
        * Administration Route
        */
        Route::group(['prefix' => 'administration'], function(){
            Route::get('/','AdminController@index')->name('index.admin');
            Route::get('/create','AdminController@create')->name('create.admin');
            Route::post('/store','AdminController@store')->name('store.admin');
            Route::get('/edit/{id}','AdminController@edit')->name('edit.admin');
            Route::post('/update/{id}','AdminController@update')->name('update.admin');

            Route::get('/forgot_password','AdminController@destroy')->name('forgot_password.admin');
        });
        /*
        * Contact Route
        */
        Route::group(['prefix' => 'contact'], function(){
            Route::get('/','ContactController@index')->name('index.contact');
            Route::get('/create','ContactController@create')->name('create.contact');
            Route::post('/store','ContactController@store')->name('store.contact');
            Route::get('/edit','ContactController@edit')->name('edit.contact');

            Route::post('/update','ContactController@update')->name('update.contact');
            Route::get('/destroy','ContactController@destroy')->name('destroy.contact');
        });
        /*
        * Menu Route
        */
        Route::group(['prefix' => 'menu'], function(){
            Route::get('/','MenuController@index')->name('index.menu');
            Route::post('/change','MenuController@change')->name('index.changemenu');
            Route::get('/create','MenuController@create')->name('create.menu');
            Route::post('/store','MenuController@store')->name('store.menu');
            Route::get('/edit','MenuController@edit')->name('edit.menu');

            Route::post('/update','MenuController@update')->name('update.menu');
            Route::get('/destroy','MenuController@destroy')->name('destroy.menu');
        });

        /*
        * Settings Route
        */
        Route::group(['prefix' => 'settings'], function(){
            Route::get('/','SettingsController@index')->name('index.settings');
            Route::get('/create','SettingsController@create')->name('create.settings');
            Route::post('/store','SettingsController@store')->name('store.settings');
            Route::get('/edit/{id}','SettingsController@edit')->name('edit.settings');

            Route::post('/update/{id}','SettingsController@update')->name('update.settings');
            Route::get('/destroy/{id}','SettingsController@destroy')->name('destroy.settings');
        });
        /*
        * Role Route
        */
        Route::group(['prefix' => 'roles'], function(){
            Route::get('/','RolesController@index')->name('index.roles');
            Route::get('/create','RolesController@create')->name('create.roles');
            Route::post('/store','RolesController@store')->name('store.roles');
            Route::get('/edit/{id}','RolesController@edit')->name('edit.roles');

            Route::post('/update/{id}','RolesController@update')->name('update.roles');
            Route::get('/destroy/{id}','RolesController@destroy')->name('destroy.roles');
        });
        /***************************
        ***** Developer Route ******
        ****************************/
        /*
        * Question Route
        */
        Route::group(['prefix' => 'question'], function(){
            Route::get('/','QuestionController@index')->name('index.question');
            Route::get('/create','QuestionController@create')->name('create.question');
            Route::post('/store','QuestionController@store')->name('store.question');
            Route::get('/edit/{id}','QuestionController@edit')->name('edit.question');
            Route::get('/show/{id}','QuestionController@show')->name('show.question');
            Route::post('/update/{id}','QuestionController@update')->name('update.question');
            Route::get('/destroy/{id}','QuestionController@destroy')->name('destroy.question');
        });
    });
});