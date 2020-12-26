<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BaiHaiController;
use App\Http\Controllers\BaiBonController;
use App\Http\Controllers\BaiSauController;
use App\Models\User;
use App\Models\Post;
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


Route::get('', function() {
	return view('home');
});

Route::get('/bai2', [BaiHaiController::class, 'get']);

Route::get('/bai3', function() {
	return view('bai3');
})->middleware('login')->name('login');

Route::get('/taobaiviet', function() {
	return view('taobaiviet');
})->middleware(['login','role']);

Route::get('/bai4', [BaiBonController::class, 'store']);

Route::get('/bai5', function() {
	return view('bai5');
});

Route::resource('bai6', BaiSauController::class);

Route::get('a', function() {
	$u = User::with('profile')->find(1);
	dd($u->toArray());
});

Route::get('b', function() {
	$u = User::with('posts')->find(1);
	dd($u->toArray());
});