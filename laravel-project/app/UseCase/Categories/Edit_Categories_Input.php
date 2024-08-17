<?php
namespace App\UseCase\Categories;

class Edit_Categories_Input
{
  private string $categoryName;
  private int $id;
  

  public function __construct(string $categoryName, int $id)
  {
    $this->categoryName = $categoryName;
    $this->id = $id;
  }

  public function getCategoryName(): string
  {
    return $this->categoryName;
  }

  public function getId(): int 
  {
    return $this->id;
  }
}