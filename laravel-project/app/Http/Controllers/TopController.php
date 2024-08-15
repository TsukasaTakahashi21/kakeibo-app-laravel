<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spendings;
use App\Models\Incomes;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{

    public function top(Request $request)
    {
        $currentYear = now()->year;
        $years = range($currentYear - 5, $currentYear + 5);
        $selectedYear = $request->input('year', $currentYear);

        $userId = Auth::id();

        $monthlyData = [];
        for ($month = 1; $month <= 12; $month++) {
            $income = Incomes::whereYear('accrual_date', $selectedYear)
                            ->whereMonth('accrual_date', $month)
                            ->where('user_id', Auth::id())
                            ->sum('amount');
                            
            $spending = Spendings::whereYear('accrual_date', $selectedYear)
                                ->whereMonth('accrual_date', $month)
                                ->where('user_id', Auth::id())
                                ->sum('amount');

            $monthlyData[$month] = [
                'income' => $income,
                'spending' => $spending,
                'balance' => $income - $spending,
            ];
        }

        return view('top', compact('years', 'selectedYear', 'monthlyData'));
    }  
}
