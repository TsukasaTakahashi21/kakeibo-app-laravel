<?php

namespace App\UseCase\Categories;

use App\UseCase\Categories\CreateCategoryInput;
use App\Models\Categories;

class CreateCategoryInteractor
{
  public function handle(CreateCategoryInput $input)
  {
    $category = new Categories();
    $category->name = $input->getCategoryName()->getValue();
    $category->user_id = $input->getUserId();
    $category->save();
  }
}