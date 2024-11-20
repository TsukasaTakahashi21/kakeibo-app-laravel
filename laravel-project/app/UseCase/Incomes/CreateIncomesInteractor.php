<?php

namespace App\UseCase\Incomes;

use App\UseCase\Incomes\CreateIncomesInput;
use App\Models\Incomes;

class CreateIncomesInteractor
{
  public function handle(CreateIncomesInput $input): void
  {
    Incomes::create([
      'income_source_id' => $input->getIncomeSourceId(),
      'amount' => $input->getAmount()->getValue(),
      'accrual_date' => $input->getDate(),
      'user_id' => $input->getUserId(),
    ]);
  }
}
