<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IncomeRequest;
use App\Models\Incomes;
use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Incomes\CreateIncomesInput;
use App\UseCase\Incomes\CreateIncomesInteractor;
use App\UseCase\Incomes\EditIncomesInput;
use App\UseCase\Incomes\EditIncomesInteractor;
use App\UseCase\Incomes\DeleteIncomesInteractor;
use App\UseCase\Incomes\FilterIncomesInput;
use App\UseCase\Incomes\FilterIncomesInteractor;
use App\ValueObject\Amount;
use App\ValueObject\IncomeSourceName;

class incomesController extends Controller
{
    private $createIncomesInteractor;
    private $editIncomesInteractor;
    private $deleteIncomesInteractor;
    private $filterIncomesInteractor;

    public function __construct(CreateIncomesInteractor $createIncomesInteractor, EditIncomesInteractor $editIncomesInteractor, DeleteIncomesInteractor $deleteIncomesInteractor, FilterIncomesInteractor $filterIncomesInteractor)
    {
        $this->createIncomesInteractor = $createIncomesInteractor;
        $this->editIncomesInteractor = $editIncomesInteractor;
        $this->deleteIncomesInteractor = $deleteIncomesInteractor;
        $this->filterIncomesInteractor = $filterIncomesInteractor;
    }

    public function incomes(Request $request)
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();

        $input = new FilterIncomesInput(
            $request->input('income_source'),
            $request->input('start-date'),
            $request->input('end-date')
        );

        $incomes = $this->filterIncomesInteractor->handle($input);

        return view('incomes.incomes', compact('incomes', 'incomeSources'));
    }

    public function show_create_incomes()
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();
        return view('incomes.create_incomes', compact('incomeSources'));
    }

    public function store(IncomeRequest $request)
    {
        $userId = Auth::id();

        $input = new CreateIncomesInput(
            new IncomeSourceName($request->income_source),
            new Amount($request->amount),
            $request->date,
            $userId
        );

        $this->createIncomesInteractor->handle($input);

        return redirect()->route('incomes');
    }

    public function show_edit_incomes(int $id)
    {
        $income = Incomes::findOrFail($id);
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();
        return view('incomes.edit_incomes', compact('income', 'incomeSources'));
    }

    public function update(IncomeRequest $request, int $id)
    {
        $input = new EditIncomesInput(
            $id,
            new IncomeSourceName($request->income_source),
            new Amount($request->amount),
            $request->date,
        );

        $this->editIncomesInteractor->handle($input);

        return redirect()->route('incomes');
    }

    public function destroy(int $id)
    {
        $this->deleteIncomesInteractor->handle($id);

        return redirect()->route('incomes');
    }
}
