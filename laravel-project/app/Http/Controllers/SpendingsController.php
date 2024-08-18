<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spendings;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Spendings\Create_Spendings_Input;
use App\UseCase\Spendings\Create_Spendings_Interactor;
use App\UseCase\Spendings\Edit_Spendings_Input;
use App\UseCase\Spendings\Edit_Spendings_Interactor;
use App\UseCase\Spendings\Delete_Spendings_Interactor;
use App\UseCase\Spendings\Filter_Spendings_Input;
use App\UseCase\Spendings\Filter_Spendings_Interactor;

class SpendingsController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $input = new Filter_Spendings_Input(
            $request->input('category'),
            $request->input('start-date'),
            $request->input('end-date')
        );

        $interactor = new Filter_Spendings_Interactor();
        $spendings = $interactor->handle($input);

        $categories = Categories::where('user_id', $userId)->get();
        
        return view('spendings.spendings', compact('spendings', 'categories'));
    }

    
    public function create()
    {
        $categories = Categories::where('user_id', Auth::id())->get();
        return view('spendings.create_spendings', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'spending_name' => 'required|string|max: 50',
            'category_name' => 'required|',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ], [
            'spending_name.required' => '支出名が入力されていません',
            'category_name.required' => 'カテゴリーが選択されていません',
            'amount.required' => '金額が入力されていません',
            'date.required' => '日付が入力されていません',
        ]);

        $userId = Auth::id();
        $input = new Create_Spendings_Input(
            $validatedData['spending_name'],
            $validatedData['category_name'],
            $validatedData['amount'],
            $validatedData['date'],
            $userId
        );

        $interactor = new Create_Spendings_Interactor();
        $interactor->handle($input);

        return redirect()->route('spendings.index');
    }


    public function edit($id)
    {
        $userId = Auth::id();
        $spending = Spendings::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $categories = Categories::where('user_id', Auth::id())->get();

        return view('spendings.edit_spendings', compact('spending', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'spending_name' => 'required|string|max: 50',
            'category_name' => 'required|',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ], [
            'spending_name.required' => '支出名が入力されていません',
            'category_name.required' => 'カテゴリーが選択されていません',
            'amount.required' => '金額が入力されていません',
            'date.required' => '日付が入力されていません',
        ]);

        $input = new Edit_Spendings_Input(
            $id,
            $validatedData['spending_name'],
            $validatedData['category_name'],
            $validatedData['amount'],
            $validatedData['date'],
            $userId
        );

        $interactor = new Edit_Spendings_Interactor();
        $interactor->handle($input);

        return redirect()->route('spendings.index');
    }


    public function destroy($id)
    {
        $interactor = new Delete_Spendings_Interactor();
        $interactor->handle($id);

        return redirect()->route('spendings.index');
    }
}
