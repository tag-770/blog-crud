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
        $blogs_latest = $blogs->sortByDesc('created_at');
        return view("home")->with('blogs_latest',$blogs_latest);
    }
}
