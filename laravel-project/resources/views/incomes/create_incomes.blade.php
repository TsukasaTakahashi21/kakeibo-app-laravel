<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入登録</title>
</head>
<body>
  @include('header')
  <section class="create-income_source">
    <div class="section-title">
      <h1>収入登録</h1>
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

    <form action="{{ route('incomes.store') }}" method="post">
      @csrf
      <label for="income_source">収入源 :</label>
      <select name="income_source" id="income_source">
        <option value="">選択してください</option>
          @foreach($incomeSources as $incomeSource)
            <option value="{{ $incomeSource->id }}">{{ $incomeSource->name }}</option>
          @endforeach
      </select>
      <a href="{{ route('income_sources') }}">収入源一覧へ</a>
      <label for="amount">金額 :</label>
      <input type="text" name="amount" id="amount" class="input-form">円

      <label for="date">日付 :</label>
      <input type="date" name="date" id="date" class="input-form">

      <button type="submit" class="button">登録</button>
      <a href="{{ route('incomes') }}">戻る</a>
    </form>
  </section>
</body>
</html>