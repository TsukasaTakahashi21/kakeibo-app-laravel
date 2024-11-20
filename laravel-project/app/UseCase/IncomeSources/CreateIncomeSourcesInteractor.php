<?php

namespace App\UseCase\IncomeSources;

use App\UseCase\IncomeSources\CreateIncomeSourcesInput;
use App\Models\IncomeSource;

class CreateIncomeSourcesInteractor
{
  public function handle(CreateIncomeSourcesInput $input): void
  {
    IncomeSource::create([
      'name' => $input->getIncomeSource()->getValue(),
      'user_id' => $input->getUserId()
  ]);
  }
}
