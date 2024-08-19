<?php
namespace App\UseCase\Incomes;

use App\UseCase\Incomes\Edit_incomes_Input;
use App\Models\Incomes;
use App\ValueObject\Amount;

class Edit_incomes_Interactor
{
  public function handle(Edit_incomes_Input $input)
  {
    $income = Incomes::findOrFail($input->getId());
    $income->income_source_id = $input->getIncomeSourceId();
    $income->amount = $input->getAmount()->getValue();
    $income->accrual_date = $input->getDate();
    $income->save();
  }
}