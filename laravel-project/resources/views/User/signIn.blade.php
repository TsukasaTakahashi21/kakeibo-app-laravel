<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
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
            <input type="email" name="email" id="email" class="form-input" placeholder="Email" >
          </div>
          <div class="user-input-form">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="form-input" placeholder="Password">
          </div>
          <button type="submit" class="form-button">ログイン</button>
          <div class="form-link">
            <a href="{{ route('signUp') }}">アカウントを作る</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>