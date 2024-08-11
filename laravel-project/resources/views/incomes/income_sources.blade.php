<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入源一覧</title>
</head>
<body>
  @include('header')
  <section class="incomeSources-top">
    <div class="section-title">
      <h1>収入源一覧</h1>
    </div>
    <div class="link">
      <a href="{{ route('show_create_income_sources') }}">収入源を追加する</a>
    </div>

    <div class="result-table">
      <table class="kakeibo-table" border="1">
        <thead>
          <tr class="table-header">
            <th>収入源</th>
            <th>編集</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($incomeSources as $incomeSource)
            <tr class="table-row">
              <td class="table-cell">{{ $incomeSource->name }}</td>
              <td class="table-cell"><a href="{{ route('show_edit_income_sources', $incomeSource->id) }}">編集</a></td>
              <td class="table-cell">
                <form action="{{ route('income_sources.destroy', $incomeSource->id) }}" method="post">
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