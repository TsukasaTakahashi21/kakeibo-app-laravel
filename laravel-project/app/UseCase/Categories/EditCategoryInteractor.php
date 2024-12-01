<?php

namespace App\UseCase\Categories;

use App\UseCase\Categories\EditCategoryInput;
use App\Models\categories;

class EditCategoryInteractor
{
  public function handle(EditCategoryInput $input)
  {
    $category = Categories::findOrFail($input->getId());
    $category->name = $input->getCategoryName()->getValue();
    $category->save();
  }
}
