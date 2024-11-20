<?php
namespace App\UseCase\Categories;

use App\UseCase\Categories\Edit_Categories_Input;
use App\Models\categories;
use App\ValueObject\CategoryName;

class Edit_Categories_Interactor 
{
  public function handle(Edit_Categories_Input $input)
  {
    $category = Categories::findOrFail($input->getId());
    $category->name = $input->getCategoryName()->getValue();
    $category->save();
  }
}