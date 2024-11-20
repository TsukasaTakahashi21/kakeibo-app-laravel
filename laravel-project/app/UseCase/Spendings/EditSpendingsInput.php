<?php

namespace App\UseCase\Spendings;

use App\ValueObject\Amount;
use App\ValueObject\SpendingName;

class EditSpendingsInput
{
  private int $spendingId;
  private SpendingName $spendingName;
  private int $categoryId;
  private Amount $amount;
  private string $date;
  private int $userId;

  public function __construct(int $spendingId, SpendingName $spendingName, int $categoryId, Amount $amount, string $date,  int $userId)
  {
    $this->spendingId = $spendingId;
    $this->spendingName = $spendingName;
    $this->categoryId = $categoryId;
    $this->amount = $amount;
    $this->date = $date;
    $this->userId = $userId;
  }

  public function getSpendingName(): SpendingName
  {
    return $this->spendingName;
  }

  public function getCategoryId(): int
  {
    return $this->categoryId;
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

  public function getSpendingId(): int
  {
    return $this->spendingId;
  }
}