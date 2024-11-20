<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ヘッダー</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">

</head>
<body>
  <header class="header">
    <div class="inner">
      <div class="nav">
        <ul class="nav-list">
          <li><a href="{{ route('top') }}">HOME</a></li>
          <li><a href="{{ route('incomes') }}">収入TOP</a></li>
          <li><a href="{{ route('spendings.index') }}">支出TOP</a></li>
          <li><a href="{{ route('logout') }}" class="logout-link">ログアウト</a></li>
        </ul>
      </div>
    </div>
  </header>
</body>
</html>