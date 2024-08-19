<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeSource; 
use Illuminate\Support\Facades\Auth;

use App\UseCase\Income_Sources\Create_Income_Sources_Input;
use App\UseCase\Income_Sources\Create_Income_Sources_Interactor;
use App\UseCase\Income_Sources\delete_Income_Sources_Interactor;
use App\UseCase\Income_Sources\Edit_Income_Sources_Input;
use App\UseCase\Income_Sources\Edit_Income_Sources_Interactor;

class IncomeSourcesController extends Controller
{
    public function income_sources()
    {
        // ログインユーザーに関連する収入源を取得
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();

        return view('incomes.income_sources', compact('incomeSources'));
    }

    public function show_create_income_sources()
    {
        return view('incomes.create_income_sources');
    }

    public function show_edit_income_sources($id)
    {
        $incomeSource = IncomeSource::findOrFail($id);
        return view('incomes.edit_income_sources', compact('incomeSource'));
    }



    // 収入源の追加
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'income_source' => 'required|string|max:50',
        ], [
            'income_source.required' => '収入源が入力されていません',
        ]);

        $userId = Auth::id();

        $input = new Create_Income_Sources_Input($validatedData['income_source'], $userId);
        $interactor = new Create_Income_Sources_Interactor();
        $interactor->handle($input);

        return redirect()->route('income_sources');
    }


    // 収入源の編集
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'income_source' => 'required|string|max:50',
        ], [
            'income_source.required' => '収入源が入力されていません',
        ]);

        $input = new Edit_Income_Sources_Input($id, $validatedData['income_source']);
        $interactor = new Edit_Income_Sources_Interactor();
        $interactor->handle($input);

        return redirect()->route('income_sources');
    }

    // 収入源の削除
    public function destroy($id)
    {
        $interactor = new delete_Income_Sources_Interactor();
        $interactor->handle($id);

        return redirect()->route('income_sources');
    }
}
