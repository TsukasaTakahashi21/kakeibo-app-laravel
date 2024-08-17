<?php
namespace App\UseCase\Incomes;

class CreateInput
{
  private string $incomeSourceId;
  private string $amount;
  private string $date;
  private int $userId;

  public function __construct(string $incomeSourceId, string $amount, string $date, int $userId)
  {
    $this->incomeSourceId = $incomeSourceId;
    $this->amount = $amount;
    $this->date = $date;
    $this->userId = $userId;
  }

  public function getIncomeSourceId(): string
  {
    return $this->incomeSourceId;
  }

  public function getAmount(): string
  {
    return $this->amount;
  }

  public function getDate(): string
  {
    return $this->date;
  }

  public function getUserId(): int
    {
        return $this->userId;
    }
}