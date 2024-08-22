<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入源追加</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
  @include('header')
  <section class="form-container">
    <div class="section-title">
      <h1>収入源追加</h1>
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

    <form action="{{ route('income_sources.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="income_source">収入源 :</label>
        <input type="text" name="income_source" id="income_source" class="form-input" placeholder="収入源を入力">
      </div>
      <button type="submit" class="form-button">登録</button>
    </form>
  </section>
</body>
</html>
