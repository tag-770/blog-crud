<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class CategoryController extends Controller
{
    /**
     * カテゴリー名の作成画面を表示する
     */
    public function createCategory()
    {
        return view("category");
    }

    /**
     * カテゴリーを作成する
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'unique:categories'],
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('home');
    }

    /**
     * カテゴリー名の一覧画面を表示する
     */
    public function showCategory($slug)
    {
        // $category = Category::where('slug', $slug)->first();
        // $blogs = Blog::where('category_id', $category->id)->get();
        $blogs = Category::where('slug', $slug)->first()->blogs;
        return view("categorylist")->with('blogs',$blogs);
    }
}
