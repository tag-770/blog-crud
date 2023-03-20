<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * ユーザー名の編集画面を表示する
     */
    public function editUserName()
    {
        $user = Auth::user();
        // $user = User::find($id);
        return view("username")->with('name', $user->name);
    }

    /**
     * ブログの更新をする
     */
    public function updateUserName(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => ['required', 'min:4'],
        ]);
        $user->update([
            'name' => $request->name,
        ]);
        return redirect()->route('top');

    }
}
