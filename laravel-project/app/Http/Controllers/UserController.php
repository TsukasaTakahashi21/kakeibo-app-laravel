<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    public function signUp()
    {
        return view('user.signUp');
    }

    public function signUp_confirm()
    {
        return view('user.signUp_confirm');
    }

    public function SignIn()
    {
        return view('user/signIn');
    }

    public function confirm_info(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'UserNameの入力がありません',
            'email.required' => 'Emailの入力がありません',
            'password.required' => 'Passwordの入力がありません',
            'password.confirmed' => 'パスワードが一致しません',
        ]);

        session([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        return view('user.signUp_confirm', [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);
    }

    public function register(Request $request)
    {
        $userName = session('name');
        $email = session('email');

        // パスワードのハッシュ化
        $hashedPassword = Hash::make(session('password'));

        // ユーザーの作成・保存
        $user = new User();
        $user->name = $userName;
        $user->email = $email;
        $user->password = $hashedPassword;
        $user->save();
        
        $request->session()->flush();

        return redirect()->route('signIn');
    }


    public function login(Request $request)
    {
        $loginData = $request->only('email', 'password');

        if (!Auth::attempt($loginData)) {
            return redirect()->back()->withErrors([
                'email' => '認証に失敗しました。',
            ]);
        }

        return redirect()->intended('top');
    }

    
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('signUp');
    }

}
