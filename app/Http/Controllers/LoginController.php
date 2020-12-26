<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function index() {
    	return view('login');
    }

    function auth(Request $request)
    {
        // dd($request->only('email', 'password'));
    	if(Auth::attempt($request->only('email', 'password'))) {
    		return redirect()->route('home');
    	}
    	return back();
    }

    function logout() {
    	Auth::logout();
    	return redirect()->route('home');
    }
}
