<?php

Route::get('noPermission', 'DashboardController@noPermission')->name('noPermission');

Route::post('register', 'Auth\RegisterController@register');

Route::get('register', 'HomeController@register')->name('register');


Route::group(array('domain' => 'babastudio.test'), (function () {


    Route::get('/', [
        'as' => '/',
        'uses' => 'LoginController@getLogin'
    ]);

    Route::resource('tenants', 'TenantController');

    Route::resource('categories', 'CategoryController');

    Route::post('users/select-expert', 'UserController@selectExpert')->name('users.selectExpert');

    Route::post('login', [
        'as' => 'login',
        'uses' => 'LoginController@postLogin'
    ]);

    Route::group(['middleware' => ['authen']], function () {
        Route::post('/logout', [
            'as' => 'logout',
            'uses' => 'LoginController@getLogout'
        ]);
    });

}));

Route::group(array('domain' => '{subdomain}.babastudio.test'), (function () {

    Route::get('/', [
        'as' => '/',
        'uses' => 'LoginController@getTenantLogin'
    ]);

    Route::post('login/tenant', [
        'as' => 'login.tenant',
        'uses' => 'LoginController@postLogin'
    ]);

    Route::group(['middleware' => ['authen']], function () {
        Route::post('/tenant/logout', [
            'as' => 'logout.tenant',
            'uses' => 'LoginController@getLogout'
        ]);
    });

}));

//================================================== BATAS RAPI================================================

Route::post('comments/post/{id}', 'CommentController@store');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('me', 'ProfileController@index')->name('me');
Route::get('me/edit', 'ProfileController@edit');
Route::put('me/update', 'ProfileController@update')->name('me.update');

Route::post('me/update-image', 'ProfileController@changeImage')->name('changeImage');

Route::post('me/update-password', 'ProfileController@changePassword')->name('changePassword');

Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);

//Route::group(['middleware' => ['authen', 'roles'], 'roles' => 'reviewer'], function () {
//    Route::get('/assessment', function () {
//        return view('assessments.index');
//    });
//
//    Route::get('assessment/{id}', 'AssessmentController@show');
//    Route::put('assessment/{id}', 'AssessmentController@store')->name('assessment');
//    Route::get('assessments', 'AssessmentController@index')->name('assessments.index');
//});
//
//Route::group(['middleware' => ['authen', 'roles'], 'roles' => 'pendamping'], function () {
//    Route::get('/monevs', 'MonevController@monev');
//    Route::put('approve-monev/{id}', 'MonevController@approveMonev')->name('approveMonev');
//    Route::put('unapprove-monev/{id}', 'MonevController@unapproveMonev')->name('unapproveMonev');
//    Route::put('approve-research/{id}', 'ResearchController@approveResearch')->name('approveResearch');
//    Route::put('unapprove-research/{id}', 'ResearchController@unapproveResearch')->name('unapproveResearch');
//    Route::get('advisor/researches', 'ResearchController@advisor')->name('advisor.researches');
//    Route::get('advisor/research/seemember/{id}', 'ResearchController@advisorSeeMember')->name('advisor.research.seemember');
//    Route::get('advisor/research/{id}/reports', 'MonevController@advisorindex')->name('advisor.research.reports');
//    Route::get('advisor/research/{id}', 'ResearchController@advisordetail')->name('advisor.research.detail');
//});

// Route::group(['middleware' => ['authen', 'roles'],'roles' => 'administrator'], function(){
Route::get('/roles', 'RoleController@index');
Route::put('user/update-role/{id}', 'UserController@changeRole')->name('changeRole');
Route::resource('users', 'UserController');

// });

Route::post('/users/add-role', 'UserController@addRole');

Route::post('/users/delete-role', 'UserController@deleteRole');