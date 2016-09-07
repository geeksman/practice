<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckCreatePostField;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('posted', 1)->get();

        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(CheckCreatePostField $request)
    {
        if ($request->posted) {
            Post::create(['author' => Auth::user()->name, 'title' => $request->title, 'description' => $request->description,
            'posted' => (int)$request->posted, 'posted_at' => Carbon::now()]);
        } else {
            Post::create(['author' => Auth::user()->name, 'title' => $request->title, 'description' => $request->description,
                'posted' => strlen($request->posted)]);
        }

        return redirect('/post');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact('post'));
    }

    public function update(CheckCreatePostField $request, $id)
    {
        if ($request->posted) {
            Post::where('id', $id)->update(['author' => Auth::user()->name, 'title' => $request->title, 'description' => $request->description,
                'posted' => (int)$request->posted, 'posted_at' => Carbon::now()]);
        } else {
            Post::where('id', $id)->update(['author' => Auth::user()->name, 'title' => $request->title, 'description' => $request->description,
                'posted' => (int)$request->posted]);
        }

        return redirect('/post');

    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/post');
    }

    public function unpublished()
    {
        $posts = Post::where('author', Auth::user()->name)->where('posted', 0)->get();

        return view('home', compact('posts'));
    }

}
