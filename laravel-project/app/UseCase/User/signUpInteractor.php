<?php
namespace App\UseCase\User;

use App\UseCase\User\SignUpInput;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class SignUpInteractor
{
  public function handle(SignUpInput $input)
  {
    if (User::where('email', $input->getEmail())->exists()) {
      throw new \Exception('このメールアドレスはすでに登録されています。');
    }

    $hashedPassword = Hash::make($input->getPassword());

    $user = new User();
    $user->name = $input->getName();
    $user->email = $input->getEmail();
    $user->password = $hashedPassword;
    $user->save();

    return $user;
  }
}