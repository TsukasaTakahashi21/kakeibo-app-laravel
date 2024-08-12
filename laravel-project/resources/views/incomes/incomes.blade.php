<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入一覧</title>
</head>
<body>
  @include('header')
  <section class="incomeSources-top">
    <div class="section-title">
      <h1>収入</h1>
    </div>
    <div class="amount">
      <p class="total-amount">合計額: {{ number_format($incomes->sum('amount')) }}円</p>

    </div>
    <div class="link">
      <a href="{{ route('show_create_incomes') }}">収入を登録する</a>
    </div>
    <div class="filter">
      <form action="{{ route('incomes') }}" method="get">
        @csrf
        <label for="income_source">収入源:</label>
        <select name="income_source" id="income_source">
          <option value="">選択してください</option>
            @foreach($incomeSources as $incomeSource)
              <option value="{{ $incomeSource->id }}">{{ $incomeSource->name }}</option>
            @endforeach
        </select>
        
        <label for="start-date">日付:</label>
        <input type="date" name="start-date" id="start-date">

        <label for="end-date">〜</label>
        <input type="date" name="end-date" id="end-date">

        <button type="submit" class="button">検索</button>
      </form>
    </div>

    <div class="result-table">
      <table class="kakeibo-table" border="1">
        <thead>
          <tr class="table-header">
            <th>収入名</th>
            <th>金額</th>
            <th>日付</th>
            <th>編集</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($incomes as $income)
            <tr class="table-row">
              <td class="table-cell">{{ $income->incomeSource->name }}</td>
              <td class="table-cell">{{ $income->amount }}</td>
              <td class="table-cell">{{ $income->accrual_date }}</td>
              <td class="table-cell"><a href="{{ route('incomes.edit', $income->id) }}">編集</a></td>
              <td class="table-cell">
                <form action="{{ route('incomes.destroy', $income->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="button">削除</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href="">戻る</a>
    </div>
  </section>
</body>
</html>