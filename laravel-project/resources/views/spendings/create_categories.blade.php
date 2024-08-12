<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>支出源追加</title>
</head>
<body>
  @include('header')
  <section class="create-categories">
    <div class="section-title">
      <h1>カテゴリ追加</h1>
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

    <form action="{{ route('categories.store') }}" method="post">
      @csrf
      <label for="category_name">カテゴリ名 :</label>
      <input type="text" name="category_name" id="category_name" placeholder="カテゴリ名を入力" class="input-form">
      <button type="submit" class="button">登録</button>
      <a href="{{ route('index') }}">戻る</a>
    </form>
  </section>
</body>
</html>