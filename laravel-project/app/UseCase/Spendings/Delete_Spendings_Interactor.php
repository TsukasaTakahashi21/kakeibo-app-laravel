<?php
namespace App\UseCase\Spendings;

use App\Models\spendings;
use Illuminate\Support\Facades\Auth;

class Delete_Spendings_Interactor
{
  public function handle($id)
  {
    $spending = Spendings::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

    $spending->delete();
  }
}