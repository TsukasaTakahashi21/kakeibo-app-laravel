<?php
namespace App\UseCase\Income_Sources;

use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;

class delete_Income_Sources_Interactor
{
  public function handle(int $id)
  {
    $incomeSource = IncomeSource::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();
    
    $incomeSource->delete();
  }
}