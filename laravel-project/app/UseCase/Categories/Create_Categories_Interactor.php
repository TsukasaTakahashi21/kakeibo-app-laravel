<?php
namespace App\UseCase\Categories;

use App\UseCase\Categories\Create_Categories_Input;
use App\Models\categories;

class Create_Categories_Interactor
{
  public function handle(Create_Categories_Input $input)
  {
    $category = new Categories();
    $category->name = $input->getCategoryName();
    $category->user_id = $input->getUserId();
    $category->save();
  }
}