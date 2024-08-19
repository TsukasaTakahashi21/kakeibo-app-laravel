<?php
namespace App\UseCase\Incomes;

class Edit_incomes_Input
{
  private int $id;
  private string $incomeSourceId;
  private string $amount;
  private string $date;

  public function __construct(int $id, string $incomeSourceId, string $amount, string $date)
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

  public function getAmount(): string
  {
    return $this->amount;
  }

  public function getDate(): string
  {
    return $this->date;
  }

}