<?php
namespace App\UseCase\Spendings;

class Edit_Spendings_Input
{
  private int $spendingId;
  private string $spendingName;
  private int $categoryId;
  private string $amount;
  private string $date;
  private int $userId;

  public function __construct(int $spendingId, string $spendingName, int $categoryId, string $amount, string $date,  int $userId)
  {
    $this->spendingId = $spendingId;
    $this->spendingName = $spendingName;
    $this->categoryId = $categoryId;
    $this->amount = $amount;
    $this->date = $date;
    $this->userId = $userId;
  }

  public function getSpendingName(): string
    {
      return $this->spendingName;
    }

    public function getCategoryId(): int
    {
      return $this->categoryId;
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

    public function getSpendingId(): int
    {
      return $this->spendingId;
    }
}