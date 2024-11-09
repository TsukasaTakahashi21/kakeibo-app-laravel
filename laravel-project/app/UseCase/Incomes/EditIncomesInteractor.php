<?php

namespace App\UseCase\Incomes;

use App\UseCase\Incomes\EditIncomesInput;
use App\Models\Incomes;

class EditIncomesInteractor
{
  public function handle(EditIncomesInput $input): void
  {
    $income = Incomes::findOrFail($input->getId());

    $income->update([
      'income_source_id' => $input->getIncomeSourceId(),
      'amount' => $input->getAmount()->getValue(),
      'accrual_date' => $input->getDate(),
    ]);
  }
}
