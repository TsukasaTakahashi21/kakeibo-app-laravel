<?php
namespace App\UseCase\Incomes;

use App\UseCase\Incomes\CreateInput;
use App\Models\Incomes;

class CreateInteractor
{
  public function handle(CreateInput $input)
  {
    $income = new Incomes();
    $income->income_source_id = $input->getIncomeSourceId();
    $income->amount = $input->getAmount();
    $income->accrual_date = $input->getDate();
    $income->user_id = $input->getUserId();
    $income->save();
  }
}