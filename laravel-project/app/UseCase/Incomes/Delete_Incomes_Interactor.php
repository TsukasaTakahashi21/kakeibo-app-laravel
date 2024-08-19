<?php
namespace App\UseCase\Incomes;

use App\Models\Incomes;
use Illuminate\Support\Facades\Auth;

class Delete_incomes_Interactor
{
  public function handle(int $id)
  {
    $income = Incomes::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();
    
    $income->delete();
  }
}