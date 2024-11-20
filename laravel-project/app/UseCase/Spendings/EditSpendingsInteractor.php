<?php

namespace App\UseCase\Spendings;

use App\Models\spendings;
use App\UseCase\Spendings\EditSpendingsInput;

class EditSpendingsInteractor
{
  public function handle(EditSpendingsInput $input)
  {
    $spending = spendings::findOrFail($input->getSpendingId());

    $spending->fill([
      'name' => $input->getSpendingName()->getValue(),
      'category_id' => $input->getCategoryId(),
      'amount' => $input->getAmount()->getValue(),
      'accrual_date' => $input->getDate(),
    ]);

    $spending->save();
  }
}
