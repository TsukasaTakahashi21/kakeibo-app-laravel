<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カテゴリー追加</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
  @include('header')
  <section class="form-container">
    <div class="section-title">
      <h1>支出源追加</h1>
    </div>
    <!-- エラーメッセージ -->
    @if ($errors->any())
      <div class="error-message">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('categories.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="category_name">支出源 :</label>
        <input type="text" name="category_name" id="category_name" class="form-input" placeholder="支出源を入力">
      </div>
      <button type="submit" class="form-button">登録</button>
    </form>
  </section>
</body>
</html>
