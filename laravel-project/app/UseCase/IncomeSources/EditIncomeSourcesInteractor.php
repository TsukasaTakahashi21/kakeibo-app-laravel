<?php
namespace App\UseCase\IncomeSources;

use App\UseCase\IncomeSources\EditIncomeSourcesInput;
use App\Models\IncomeSource;

class EditIncomeSourcesInteractor
{
  public function handle(EditIncomeSourcesInput $input): void
  {
    $incomeSource = IncomeSource::findOrFail($input->getId());

    $incomeSource->name = $input->getIncomeSource()->getValue();

    $incomeSource->save();
  }
}