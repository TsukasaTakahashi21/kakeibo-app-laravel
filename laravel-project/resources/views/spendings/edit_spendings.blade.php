<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>支出編集</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
  @include('header')
  <section class="form-container">
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

      <div class="form-group">
        <label for="spending_name">支出名 :</label>
        <input type="text" name="spending_name" id="spending_name" class="form-input" value="{{ old('spending_name', $spending->name) }}">
      </div>

      <div class="form-group">
        <label for="category_name">カテゴリー :</label>
        <select name="category_name" id="category_name" class="form-input">
          <option value=""></option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $category->id == $spending->category_id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
        </select>
      </div>
      
      <div class="form-group">
        <label for="amount">金額 :</label>
        <input type="text" name="amount" id="amount" class="form-input" value="{{ old('amount', $spending->amount) }}">
      </div>
    
      <div class="form-group">
        <label for="date">日付 :</label>
        <input type="date" name="date" id="date" class="form-input" value="{{ old('date', $spending->accrual_date) }}">
      </div>
      <button type="submit" class="form-button">編集</button>
    </form>
  </section>
</body>
</html>