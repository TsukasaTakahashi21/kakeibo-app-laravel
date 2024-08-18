<?php
namespace App\UseCase\Spendings;

use App\UseCase\Spendings\Filter_Spendings_Input;
use App\Models\spendings;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;

class Filter_Spendings_Interactor
{
  public function handle(Filter_Spendings_Input $input)
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