<?php
namespace App\UseCase\Top;

class GetMonthlyData_Input
{
  private int $year;
  private int $userId;

  public function __construct(int $year, int $userId)
    {
      $this->year = $year;
      $this->userId = $userId;
    }

    public function getYear(): int
    {
      return $this->year;
    }

    public function getUserId(): int
    {
      return $this->userId;
    }
}