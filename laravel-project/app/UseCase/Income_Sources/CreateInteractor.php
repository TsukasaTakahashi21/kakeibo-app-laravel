<?php
namespace App\UseCase\Income_Sources;

use App\UseCase\Income_Sources\CreateInput;
use App\Models\IncomeSource;

class CreateInteractor
{
  public function handle(CreateInput $input)
  {
    $incomeSource = new IncomeSource();
    $incomeSource->name = $input->getIncomeSource();
    $incomeSource->user_id = $input->getUserId();
    $incomeSource->save();
  }
}