<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api'], function() {
    //Route pour le SpecialiteController
    Route::get('specialites', 'SpecialiteController@index');
    Route::get('specialite/{id_specialite}', 'SpecialiteController@getSpecialite');

    //Route pour le Praticien Controller
    Route::get('praticien/{id_praticien}', 'PraticienController@show');
    Route::get('praticiens', 'PraticienController@index');
    Route::get('praticiens/{nom_praticien}', 'PraticienController@pratByName');
	Route::get('praticiens/specialite/{id_specialite}', 'PraticienController@pratBySpec');

    //Route pour le Posseder Controller
    Route::get('posseders', 'PossederController@index');
	Route::get('posseders/{id_praticien}/{id_specialite}', 'PossederController@show');
	Route::post('posseders', 'PossederController@store');
    Route::delete('posseders', 'PossederController@destroy');
    Route::put('posseders', 'PossederController@update');

	//Route du LoginController
	Route::get('logout', 'Auth\LoginController@logout');

});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');


