<?php

namespace App\UseCase\IncomeSources;

use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;

class DeleteIncomeSourcesInteractor
{
  public function handle(int $id): void
  {
    $incomeSource = IncomeSource::where('id', $id)
      ->where('user_id', Auth::id())
      ->firstOrFail();

    $incomeSource->delete();
  }
}
