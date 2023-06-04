<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

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
}
