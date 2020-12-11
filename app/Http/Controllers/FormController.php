<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\P;

class FormController extends Controller
{
    function add(Request $request) {
    	if($request->input('slug')===null) {
    		return redirect()->route('form')->with('status','Hãy nhập đủ thông tin');
    	}
    	if($request->input('title')===null) {
    		return redirect()->route('form')->with('status','Hãy nhập đủ thông tin');
    	}
    	if($request->input('description')===null) {
    		return redirect()->route('form')->with('status','Hãy nhập đủ thông tin');
    	}
    	$p = new P();
    	$p->slug = $request->slug;
    	$p->title = $request->title;
    	$p->description = $request->description;
    	$p->save();
    	return view('form2', ['s'=>$request->slug, 't'=>$request->title, 'd'=>$request->description]);
    }

    function show() {
    	$posts = P::all();
    	return view('list', ['posts'=>$posts]);
    }
}
