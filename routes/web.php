<?php

use App\Http\Controllers\NhomsanphamController;
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


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resources([
        'nhomsanpham' => NhomsanphamController::class,
    ]);

});
