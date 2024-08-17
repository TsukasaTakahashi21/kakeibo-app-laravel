<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;

use App\UseCase\Incomes\CreateInput;
use App\UseCase\Incomes\CreateInteractor;
use App\UseCase\Incomes\EditInput;
use App\UseCase\Incomes\EditInteractor;
use App\UseCase\Incomes\DeleteInteractor;
use App\UseCase\Incomes\FilterInput;
use App\UseCase\Incomes\FilterInteractor;


class incomesController extends Controller
{
    public function incomes(Request $request)
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();

        $input = new FilterInput(
            $request->input('income_source'),
            $request->input('start-date'),
            $request->input('end-date')
        );

        $interactor = new FilterInteractor();
        $incomes = $interactor->handle($input);

        return view('incomes.incomes', compact('incomes', 'incomeSources'));
    }

    public function show_create_incomes()
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();
        return view('incomes.create_incomes', compact('incomeSources'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'income_source' => 'required|exists:income_sources,id',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ], [
            'income_source.required' => '収入源が選択されていません',
            'income_source.exists' => '選択された収入源が存在しません',
            'amount.required' => '金額が入力されていません',
            'date.required' => '日付が入力されていません',
        ]);

        $userId = Auth::id();

        $input = new CreateInput(
            $validatedData['income_source'],
            $validatedData['amount'],
            $validatedData['date'],
            $userId
        );

        $interactor = new CreateInteractor();
        $interactor->handle($input);

        return redirect()->route('incomes');
    }


    public function show_edit_incomes($id)
    {
        $income = Incomes::findOrFail($id);
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();
        return view('incomes.edit_incomes', compact('income', 'incomeSources'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'income_source' => 'required|exists:income_sources,id',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ], [
            'income_source.required' => '収入源が入力されていません',
            'amount.required' => '金額が入力されていません',
            'date.required' => '日付が入力されていません',
        ]);

        $input = new EditInput(
            $id,
            $validatedData['income_source'],
            $validatedData['amount'],
            $validatedData['date'],
        );

        $interactor = new EditInteractor();
        $interactor->handle($input);

        return redirect()->route('incomes');
    }

    public function destroy($id)
    {
        $interactor = new deleteInteractor;
        $interactor->handle($id);

        return redirect()->route('incomes');
    }
}
