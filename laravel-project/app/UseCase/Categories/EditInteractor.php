<?php
namespace App\UseCase\Categories;

use App\UseCase\Categories\EditInput;
use App\Models\categories;

class EditInteractor 
{
  public function handle(EditInput $input)
  {
    $category = Categories::findOrFail($input->getId());
    $category->name = $input->getCategoryName();
    $category->save();
  }
}