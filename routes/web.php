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
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'UserController@index');
Route::get('/manage', 'RestaurantsController@manage');
Route::get('/manage/index', 'RestaurantsController@index');
Route::get('/manage/create', 'RestaurantsController@manageCreate');
Route::post('/manage/update', 'RestaurantsController@manageUpdate');
Route::post('/manage/delete', 'RestaurantsController@manageDelete');