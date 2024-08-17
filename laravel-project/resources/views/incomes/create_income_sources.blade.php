<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入源追加</title>
</head>
<body>
  @include('header')
  <section class="create-income_sources">
    <div class="section-title">
      <h1>収入源追加</h1>
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

    <form action="{{ route('income_sources.store') }}" method="post">
      @csrf
      <label for="income_source">収入源 :</label>
      <input type="text" name="income_source" id="income_source" placeholder="収入源を入力" class="input-form">
      <button type="submit" class="button">登録</button>
      <a href="{{ route('index') }}">戻る</a>
    </form>
  </section>
</body>
</html>