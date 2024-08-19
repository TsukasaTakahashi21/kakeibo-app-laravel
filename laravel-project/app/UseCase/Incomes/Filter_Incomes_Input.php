<?php
namespace App\UseCase\Incomes;

class Filter_incomes_Input
{
  private ?int $incomeSourceId;
  private ?string $startDate;
  private ?string $endDate;

  public function __construct(?int $incomeSourceId, ?string $startDate, ?string $endDate)
  {
    $this->incomeSourceId = $incomeSourceId;
    $this->startDate = $startDate;
    $this->endDate = $endDate;
  }

  public function getIncomeSourceId(): ?int
  {
    return $this->incomeSourceId;
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