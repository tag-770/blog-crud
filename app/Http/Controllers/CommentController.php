<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class CommentController extends Controller
{
    /**
     * コメントの作成画面を表示する
     */
    public function createComment($id)
    {
        $blog = Blog::find($id);
        return view("comment");
    }
}
