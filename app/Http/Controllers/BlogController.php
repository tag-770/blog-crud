<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;

class BlogController extends Controller
{
    /**
     * ブログの新規作成画面を表示する
     */
    public function create()
    {
        $categories = Category::get();
        return view("create")->with('categories',$categories);
    }
    
    /**
     * ブログを作成する
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required'],
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('home');
    }

    /**
     * ブログの一覧を表示する
     */
    public function index()
    {
        $blogs = Blog::whereNull('deleted_at')->get();
        return view("index")->with('blogs',$blogs);
    }

    /**
     * ブログの詳細画面を表示する
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $comments = Comment::where('blog_id', $id)->get();
        return view('show',compact('blog','comments'));
    }

    /**
     * ブログを削除する処理
     */
    public function destroy($id)
    {
        $login_user_id = Auth::id();
        $blog_user_id = Blog::find($id)->user_id;
        if ($login_user_id !== $blog_user_id) {
            abort(403);
        }

        $blog = Blog::find($id);
        $blog->deleted_at = date('Y-m-d H:i:s');
        $blog->save();
        return redirect()->route('blog.create');
    }

    /**
     * ブログの編集画面を表示する
     */
    public function edit($id)
    {
        $login_user_id = Auth::id();
        $blog_user_id = Blog::find($id)->user_id;
        if ($login_user_id !== $blog_user_id) {
            abort(403);
        }
        $blog = Blog::find($id);
        return view("edit")->with('blog', $blog);
    }

    /**
     * ブログの更新をする
     */
    public function update(Request $request, $id)
    {
        $login_user_id = Auth::id();
        $blog_user_id = Blog::find($id)->user_id;
        if ($login_user_id !== $blog_user_id) {
            abort(403);
        }
        
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

    /**
     * マイページに自身のブログ一覧を表示する
     */
    public function showMyBlogs()
    {
        // $user_id = Auth::id();
        // $myblogs = Blog::where('user_id', $user_id)->get();
        $myblogs = User::find(Auth::id())->blogs;
        return view("mybloglist")->with('myblogs',$myblogs);
    }
}
