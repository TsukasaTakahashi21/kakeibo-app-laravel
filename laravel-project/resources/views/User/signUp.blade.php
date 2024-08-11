<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会員登録</title>
</head>
<body>
  <section class="user">
    <div class="user-container">
      <div class="section-title">
        <h1>会員登録</h1>
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
        <form action="{{ route('confirm_info') }}" method="post" class="user-form">
          @csrf
          <div class="user-input-form">
            <label for="name"></label>
            <input type="text" name="name" id="name" class="user-input" placeholder="UserName" value="{{ old('name') }}">
          </div>
          <div class="user-input-form">
            <label for="email"></label>
            <input type="email" name="email" id="email" class="user-input" placeholder="Email">
          </div>
          <div class="user-input-form">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="user-input" placeholder="Password">
          </div>
          <div class="user-input-form">
            <label for="password_confirmation"></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="user-input" placeholder="Password確認">
          </div>
          <div class="form-button">
            <button type="submit" class="submit-button">アカウント作成</button>
          </div>
          <div class="form-link">
            <a href="{{ route('signIn') }}" class="login-link">ログイン画面へ</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>