<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
</head>
<body>
  <section class="user">
    <div class="user-container">
      <div class="section-title">
        <h1>ログイン</h1>
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

      <!-- ログインフォーム -->
        <form action="{{ route('login') }}" method="post" class="user-form">
          @csrf
          <div class="user-input-form">
            <label for="email"></label>
            <input type="email" name="email" id="email" class="user-input" placeholder="Email" >
          </div>
          <div class="user-input-form">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="user-input" placeholder="Password">
          </div>
          <div class="form-button">
            <button type="submit" class="submit-button">ログイン</button>
          </div>
          <div class="form-link">
            <a href="{{ route('signUp') }}" class="login-link">アカウントを作る</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>