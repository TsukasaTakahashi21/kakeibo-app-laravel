<?php

namespace App\UseCase\Incomes;

use App\UseCase\Incomes\FilterIncomesInput;
use App\Models\Incomes;
use Illuminate\Support\Facades\Auth;

class FilterIncomesInteractor
{
  public function handle(FilterIncomesInput $input)
  {
    $query = Incomes::where('user_id', Auth::id());

    if ($input->getIncomeSourceId()) {
      $query->where('income_source_id', $input->getIncomeSourceId());
    }

    $startDate = $input->getStartDate();
    $endDate = $input->getEndDate();

    if ($startDate && $endDate) {
      $query->whereBetween('accrual_date', [$startDate, $endDate]);
    } elseif ($startDate) {
      $query->where('accrual_date', '>=', $startDate);
    } elseif ($endDate) {
      $query->where('accrual_date', '<=', $endDate);
    }

    return $query->get();
  }
}
