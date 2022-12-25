<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create()
    {
        return view("create");
    }

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

    public function index()
    {
        $blogs = Blog::all();
        return view("index")->with('blogs',$blogs);
    }
}
