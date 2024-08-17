<?php
namespace App\UseCase\Income_Sources;

class EditInput
{
  private string $incomeSource;
  private int $id;

  public function __construct(int $id,  string $incomeSource)
  {
    $this->incomeSource = $incomeSource;
    $this->id = $id;
  }

  public function getIncomeSource(): string
  {
    return $this->incomeSource;
  }

  public function getId(): int
  {
    return $this->id;
  }
}