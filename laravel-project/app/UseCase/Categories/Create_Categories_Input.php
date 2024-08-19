<?php
namespace App\UseCase\Categories;

class Create_Categories_Input
{
  private int $userId;
  private string $categoryName;
  

  public function __construct(string $categoryName, int $userId)
  {
    $this->categoryName = $categoryName;
    $this->userId = $userId;
  }

  public function getCategoryName(): string
  {
    return $this->categoryName;
  }

  public function getUserId(): int 
  {
    return $this->userId;
  }
}