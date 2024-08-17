<?php
namespace App\UseCase\Incomes;

use App\UseCase\Incomes\FilterInput;
use App\Models\Incomes;
use Illuminate\Support\Facades\Auth;

class FilterInteractor
{
  public function handle(FilterInput $input)
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