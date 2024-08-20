<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>家計簿アプリ</title>
  <link rel="stylesheet" href="{{ asset('css/Common.css') }}">
</head>
<body>
  @include('header')
  <section class="kakeibo-top">
    <div class="section-title">
      <h1>家計簿アプリ</h1>
    </div>
    <div class="year-search">
      <form action="{{ route('top') }}" method="get">
        <select name="year" id="year" class="year-select">
          @foreach ($years as $year)
          <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
              {{ $year }}
            </option>
          @endforeach
        </select>
        <label for="year">年の収支一覧</label>
        <button type="submit" class="submit-button">検索</button>
      </form>
    </div>

    <div class="result-table">
      <table class="kakeibo-table" border="1">
        <thead>
          <tr class="table-header">
            <th>月</th>
            <th>収入</th>
            <th>支出</th>
            <th>収支</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($monthlyData as $month => $monthData)
            <tr class="table-row">
              <td class="table-cell">{{ $month }}月</td>
              <td class="table-cell">{{ $monthData['income'] }} 円</td>
              <td class="table-cell">{{ $monthData['spending'] }} 円</td>
              <td class="table-cell">{{ $monthData['balance'] }} 円</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</body>
</html>