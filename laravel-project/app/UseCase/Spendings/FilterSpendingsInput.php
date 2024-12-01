<?php

namespace App\UseCase\Spendings;

class FilterSpendingsInput
{
  private ?int $categoryId;
  private ?string $startDate;
  private ?string $endDate;

  public function __construct(?int $categoryId, ?string $startDate, ?string $endDate)
  {
    $this->categoryId = $categoryId;
    $this->startDate = $startDate;
    $this->endDate = $endDate;
  }

  public function getCategoryId(): ?int
  {
    return $this->categoryId;
  }

  public function getStartDate(): ?string
  {
    return $this->startDate;
  }

  public function getEndDate(): ?string
  {
    return $this->endDate;
  }
}
