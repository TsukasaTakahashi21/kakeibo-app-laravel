<?php

namespace App\UseCase\Spendings;

use App\UseCase\Spendings\FilterSpendingsInput;
use App\Models\spendings;
use Illuminate\Support\Facades\Auth;

class FilterSpendingsInteractor
{
  public function handle(FilterSpendingsInput $input)
  {
    $query = Spendings::where('user_id', Auth::id());

    if ($input->getCategoryId()) {
      $query->where('category_id', $input->getCategoryId());
    }

    if ($input->getStartDate() && $input->getEndDate()) {
      $query->whereBetween('accrual_date', [$input->getStartDate(), $input->getEndDate()]);
    } elseif ($input->getStartDate()) {
      $query->where('accrual_date', '>=', $input->getStartDate());
    } elseif ($input->getEndDate()) {
      $query->where('accrual_date', '<=', $input->getEndDate());
    }

    return $query->get();
  }
}
