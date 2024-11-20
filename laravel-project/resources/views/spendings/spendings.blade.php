<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>支出一覧</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common-financial.css') }}">
</head>
<body>
  @include('header')
  <section class="financial-top">
    <div class="section-title">
      <h1>支出</h1>
    </div>
    <div class="amount">
      <p class="total-amount">合計額: {{ number_format($spendings->sum('amount')) }}円</p>
    </div>
    <div class="link">
      <a href="{{ route('spendings.create') }}">支出を登録する</a>
    </div>
    <div class="filter">
      <form action="{{ route('spendings.index') }}" method="get">
        @csrf
        <label for="category">カテゴリ:</label>
        <select name="category" id="category">
          <option value="">選択してください</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        <label for="start-date">日付:</label>
        <input type="date" name="start-date" id="start-date">

        <label for="end-date">〜</label>
        <input type="date" name="end-date" id="end-date">

        <button type="submit" class="submit-button">検索</button>
      </form>
    </div>

    <div class="result-table">
      <table class="financial-table" border="1">
        <thead>
          <tr class="table-header">
            <th>支出名</th>
            <th>カテゴリ</th>
            <th>金額</th>
            <th>日付</th>
            <th>編集</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($spendings as $spending)
            <tr class="table-row">
              <td class="table-cell">{{ $spending->name }}</td>
              <td class="table-cell">{{ $spending->category->name }}</td>
              <td class="table-cell">{{ $spending->amount }}</td>
              <td class="table-cell">{{ $spending->accrual_date }}</td>
              <td class="table-cell"><a href="{{ route('spendings.edit', $spending->id) }}" class="edit-link">編集</a></td>
              <td class="table-cell">
                <form action="{{ route('spendings.destroy', $spending->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="delete-link">削除</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</body>
</html>
