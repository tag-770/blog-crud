<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * ユーザー名の編集をする
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

    /**
     * パスワードの編集画面を表示する
     */
    public function editPassword()
    {
        return view("password");
    }

    /**
     * バリデーション
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data,[
    //         'new_password' => 'required|min:8|confirmed',
    //         ]);
    // }

    /**
     * 現在のパスワードと入力されたパスワードが一致しているか確認
     */
    public function updatePassword(Request $request)
    {
        // 1 登録されているパスワードと現在のパスワードが一致していることを確認する
        $user = Auth::user();
        if(!password_verify($request->current_password,$user->password))
        {
            return redirect()->route('password.edit');
        }
        // 2 新パスワードのバリデーションをする
        $credentials = $request->validate([
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        // 3 パスワードを更新する
        // 4 ホームにリダイレクトする

        //新規パスワードの確認
        //$this->validator($request->all())->validate();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('top');
    }
}
