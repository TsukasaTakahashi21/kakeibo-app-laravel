<?php
namespace App\UseCase\Income_Sources;

use App\UseCase\Income_Sources\Edit_Income_Sources_Input;
use App\Models\IncomeSource;

class Edit_Income_Sources_Interactor
{
  public function handle(Edit_Income_Sources_Input $input)
  {
    $incomeSource = IncomeSource::findOrFail($input->getId());
    $incomeSource->name = $input->getIncomeSource();
    $incomeSource->save();
  }
}