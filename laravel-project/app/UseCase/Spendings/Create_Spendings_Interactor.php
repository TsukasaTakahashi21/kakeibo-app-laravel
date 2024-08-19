<?php
namespace App\UseCase\Spendings;

use App\Models\spendings;
use App\UseCase\Spendings\Create_Spendings_Input;
use App\ValueObject\Amount;
use App\ValueObject\SpendingName;

class Create_Spendings_Interactor
{
  public function handle(Create_Spendings_Input $input)
  {
    $spending = new spendings();
    $spending->name = $input->getSpendingName()->getvalue();
    $spending->category_id = $input->getCategoryId();
    $spending->amount = $input->getAmount()->getvalue();
    $spending->accrual_date = $input->getDate();
    $spending->user_id = $input->getUserId();
    $spending->save();
  }
}