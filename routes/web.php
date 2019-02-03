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

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    // the life ti me of this sesstion is life time of user ....
    //session(['name'=>'emad']);
    //
    //$request->session()->put('foobar','baz');
 //return $request->session()->get('foobar');
    //return $request->session()->get('fosaddobar','defualt');
    return view('welcome');
});


//Route::get('/','PagesController@home');
//Route::get('/contact','PagesController@contact');
//Route::get('/about','PagesController@about');


/////////////////////////////////////////////////////////////////////////////////////
///
///
///
///
//Route::get('/projects','ProjectsController@index');
//Route::get('/projects/create','ProjectsController@create');
//Route::post('/projects','ProjectsController@store');

Route::resource('projects','ProjectsController');
Route::patch('/tasks/{task}','ProjectTasksController@update');
Route::post('/projects/{project}/tasks','ProjectTasksController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
