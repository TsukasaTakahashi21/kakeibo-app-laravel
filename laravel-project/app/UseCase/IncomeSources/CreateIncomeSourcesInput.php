<?php
namespace App\UseCase\IncomeSources;

use App\ValueObject\IncomeSourceName;

class CreateIncomeSourcesInput
{
  private IncomeSourceName $incomeSource;
  private int $userId;

  public function __construct(IncomeSourceName $incomeSource, int $userId)
  {
    $this->incomeSource = $incomeSource;
    $this->userId = $userId;
  }

  public function getIncomeSource(): IncomeSourceName
  {
    return $this->incomeSource;
  }

  public function getUserId(): int
  {
    return $this->userId;
  }
}