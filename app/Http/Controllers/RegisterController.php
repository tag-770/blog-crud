<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * 会員登録ページを表示する
     */
    public function index()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return view("register");
    }
}
