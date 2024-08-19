<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ヘッダー</title>
</head>
<body>
  <header class="header">
    <div class="nav">
      <ul class="nav-list">
        <li><a href="{{ route('top') }}">HOME</a></li>
        <li><a href="{{ route('incomes') }}">収入TOP</a></li>
        <li><a href="{{ route('spendings.index') }}">支出TOP</a></li>
        <form action="{{ route('logout') }}" method="post">
          @csrf 
          <button type="submit">ログアウト</button>
        </form>
      </ul>
    </div>
  </header>
</body>
</html>