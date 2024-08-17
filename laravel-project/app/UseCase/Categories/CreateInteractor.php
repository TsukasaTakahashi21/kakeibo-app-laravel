<?php
namespace App\UseCase\Categories;

use App\UseCase\Categories\CreateInput;
use App\Models\categories;

class CreateInteractor
{
  public function handle(CreateInput $input)
  {
    $category = new Categories();
    $category->name = $input->getCategoryName();
    $category->user_id = $input->getUserId();
    $category->save();
  }
}