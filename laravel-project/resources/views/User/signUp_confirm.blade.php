<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー確認画面</title>
</head>
<body>
  <section class="user">
    <div class="user-container">
      <p class="user-confirm-message">こちらの内容で登録してよろしいですか</p>
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
            <input type="text" name="name" id="name" class="user-input" placeholder="UserName" value="{{ session('name') }}">
          </div>
          <div class="user-input-form">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" class="user-input" placeholder="Email" value="{{ session('email') }}">
          </div>
          <div class="user-input-form">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" class="user-input" placeholder="Password">
          </div>
          <div class="form-button">
            <button type="submit" class="submit-button">送信</button>
          </div>
          <div class="form-link">
            <a href="{{ route('signUp') }}" class="login-link">会員登録画面へ戻る</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>