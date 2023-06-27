<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * ホーム画面を表示する
     */
    public function index()
    {
        $blogs = Blog::whereNull('deleted_at')->get();
        return view("home")->with('blogs',$blogs);
    }
}
