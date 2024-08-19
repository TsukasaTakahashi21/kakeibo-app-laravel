<?php
namespace App\UseCase\User;

use App\UseCase\user\signInInput;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class signInInteractor
{
  public function handle(signInInput $input)
  {
    $loginData = [
      'email' => $input->getEmail(),
      'password' => $input->getPassword(),
    ];

    if (!Auth::attempt($loginData)) {
      return false;
    }

    return true;

  }
}