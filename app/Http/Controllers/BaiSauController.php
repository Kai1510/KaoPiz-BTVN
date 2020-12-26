<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\CreatePostRequest;
class BaiSauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ps = Post::with('user')->with('categories')->paginate(20);
        return view('bai6.index', ['posts'=>$ps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $us = User::query()->get();
        $cs = Category::query()->get();
        return view('bai6.create', ['us'=>$us, 'cs'=>$cs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {   
        $image = "";
        if($request->hasFile('image')) {
            $file = $request->image;
            $file->move(public_path('upload'), $file->getClientOriginalName());
            $image = 'upload/'.$file->getClientOriginalName();  

        }
        // $p = Post::query()->create($request->only('slug', 'title', 'content', 'user_id'), $image);
        $p = new Post();
        $p->slug = $request->slug;
        $p->title = $request->title;
        $p->content = $request->content;
        $p->image = $image;
        $p->save();
        $p->categories()->attach($request->categories);



        return redirect()->route('bai6.index')->with('status','Thêm thành công');

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
        $us = User::query()->get();
        $cs = Category::query()->get();
        $p = Post::with('user')->findOrFail($id);
        return view('bai6.edit', ['p'=>$p, 'us'=>$us, 'cs'=>$cs]);
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
        $post->update($request->only('slug','title', 'content','user_id'));
        return redirect()->route('bai6.index')->with('status','Sửa thành công');
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
