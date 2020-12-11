<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BaiBonController extends Controller
{
    function store(Request $request) {
    	$searchText = $request->input('search');
    	$isDate = Carbon::hasFormat($searchText, 'Y-m-d');
    	$posts = DB::table('posts');

    	if($isDate) {
    		$posts->whereDate('created_at', $searchText);
    	} else {
    	$posts->where('slug', 'LIKE', "%{$searchText}%")
    	->orWhere('content', 'LIKE', "%{$searchText}%");
    	}

    	$posts =$posts->paginate(10);
    	return view('bai4', ['posts'=>$posts]);
    }
}
