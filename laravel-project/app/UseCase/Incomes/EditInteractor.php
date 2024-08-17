<?php
namespace App\UseCase\Incomes;

use App\UseCase\Incomes\EditInput;
use App\Models\Incomes;

class EditInteractor
{
  public function handle(EditInput $input)
  {
    $income = Incomes::findOrFail($input->getId());
    $income->income_source_id = $input->getIncomeSourceId();
    $income->amount = $input->getAmount();
    $income->accrual_date = $input->getDate();
    $income->save();
  }
}