<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

use App\UseCase\User\SignUpInput;
use App\UseCase\User\SignUpInteractor;
use App\UseCase\User\SignInInput;
use App\UseCase\User\SignInInteractor;

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
            'email' => 'required|string|email|max:50',
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
        if (!session()->has(['name', 'email'])) {
            return redirect()->route('signUp')->withErrors([
                'register_error' => '会員登録情報が無効です。再度入力してください。'
            ]);
        }

        try {
            $input = new SignUpInput(
                session('name'),
                session('email'),
                session('password'),
            );
    
            $interactor = new SignUpInteractor();
            $interactor->handle($input);
    
            $request->session()->flush();
    
            return redirect()->route('signIn');
        } catch (\Exception $e) {
            return redirect()->route('signUp_confirm')->withErrors(['register_error' => $e->getMessage()]);  
        }
    }


    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'メールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
        ]);

        $input = new SignInInput(
            $validatedData['email'],
            $validatedData['password'],
        );

        $interactor = new SignInInteractor();
        if (!$interactor->handle($input)) {
            return redirect()->route('signUp')->withErrors([
                'login_error' => 'メールアドレスまたはパスワードが違います'
            ])->withInput();
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
