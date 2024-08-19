<?php
namespace App\UseCase\Spendings;

use App\Models\spendings;
use App\UseCase\Spendings\Create_Spendings_Input;

class Create_Spendings_Interactor
{
  public function handle(Create_Spendings_Input $input)
  {
    $spending = new spendings();
    $spending->name = $input->getSpendingName();
    $spending->category_id = $input->getCategoryId();
    $spending->amount = $input->getAmount();
    $spending->accrual_date = $input->getDate();
    $spending->user_id = $input->getUserId();
    $spending->save();
  }
}