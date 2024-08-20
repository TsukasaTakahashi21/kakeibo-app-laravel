<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー確認画面</title>
  <link rel="stylesheet" href="{{ asset('css/Common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/User.css') }}">
</head>
<body>
  <section class="user">
    <div class="user-container">
    <div class="section-title">
        <h1>登録内容の確認</h1>
      </div>
      <!-- エラーメッセージ -->
      @if ($errors->any())
      <div class="error-message">
        <ul>
          @foreach($errors ->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- 会員登録フォーム -->
        <form action="{{ route('register') }}" method="post" class="user-form">
          @csrf
          <div class="user-input-form">
            <label for="name">ユーザー名:</label>
            <input type="text" name="name" id="name" class="form-input" placeholder="UserName" value="{{ session('name') }}">
          </div>
          <div class="user-input-form">
            <label for="email">メールアドレス:</label>
            <input type="email" name="email" id="email" class="form-input" placeholder="Email" value="{{ session('email') }}">
          </div>
          <div class="user-input-form">
            <label for="password">パスワード:</label>
            <input type="password" name="password" id="password" class="form-input" placeholder="Password">
          </div>
          <button type="submit" class="form-button">送信</button>
          <div class="form-link">
            <a href="{{ route('signUp') }}" class="login-link">会員登録画面へ戻る</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>