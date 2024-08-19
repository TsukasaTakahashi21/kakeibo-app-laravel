<?php
namespace App\UseCase\Incomes;

use App\ValueObject\Amount;

class Create_incomes_Input
{
  private string $incomeSourceId;
  private Amount $amount;
  private string $date;
  private int $userId;

  public function __construct(string $incomeSourceId, Amount $amount, string $date, int $userId)
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

  public function getAmount(): Amount
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