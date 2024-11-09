<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpendingRequest;
use Illuminate\Http\Request;
use App\Models\spendings;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Spendings\CreateSpendingsInput;
use App\UseCase\Spendings\CreateSpendingsInteractor;
use App\UseCase\Spendings\EditSpendingsInput;
use App\UseCase\Spendings\EditSpendingsInteractor;
use App\UseCase\Spendings\DeleteSpendingsInteractor;
use App\UseCase\Spendings\FilterSpendingsInput;
use App\UseCase\Spendings\FilterSpendingsInteractor;
use App\ValueObject\SpendingName;
use App\ValueObject\Amount;

class SpendingsController extends Controller
{
    private $createSpendingsInteractor;
    private $editSpendingsInteractor;
    private $deleteSpendingsInteractor;
    private $filterSpendingInteractor;

    public function __construct(CreateSpendingsInteractor $createSpendingsInteractor, EditSpendingsInteractor $editSpendingsInteractor, DeleteSpendingsInteractor $deleteSpendingsInteractor, FilterSpendingsInteractor $filterSpendingInteractor)
    {
        $this->createSpendingsInteractor = $createSpendingsInteractor;
        $this->editSpendingsInteractor = $editSpendingsInteractor;
        $this->deleteSpendingsInteractor = $deleteSpendingsInteractor;
        $this->filterSpendingInteractor = $filterSpendingInteractor;
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        $input = new FilterSpendingsInput(
            $request->input('category'),
            $request->input('start-date'),
            $request->input('end-date')
        );

        $spendings = $this->filterSpendingInteractor->handle($input);

        $categories = Categories::where('user_id', $userId)->get();

        return view('spendings.spendings', compact('spendings', 'categories'));
    }

    public function create()
    {
        $categories = Categories::where('user_id', Auth::id())->get();
        return view('spendings.create_spendings', compact('categories'));
    }

    public function store(SpendingRequest $request)
    {
        $userId = Auth::id();
        $spendingName = new SpendingName($request->spending_name);
        $amount = new Amount($request->amount);

        $input = new CreateSpendingsInput(
            $spendingName,
            $request->category_name,
            $amount,
            $request->date,
            $userId
        );

        $this->createSpendingsInteractor->handle($input);

        return redirect()->route('spendings.index');
    }

    public function edit(int $id)
    {
        $userId = Auth::id();
        $spending = Spendings::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $categories = Categories::where('user_id', Auth::id())->get();

        return view('spendings.edit_spendings', compact('spending', 'categories'));
    }

    public function update(SpendingRequest $request, int $id)
    {
        $userId = Auth::id();

        $spendingName = new SpendingName($request->spending_name);
        $amount = new Amount($request->amount);

        $input = new EditSpendingsInput(
            $id,
            $spendingName,
            $request->category_name,
            $amount,
            $request->date,
            $userId
        );

        $this->editSpendingsInteractor->handle($input);

        return redirect()->route('spendings.index');
    }

    public function destroy(int $id)
    {
        $this->deleteSpendingsInteractor->handle($id);

        return redirect()->route('spendings.index');
    }
}
