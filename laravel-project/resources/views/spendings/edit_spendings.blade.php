<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>支出編集</title>
</head>
<body>
  @include('header')
  <section class="edit-spendings">
    <div class="section-title">
      <h1>支出編集</h1>
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

    <form action="{{ route('spendings.update', $spending->id) }}" method="post">
      @csrf
      @method('PUT')

      <label for="spending_name">支出名 :</label>
      <input type="text" name="spending_name" id="spending_name" class="input-form" value="{{ old('spending_name', $spending->name) }}">

      <label for="category_name">カテゴリー :</label>
      <select name="category_name" id="category_name">
        <option value=""></option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $spending->category_id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
      </select>

      <label for="amount">金額 :</label>
      <input type="text" name="amount" id="amount" class="input-form" value="{{ old('amount', $spending->amount) }}">円


      <label for="date">日付 :</label>
      <input type="date" name="date" id="date" class="input-form" value="{{ old('date', $spending->accrual_date) }}">

      <button type="submit" class="button">編集</button>
    </form>
  </section>
</body>
</html>