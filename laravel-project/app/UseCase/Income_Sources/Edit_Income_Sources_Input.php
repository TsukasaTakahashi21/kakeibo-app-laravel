<?php
namespace App\UseCase\Income_Sources;

use App\ValueObject\IncomeSourceName;

class Edit_Income_Sources_Input
{
  private IncomeSourceName $incomeSource;
  private int $id;

  public function __construct(int $id,  IncomeSourceName $incomeSource)
  {
    $this->incomeSource = $incomeSource;
    $this->id = $id;
  }

  public function getIncomeSource(): IncomeSourceName
  {
    return $this->incomeSource;
  }

  public function getId(): int
  {
    return $this->id;
  }
}