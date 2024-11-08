<?php

namespace App\UseCase\Categories;

use App\ValueObject\CategoryName;

class CreateCategoryInput
{
  private int $userId;
  private CategoryName $categoryName;

  public function __construct(CategoryName $categoryName, int $userId)
  {
    $this->categoryName = $categoryName;
    $this->userId = $userId;
  }

  public function getCategoryName(): CategoryName
  {
    return $this->categoryName;
  }

  public function getUserId(): int
  {
    return $this->userId;
  }
}
