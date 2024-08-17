<?php
namespace App\UseCase\Income_Sources;

class CreateInput
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