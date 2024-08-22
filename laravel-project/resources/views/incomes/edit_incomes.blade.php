<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入編集</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
  @include('header')
  <section class="form-container">
    <div class="section-title">
      <h1>収入編集</h1>
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

    <form action="{{ route('incomes.update', $income->id) }}" method="post">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="income_source">収入源 :</label>
        <select name="income_source" id="income_source" class="form-input">
          <option value="">選択してください</option>
          @foreach($incomeSources as $incomeSource)
            <option value="{{ $incomeSource->id }}" {{ $incomeSource->id == $income->income_source_id ? 'selected' : '' }}>
              {{ $incomeSource->name }}
            </option>
          @endforeach
        </select>
        <a href="{{ route('income_sources') }}" class="form-link">収入源一覧へ</a>
      </div>

      <div class="form-group">
        <label for="amount">金額 :</label>
        <input type="text" name="amount" id="amount" class="form-input" value="{{ $income->amount }}">円
      </div>

      <div class="form-group">
        <label for="date">日付 :</label>
        <input type="date" name="date" id="date" class="form-input" value="{{ $income->date }}">
      </div>

      <button type="submit" class="form-button">更新</button>
    </form>
  </section>
</body>
</html>
