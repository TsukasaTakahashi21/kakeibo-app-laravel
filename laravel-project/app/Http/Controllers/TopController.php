<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Top\GetMonthlyData_Input;
use App\UseCase\Top\GetMonthlyData_Interactor;

class TopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function top(Request $request, GetMonthlyData_Interactor $interactor)
    {
        $currentYear = now()->year;
        $years = range($currentYear - 5, $currentYear + 5);
        $selectedYear = $request->input('year', $currentYear);
        $userId = Auth::id();

        if (is_null($userId)) {
            return redirect()->route('login')->withErrors('セッションがタイムアウトしました。再度ログインしてください。');
        }

        $input = new GetMonthlyData_Input($selectedYear, $userId);
        $monthlyData = $interactor->handle($input);

        return view('top', compact('years', 'selectedYear', 'monthlyData'));
    }  
}
