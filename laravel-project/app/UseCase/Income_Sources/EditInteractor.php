<?php
namespace App\UseCase\Income_Sources;

use App\UseCase\Income_Sources\EditInput;
use App\Models\IncomeSource;

class EditInteractor
{
  public function handle(EditInput $input)
  {
    $incomeSource = IncomeSource::findOrFail($input->getId());
    $incomeSource->name = $input->getIncomeSource();
    $incomeSource->save();
  }
}