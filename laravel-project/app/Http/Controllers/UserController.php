<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmInfoRequest;
use App\Http\Requests\LoginRequest;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UseCase\User\SignUpInput;
use App\UseCase\User\SignUpInteractor;
use App\UseCase\User\SignInInput;
use App\UseCase\User\SignInInteractor;

class UserController extends Controller
{
    private $sessionService;
    private $signUpInteractor;
    private $signInInteractor;

    public function __construct(SessionService $sessionService, SignUpInteractor $signUpInteractor, SignInInteractor $signInInteractor)
    {
        $this->sessionService = $sessionService;
        $this->signUpInteractor = $signUpInteractor;
        $this->signInInteractor = $signInInteractor;
    }

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

    public function confirm_info(ConfirmInfoRequest $request)
    {
        $this->sessionService->saveUserInfo($request->name,  $request->email, $request->password);

        return view('user.signUp_confirm', [
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function register()
    {
        $userName = $this->sessionService->getUserInfo()['name'];
        $userEmail = $this->sessionService->getUserInfo()['email'];

        if (!$userName || !$userEmail) {
            return redirect()->route('signUp')->withErrors([
                'register_error' => '会員登録情報が無効です。再度入力してください。'
            ]);
        }

        try {
            $userInfo = $this->sessionService->getUserInfo();
            $input = new SignUpInput(
                $userInfo['name'], 
                $userInfo['email'], 
                $userInfo['password']
            );
    
            $this->signUpInteractor->handle($input);
            $this->sessionService->clearUserInfo();
    
            return redirect()->route('signIn');
        } catch (\Exception $e) {
            return redirect()->route('signUp_confirm')->withErrors(['register_error' => $e->getMessage()]);  
        }
    }

    public function login(LoginRequest $request)
    {
        $input = new SignInInput(
            $request->input('email'),
            $request->input('password'),
        );

        if (!$this->signInInteractor->handle($input)) {
            return redirect()->route('signUp')->withErrors([
                'login_error' => 'メールアドレスまたはパスワードが違います'
            ])->withInput();
        }

        return redirect()->intended('top');
    }

    public function logout()
    {
        Auth::logout();
        $this->sessionService->clearUserInfo();
        return redirect()->route('signUp');
    }
}
