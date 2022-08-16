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

//
//



Route::get('/', 'Front\FirstController@index2');

Route::get('/test1', function () {
    return 'welcome';
}) ;


Route::get('/shownumber/{id}', function ($id) {
    return $id;
})->name('a');


Route::get('/showstring/{id?}', function () {
    return 'welcome';
})->name('b');


Route::get('/salma' , function(){
    return 'hello salma';
})->name('salma');


Route::namespace('Front')->group(function(){
    Route::get('users','UserController@showname');
});


Route::prefix('users')->group(function () {
    Route::get('show','UserController@showname');
    Route::delete('delete','UserController@showname');
    Route::get('edit','UserController@showname');
    Route::put('update','UserController@showname');
});

Route::group(['prefix'=>'users' , 'middleware' => 'auth' ,'namespace' => 'Front'],function (){
    Route::get('show','UserController@showname');
    Route::delete('delete','UserController@showname');
    Route::get('edit','UserController@showname');
    Route::put('update','UserController@showname');
});



Route::get('adminsec','Admin\AdminController@showString' );



Route::group(['namespace' => 'Admin'],function(){

    Route::get('admin0','AdminController@showString0' );
    Route::get('admin1','AdminController@showString1' );
    Route::get('admin2','AdminController@showString2' );
    Route::get('admin3','AdminController@showString3' );

});

Route::get('login',function(){
    return 'Must login to access this route';
})->name('login');

Route::resource('news','NewsController');



Route::get('landing',function (){
    return view('landing');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('redirect/{service}' , 'SocialController@redirect');



Route::get('callback/{service}' , 'SocialController@callback');


Route::get('fillable','CrudController@getOffers');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'offers'], function () {

        Route::get('create', 'CrudController@create')->name('offers.create');

        Route::post('store', 'CrudController@store')->name('offers.store');

        Route::get('index', 'CrudController@index')->name('offers.index');

        Route::get('edit/{id}', 'CrudController@edit')->name('offers.edit');

        Route::put('update/{id}', 'CrudController@update')->name('offers.update');
    });


});

//Route::group(['prefix'=>'offers'],function () {
//  //  Route::get('store', 'CrudController@store');
//  Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
//    Route::get('create','CrudController@create');
//  });
//
//
//});
Route::get('create','CrudController@create');
