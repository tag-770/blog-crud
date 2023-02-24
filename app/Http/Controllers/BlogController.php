<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

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
            'user_id' => Auth::id()
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

    /**
     * ブログを削除する処理
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.create');
    }

    /**
     * ブログの編集画面を表示する
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view("edit")->with('blog', $blog);
    }

    /**
     * ブログの更新をする
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required', 'min:10'],
        ]);

        Blog::find($id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect()->route('top');
    }
}
