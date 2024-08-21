<?php
namespace App\UseCase\Income_Sources;

use App\UseCase\Income_Sources\Create_Income_Sources_Input;
use App\Models\IncomeSource;
use App\ValueObject\IncomeSourceName;

class Create_Income_Sources_Interactor
{
  public function handle(Create_Income_Sources_Input $input)
  {
    $incomeSource = new IncomeSource();
    $incomeSource->name = $input->getIncomeSource()->getValue();
    $incomeSource->user_id = $input->getUserId();
    $incomeSource->save();
  }
}