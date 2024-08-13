<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入編集</title>
</head>
<body>
  @include('header')
  <section class="edit-incomes">
    <div class="section-title">
      <h1>収入編集</h1>
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

    <form action="{{ route('incomes.update', $income->id) }}" method="post">
      @csrf
      @method('PUT')

      <label for="income_source">収入源 :</label>
      <select name="income_source" id="income_source">
        <option value="">選択してください</option>
          @foreach($incomeSources as $incomeSource)
            <option value="{{ $incomeSource->id }}" {{ $incomeSource->id == $income->income_source_id ? 'selected' : '' }}>
              {{ $incomeSource->name }}
            </option>
          @endforeach
      </select>

      <label for="amount">金額 :</label>
      <input type="text" name="amount" id="amount" class="input-form" value="{{ old('amount', $income->amount) }}">円


      <label for="date">日付 :</label>
      <input type="date" name="date" id="date" class="input-form" value="{{ old('date', $income->accrual_date) }}">

      <button type="submit" class="button">編集</button>
    </form>
  </section>
</body>
</html>