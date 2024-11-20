<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeSourceRequest;
use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;

use App\UseCase\IncomeSources\CreateIncomeSourcesInput;
use App\UseCase\IncomeSources\CreateIncomeSourcesInteractor;
use App\UseCase\IncomeSources\deleteIncomeSourcesInteractor;
use App\UseCase\IncomeSources\EditIncomeSourcesInput;
use App\UseCase\IncomeSources\EditIncomeSourcesInteractor;
use App\ValueObject\IncomeSourceName;

class IncomeSourcesController extends Controller
{
    private $createIncomeSourcesInteractor;
    private $editIncomeSourcesInteractor;
    private $deleteIncomeSourcesInteractor;

    public function __construct(CreateIncomeSourcesInteractor $createIncomeSourcesInteractor, EditIncomeSourcesInteractor $editIncomeSourcesInteractor, DeleteIncomeSourcesInteractor $deleteIncomeSourcesInteractor)
    {
        $this->createIncomeSourcesInteractor = $createIncomeSourcesInteractor;
        $this->editIncomeSourcesInteractor = $editIncomeSourcesInteractor;
        $this->deleteIncomeSourcesInteractor = $deleteIncomeSourcesInteractor;
    }

    public function income_sources()
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();

        return view('incomes.income_sources', compact('incomeSources'));
    }

    public function show_create_income_sources()
    {
        return view('incomes.create_income_sources');
    }

    public function show_edit_income_sources(int $id)
    {
        $incomeSource = IncomeSource::findOrFail($id);
        return view('incomes.edit_income_sources', compact('incomeSource'));
    }

    // 収入源の追加
    public function store(IncomeSourceRequest $request)
    {
        $userId = Auth::id();

        $incomeSourceName = new IncomeSourceName($request->income_source);
        $input = new CreateIncomeSourcesInput($incomeSourceName, $userId);

        $this->createIncomeSourcesInteractor->handle($input);

        return redirect()->route('income_sources');
    }

    // 収入源の編集
    public function update(IncomeSourceRequest $request, int $id)
    {
        $incomeSourceName = new IncomeSourceName($request->income_source);
        $input = new EditIncomeSourcesInput($id, $incomeSourceName);

        $this->editIncomeSourcesInteractor->handle($input);

        return redirect()->route('income_sources');
    }

    // 収入源の削除
    public function destroy(int $id)
    {
        $this->deleteIncomeSourcesInteractor->handle($id);

        return redirect()->route('income_sources');
    }
}
