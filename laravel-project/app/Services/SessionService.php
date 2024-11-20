<?php

namespace App\Services;

class SessionService
{
  public function saveUserInfo($name, $email, $password)
  {
    session([
      'name' => $name,
      'email' => $email,
      'password' => $password,
    ]);
  }

  public function getUserInfo()
  {
    return [
      'name' => session('name'),
      'email' => session('email'),
      'password' => session('password'),
    ];
  }

  public function clearUserInfo()
  {
    session()->forget(['name', 'email', 'password']);
  }
}