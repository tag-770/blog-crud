<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * ブログの編集画面を表示する
     */
    public function editUserName()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view("username")->with('user', $user);
    }
}
