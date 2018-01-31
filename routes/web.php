<?php

Route::get('noPermission', 'DashboardController@noPermission')->name('noPermission');

Route::post('register', 'Auth\RegisterController@register');

Route::get('register', 'HomeController@register')->name('register');


Route::group(array('domain' => 'babastudio.test'), (function () {

    Route::get('/', [
        'as' => '/',
        'uses' => 'LoginController@getLogin'
    ]);

    Route::post('login', [
        'as' => 'login',
        'uses' => 'LoginController@postLogin'
    ]);

    Route::group(['middleware' => ['authen']], function () {

        Route::post('/logout', [
            'as' => 'logout',
            'uses' => 'LoginController@getLogout'
        ]);

        Route::get('/dashboard', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@dashboard'
        ]);

        Route::get('me', [
            'as' => 'me',
            'uses' => 'ProfileController@index'
        ]);

        Route::get('me/edit', [
            'as' => 'me',
            'uses' => 'ProfileController@edit'
        ]);

        Route::put('me/update', [
            'as' => 'me.update',
            'uses' => 'ProfileController@update'
        ]);

        Route::get('me/update-image', [
            'as' => 'me.update.image',
            'uses' => 'ProfileController@changeImage'
        ]);

        Route::get('me/update-password', [
            'as' => 'me.update.password',
            'uses' => 'ProfileController@changePassword'
        ]);

        Route::resource('tenants', 'TenantController');

        Route::resource('categories', 'CategoryController');

        Route::resource('users', 'UserController');

        Route::put('user/update-role/{id}', 'UserController@changeRole')->name('changeRole');

        Route::post('users/select-expert', 'UserController@selectExpert')->name('users.selectExpert');

    });

}));

/* Tenant Routes */
Route::group(array(
    'domain' => '{subdomain}.babastudio.test',
    'as' => 'tenant.'
), (function () {

    /* Auth Routes*/
    Route::get('/', [
        'as' => 'landing',
        'uses' => 'LoginController@getTenantLogin'
    ]);

    Route::post('login', [
        'as' => 'login',
        'uses' => 'LoginController@tenantLogin'
    ]);

    Route::group(['middleware' => ['authen.tenant']], function () {

        Route::post('/logout', [
            'as' => 'logout',
            'uses' => 'LoginController@tenantLogout'
        ]);

        Route::get('/dashboard', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@tenantDashboard'
        ]);

        Route::get('me', [
            'as' => 'me',
            'uses' => 'ProfileController@index'
        ]);

        Route::get('me/edit', [
            'as' => 'me',
            'uses' => 'ProfileController@edit'
        ]);

        Route::put('me/update', [
            'as' => 'me.update',
            'uses' => 'ProfileController@update'
        ]);

        Route::put('me/update-image', [
            'as' => 'me.update.image',
            'uses' => 'ProfileController@changeImage'
        ]);

        Route::put('me/update-password', [
            'as' => 'me.update.password',
            'uses' => 'ProfileController@changePassword'
        ]);

        Route::put('user/update-role/{id}', [
            'as' => 'changeRole',
            'uses' => 'UserController@changeRole'
        ]);

        Route::resource('users', 'UserController', [
            'as' => 'tenant'
        ]);

    });
    /* End Auth Routes*/

}));
/* end Tenant Routes */

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/users/add-role', 'UserController@addRole');

Route::post('/users/delete-role', 'UserController@deleteRole');