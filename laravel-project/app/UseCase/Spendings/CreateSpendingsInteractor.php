<?php

namespace App\UseCase\Spendings;

use App\Models\spendings;
use App\UseCase\Spendings\CreateSpendingsInput;

class CreateSpendingsInteractor
{
  public function handle(CreateSpendingsInput $input)
  {
    Spendings::create([
      'name' => $input->getSpendingName()->getValue(),
      'category_id' => $input->getCategoryId(),
      'amount' => $input->getAmount()->getValue(),
      'accrual_date' => $input->getDate(),
      'user_id' => $input->getUserId(),
    ]);
  }
}
