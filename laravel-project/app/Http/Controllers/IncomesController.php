<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;

class incomesController extends Controller
{
    public function incomes()
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())->get();
        $incomes = Incomes::where('user_id', Auth::id())->get();
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

        $income = new Incomes();
        $income->income_source_id = $validatedData['income_source'];
        $income->amount = $validatedData['amount'];
        $income->accrual_date = $validatedData['date'];
        $income->user_id = $userId;
        $income->save();

        return redirect()->route('incomes');
    }



    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
