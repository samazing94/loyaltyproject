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
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'UserController@index');

//restaurant list
Route::get('/datatable', 'DataTableController@datatable');
Route::get('datatable/getdata','DataTableController@getPosts')->name('datatable/getdata');
Route::get('/datatable/register', 'DataTableController@register');

//datatable operations
Route::post('/datatable/create', 'DataTableController@create');
Route::post('/datatable/update', 'DataTableController@update');
Route::post('/datatable/delete', 'DataTableController@delete');

//customer
Route::get('/sms', 'CustomerController@customer');
Route::get('/pushpull', 'CustomerController@pushpull');
//Route::get('/customer/success', 'CustomerController@success');

//customer operations
Route::get('/customer/create', 'CustomerController@create');

//