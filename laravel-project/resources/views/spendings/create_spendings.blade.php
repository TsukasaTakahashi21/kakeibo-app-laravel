<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>支出登録</title>
</head>
<body>
  @include('header')
  <section class="create-spendings">
    <div class="section-title">
      <h1>支出登録</h1>
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

    <form action="{{ route('spendings.store') }}" method="post">
      @csrf
      <label for="spending_name">支出名 :</label>
      <input type="text" name="spending_name" id="spending_name" class="input-form" placeholder="支出名">
      <label for="category_name">カテゴリー :</label>
      <select name="category_name" id="category_name">
        <option value="">選択してください</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
      </select>
      <a href="{{ route('index') }}">カテゴリー一覧へ</a>
      <label for="amount">金額 :</label>
      <input type="text" name="amount" id="amount" class="input-form" placeholder="金額">円

      <label for="date">日付 :</label>
      <input type="date" name="date" id="date" class="input-form">

      <button type="submit" class="button">登録</button>
      <a href="{{ route('spendings.index') }}">戻る</a>
    </form>
  </section>
</body>
</html>