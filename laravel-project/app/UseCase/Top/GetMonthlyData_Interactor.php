<?php
namespace App\UseCase\Top;

use App\UseCase\Top\GetMonthlyData_Input;
use Illuminate\Support\Facades\DB;

class GetMonthlyData_Interactor
{
  public function handle(GetMonthlyData_Input $input)
  {
    $userId = $input->getUserId();
    $year = $input->getYear();

     // 収入と支出を月ごとに集計
    $results = DB::table('incomes')
    ->selectRaw('MONTH(accrual_date) as month, SUM(amount) as income, 0 as spending')
    ->whereYear('accrual_date', $year)
    ->where('user_id', $userId)
    ->groupBy(DB::raw('MONTH(accrual_date)'))
    ->union(
      DB::table('spendings')
        ->selectRaw('MONTH(accrual_date) as month, 0 as income, SUM(amount) as spending')
        ->whereYear('accrual_date', $year)
        ->where('user_id', $userId)
        ->groupBy(DB::raw('MONTH(accrual_date)'))
    )
    ->get()
     // 集計したデータを月ごとに整理
    ->groupBy('month')
    ->map(function ($monthData) {
      $income = $monthData->sum('income');
      $spending = $monthData->sum('spending');
      return [
        'income' => $income,
        'spending' => $spending,
        'balance' => $income - $spending,
      ];
    });
    
    // 月の収入、支出、バランスのデータを持つコレクションを生成
    return collect(range(1, 12))->mapWithKeys(function ($month) use ($results) {
      return [
        $month => $results->get($month, [
          'income' => 0,
          'spending' => 0,
          'balance' => 0,
        ])
      ];
    })->toArray();
  }
} 