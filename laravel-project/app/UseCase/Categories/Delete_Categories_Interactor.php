<?php
namespace App\UseCase\Categories;

use App\Models\categories;
use Illuminate\Support\Facades\Auth;

class Delete_Categories_Interactor
{
  public function handle($id)
  {
    $category = Categories::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();
                          
    $category->delete();
  }
}