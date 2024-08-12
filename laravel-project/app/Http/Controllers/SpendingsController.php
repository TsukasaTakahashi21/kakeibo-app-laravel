<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spendings;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;

class SpendingsController extends Controller
{
    
    public function index()
    {
        $spendings = Spendings::where('user_id', Auth::id())->get();
        $categories = Categories::all();
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
        $spendings = new Spendings();
        $spendings->name = $validatedData['spending_name'];
        $spendings->category_id = $validatedData['category_name'];
        $spendings->amount =  $validatedData['amount'];
        $spendings->accrual_date = $validatedData['date'];
        $spendings->user_id = $userId;
        $spendings->save();

        return redirect()->route('spendings.index');
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
