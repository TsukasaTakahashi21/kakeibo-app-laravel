<?php
namespace App\UseCase\User;

use Illuminate\Support\Facades\Auth;

class SignInInteractor
{
  public function handle(signInInput $input)
  {
    return Auth::attempt([
      'email' => $input->getEmail(),
      'password' => $input->getPassword(),
    ]);
  }
}