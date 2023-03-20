<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ブログの編集画面を表示する
     */
    public function editUserName()
    {
        // $login_user_id = Auth::id();
        // $blog_user_id = Blog::find($id)->user_id;
        // if ($login_user_id !== $blog_user_id) {
        //     abort(403);
        // }
        // $blog = Blog::find($id);
        // return view("edit")->with('blog', $blog);
        return view("username");
    }
}
