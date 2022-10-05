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

Route::get('/home', function () {
    return view('layouts.home');
});

//flow recommender
Route::get('/games/{game}/arrange/{community1}/vs/{community2}', 'GameController@arrange');
//Route::get('/games/queue','GameController@queue');

//find game, exclude creator
Route::get('/games/find','GameController@find');

//join function for game
Route::get('/games/join/{game}', 'GameController@join'); //ni ?? tul ??

//finish game
Route::get('/games/finish', 'GameController@finish');

//join function for community
Route::get('/communities/join/{community}', 'CommunityController@join'); 

//jadi tapi dia ambik index.blade
//skang ni nak panggil method index kt find
//tapi problemnye satu jer, satu route satu method jer ke ?

// Route::get('/games/find', function () {
//     return view('games.find');
// });
//join route ?????

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'UserController@profile');

Route::get('users/{pemain}', 'UserController@show');

//create Multi game for tournament
Route::get('/games/createMulti' , 'GameController@createMulti');

//resource game
Route::resource('games', 'GameController');

//resource community, tak perfect tak fk kan so relationship cam sampah
Route::resource('communities', 'CommunityController');

//recomender controller and page
Route::get('/test','GameController@test');

//resource attribute
Route::resource('attributes','AttributeController');

//resource courts
Route::resource('courts','CourtController');

//resource voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



// Route::get('/games/create', 'GameController@create');
// Route::post('/games', 'GameController@store');
// Route::get('/games', 'GameController@index');
// Route::post('/games', 'GameController@edit');
// Route::get('/games', 'GameController@destroy');

// Route for show picture
// Route::get('profile', 'AvatarController@index') ->name('home');
