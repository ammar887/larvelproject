<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SchoolController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('city',function(){
//     return view('createcity');
// });

Route::resource('citys',CityController::class);

Route::resource('areas',AreaController::class);

Route::resource('schools',SchoolController::class);

Route::get('/get_area', [SchoolController::class,'getArea'])->name('get_area');
