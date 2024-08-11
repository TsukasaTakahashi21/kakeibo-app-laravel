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
        <li><a href="">HOME</a></li>
        <li><a href="{{ route('income_sources') }}">収入TOP</a></li>
        <li><a href="">支出TOP</a></li>
        <li><a href="">ログアウト</a></li>
      </ul>
    </div>
  </header>
</body>
</html>