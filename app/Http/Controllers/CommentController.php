<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * コメントの作成画面を表示する
     */
    public function createComment($id)
    {
        $blog = Blog::find($id);
        return view("comment")->with('blog',$blog);
    }

     /**
     * コメントを投稿する
     */
    public function postComment(Request $request, $id)
    {
        $blog = Blog::find($id);

        $request->validate([
            'body' => ['required'],
        ]);

        $comment = Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'blog_id' => $blog->id
        ]);
        //return view("show")->with('blog',$blog);
        return redirect()->route('blog.show', $id);
    }

    /**
     * コメントの一覧を表示する
     */
    public function showComment()
    {
        // $user_id = Auth::id();
        // $mycomments = Comment::where('user_id', $user_id)->get();
        $comments = User::where('id', Auth::id())->first()->comments;
        $blog_comments = User::all();
        return view('commentlist',compact('comments','blog_comments'));
    }

}
