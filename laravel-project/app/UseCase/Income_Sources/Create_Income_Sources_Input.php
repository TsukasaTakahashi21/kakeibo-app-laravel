<?php
namespace App\UseCase\Income_Sources;

class Create_Income_Sources_Input
{
  private string $incomeSource;
  private int $userId;

  public function __construct(string $incomeSource, int $userId)
  {
    $this->incomeSource = $incomeSource;
    $this->userId = $userId;
  }

  public function getIncomeSource(): string
  {
    return $this->incomeSource;
  }

  public function getUserId(): int
  {
    return $this->userId;
  }
}