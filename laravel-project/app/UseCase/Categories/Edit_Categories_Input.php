<?php
namespace App\UseCase\Categories;

use App\ValueObject\CategoryName;


class Edit_Categories_Input
{
  private CategoryName $categoryName;
  private int $id;
  

  public function __construct(CategoryName $categoryName, int $id)
  {
    $this->categoryName = $categoryName;
    $this->id = $id;
  }

  public function getCategoryName(): CategoryName
  {
    return $this->categoryName;
  }

  public function getId(): int 
  {
    return $this->id;
  }
}