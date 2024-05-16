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

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::group(['middleware' => ['auth', 'verified']], function() {
    // Route::group(['middleware' => ['auth' , 'permission']], function() {
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('news', 'NewsController@index')->name('news.index');
        Route::get('profile', 'ProfileController@showProfile')->name('my.profile');
        // Route::post('profile', 'ProfileController@changePassword')->name('changePassword');
        Route::post('profile', 'ProfileController@changePasswordPost')->name('changePasswordPost');
        Route::resource('roles', 'Auth\RolesController');
        Route::resource('permissions', 'Auth\PermissionsController');

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'Auth\UsersController@index')->name('users.index');
            Route::get('/create', 'Auth\UsersController@create')->name('users.create');
            Route::post('/create', 'Auth\UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'Auth\UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'Auth\UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'Auth\UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'Auth\UsersController@destroy')->name('users.destroy');
        });


        Route::group(['prefix' => 'traders-sentiment'], function() {
            Route::get('/', 'TradersSentimentController@chart')->name('admin.chart');
            Route::get('dashboard', 'TradersSentimentController@dashboard')->name('admin.dashboard');
            Route::get('datatransaction', 'TradersSentimentController@getDatatransaction')->name('admin.datatransaction');
            Route::get('datatable', 'TradersSentimentController@getDatatable')->name('admin.datatable');
            Route::post('fetch-ratios', 'TradersSentimentController@fetchAndSaveRatios')->name('admin.fetch');
            Route::post('deleteData', 'TradersSentimentController@deleteData')->name('admin.deleteData');
            Route::post('deleteSelected', 'TradersSentimentController@deleteSelected')->name('admin.deleteSelected');

        });
         // Experts
        Route::group(['prefix' => 'expert-advisors'], function() {

            Route::get('/', 'ExpertAdvisorController@index')->name('expert.index');
            Route::get('list', 'ExpertAdvisorController@list')->name('expert.list');
            Route::get('add', 'ExpertAdvisorController@create')->name('expert.create');
            Route::post('add', 'ExpertAdvisorController@store')->name('expert.store');
            Route::get('show/{id}', 'ExpertAdvisorController@show')->name('expert.show');
            Route::get('edit/{id}', 'ExpertAdvisorController@edit')->name('expert.edit');
            Route::put('update/{id}', 'ExpertAdvisorController@update')->name('expert.update');
            Route::delete('delete/{id}', 'ExpertAdvisorController@destroy')->name('expert.destroy');
           

        });

        Route::group(['prefix' => 'indicators'], function() {

            Route::get('/', 'IndicatorsController@index')->name('indicator.index');
            Route::get('list', 'IndicatorsController@list')->name('indicator.list');
            Route::get('add', 'IndicatorsController@create')->name('indicator.create');
            Route::post('save', 'IndicatorsController@store')->name('indicator.store');
            Route::get('show/{slug}', 'IndicatorsController@show')->name('indicator.show');
            Route::get('edit/{id}', 'IndicatorsController@edit')->name('indicator.edit');
            // Route::get('edit/{slug}', 'IndicatorsController@edit')->name('indicator.edit');
            Route::put('update/{id}', 'IndicatorsController@update')->name('indicator.update');
            Route::delete('delete/{id}', 'IndicatorsController@destroy')->name('indicator.destroy');

        });



    });




});
