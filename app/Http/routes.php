<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/user',['as'=>'user','uses'=>'HomeController@user']);
Route::get('/kandidaadid',['as'=>'kandidaadid','uses'=>'HomeController@kandidaadid']);
Route::get('/addkandidaadid',['as'=>'addkandidaadid','uses'=>'HomeController@addkandidaadid']);
Route::post('/addkandidaadid',['as'=>'addkandidaadid','uses'=>'HomeController@postaddkandidaadid']);
Route::get('/otsing',['as'=>'otsing','uses'=>'HomeController@otsing']);
Route::post('/otsing',['as'=>'otsing','uses'=>'HomeController@postotsing']);
Route::get('/facebookauth',['as'=>'facebookauth','uses'=>"Auth\AuthController@facebookauth"]);
Route::get('/facebooklogin',['as'=>'facebooklogin','uses'=>"Auth\AuthController@facebooklogin"]);
Route::get('/tulemus',['as'=>'tulemus','uses'=>"HomeController@tulemus"]);
Route::get('/getuser',['as'=>'usergetajax','uses'=>"HomeController@usergetajax"]);
Route::get('/tere',['as'=>'tere','uses'=>"HomeController@tere"]);
Route::match(['get', 'post'],'/haaletus',['as'=>'haaletus','uses'=>"HomeController@haaletus"]);
Route::match(['get', 'post'],'/statistika',['as'=>'statistika','uses'=>"HomeController@displaychart"]);
Route::get('/statistika', 'HomeController@statistika');
Route::get('/data{opt?}', 'HomeController@data($opt)');
 
Route::controller('/','Auth\AuthController');
