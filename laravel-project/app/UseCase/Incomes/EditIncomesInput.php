<?php

namespace App\UseCase\Incomes;

use App\ValueObject\Amount;

class EditIncomesInput
{
  private int $id;
  private string $incomeSourceId;
  private Amount $amount;
  private string $date;

  public function __construct(int $id, string $incomeSourceId, Amount $amount, string $date)
  {
    $this->incomeSourceId = $incomeSourceId;
    $this->amount = $amount;
    $this->date = $date;
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
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
}
