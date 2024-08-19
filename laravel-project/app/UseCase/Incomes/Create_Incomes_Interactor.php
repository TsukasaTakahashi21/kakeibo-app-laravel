<?php
namespace App\UseCase\Incomes;

use App\UseCase\Incomes\Create_incomes_Input;
use App\Models\Incomes;

class Create_incomes_Interactor
{
  public function handle(Create_incomes_Input $input)
  {
    $income = new Incomes();
    $income->income_source_id = $input->getIncomeSourceId();
    $income->amount = $input->getAmount();
    $income->accrual_date = $input->getDate();
    $income->user_id = $input->getUserId();
    $income->save();
  }
}