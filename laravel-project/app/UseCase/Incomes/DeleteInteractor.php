<?php
namespace App\UseCase\Incomes;

use App\Models\Incomes;
use Illuminate\Support\Facades\Auth;

class DeleteInteractor
{
  public function handle(int $id)
  {
    $income = Incomes::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();
    
    $income->delete();
  }
}