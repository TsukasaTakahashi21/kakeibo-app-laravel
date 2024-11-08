<?php

namespace App\UseCase\Categories;

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class DeleteCategoryInteractor
{
  public function handle($id)
  {
    $category = Categories::where('id', $id)
      ->where('user_id', Auth::id())
      ->firstOrFail();
    $category->delete();
  }
}
