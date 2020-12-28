<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BaiHaiController;
use App\Http\Controllers\BaiBonController;
use App\Http\Controllers\BaiSauController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Models\Post;
use App\Mail\VerifyEmail;
use App\Notifications\VerifyEmailCre;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('', function() {
	return view('home');
});

// Route::get('/bai2', [BaiHaiController::class, 'get']);

// Route::get('/bai3', function() {
// 	return view('bai3');
// })->middleware('login')->name('login');

// Route::get('/taobaiviet', function() {
// 	return view('taobaiviet');
// })->middleware(['login','role']);

// Route::get('/bai4', [BaiBonController::class, 'store']);

// Route::get('/bai5', function() {
// 	return view('bai5');
// });

// Route::resource('bai6', BaiSauController::class);

// Route::get('a', function() {
// 	$u = User::with('profile')->find(1);
// 	dd($u->toArray());
// });

// Route::get('b', function() {
// 	$u = User::with('posts')->find(1);
// 	dd($u->toArray());
// });

// Route::get('c', function() {
// 	$p = Post::with('categories')->find(2010);
// 	dd($p->toArray());
// });

// Route::get('/creuser', function() {
// 	$u = User::query()->create([
// 		'name' => 'Anh',
//         'email' => 'a@gd',
//         'email_verified_at' => now(),
//         'password' => bcrypt('password'),
//         'remember_token' => Str::random(10),
// 	]);

// 	$u->profile()->create([
// 		'birthday'=>now(),
// 		'address'=>'VietNam'
// 	]);
// 	dd($u);
// });

// Route::get('/d', function() {
// 	$p = Post::query()->find(2100);
// 	dd($p->toArray());
// });

Route::get('/home', function() {
	return view('home');
})->middleware(['auth'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'auth'])->middleware(['after_login'])->name('login.auth');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('/sends', function() {
// 	Mail::send('mails.verify', [], function ($message) {
//             $message->to('admin@ghaposoft.com', 'Admin')
//                 ->subject("Subject to admin");
//         });
// 	return redirect()->route('home');
// });

// Route::get('/sendnude', function() {

// });


Route::get('/send', function() {
	$data = new \stdClass();
	$data->var_one = 'Hi';
	$data->var_two = 'Hem';
	Mail::to('receiver@example.com')->send(new VerifyEmail($data));
	return redirect()->route('home');
});

Route::get('/sendnude', function() {
	$data = new \stdClass();
	$data->var_one = 'Hi';
	$data->var_two = 'Hem';
	Notification::route('mail', 'receiver@exp.com')->notify(new VerifyEmailCre($data));
});

Route::get('/signup', function() {
	return view('signup');
});

Route::post('/creuser', function(Request $request) {
	$u = User::query()->create([
		'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'remember_token' => Str::random(10),
	]);
	$data = new \stdClass();
	$data->name = $u->name;
	$data->id = $u->id;
	Mail::to($u->email)->send(new VerifyEmail($data));
	return redirect()->route('login')->with('status','tạo acc thành công');
})->name('creuser');

Route::get('/email/verify/{id}/abc', function($id) {
	$user = User::query()->findOrFail($id);
	$user->email_verified_at = now();
    $user->save();
	return redirect()->route('login')->with('status', 'Xác thực thành công');
})->name('verifi_email');

Route::get('/xd', function() {
	return view('verification_notice');
})->name('verification.notice');


