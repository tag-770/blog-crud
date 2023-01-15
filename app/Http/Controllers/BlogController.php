<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * ブログの新規作成画面を表示する
     */
    public function create()
    {
        return view("create");
    }
    
    /**
     * ブログを作成する
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required', 'min:10'],
        ]);

        Blog::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('blog.create');
    }

    /**
     * ブログの一覧を表示する
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("index")->with('blogs',$blogs);
    }

    /**
     * ブログの詳細画面を表示する
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view("show")->with('blog', $blog);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.create');
    }
}
