<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BaiSauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ps = Post::query()->paginate(20);
        return view('bai6.index', ['posts'=>$ps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bai6.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('slug')===null) {
            return redirect()->route('bai6.create')->with('status','Hãy nhập đủ thông tin');
        }
        if($request->input('title')===null) {
            return redirect()->route('bai6.create')->with('status','Hãy nhập đủ thông tin');
        }
        if($request->input('content')===null) {
            return redirect()->route('bai6.create')->with('status','Hãy nhập đủ thông tin');
        }
        Post::query()->create($request->only('slug', 'title', 'content'));
        return redirect()->route('bai6.index')->with('status','Thêm thành công');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Post::query()->findOrFail($id);
        return view('bai6.edit', ['p'=>$p]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::query()->findOrFail($id);
        $post->update($request->only('slug','title', 'content'));
        return redirect()->route('bai6.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
    }
}
