<?php
namespace App\UseCase\Spendings;

use App\ValueObject\Amount;
use App\ValueObject\SpendingName;

use App\Models\spendings;
use App\UseCase\Spendings\Edit_Spendings_Input;

class Edit_Spendings_Interactor
{
  public function handle(Edit_Spendings_Input $input)
  {
    $spending = spendings::findOrFail($input->getSpendingId());
    $spending->name = $input->getSpendingName()->getvalue();
    $spending->category_id = $input->getCategoryId();
    $spending->amount = $input->getAmount()->getvalue();
    $spending->accrual_date = $input->getDate();
    $spending->save();
  }
}