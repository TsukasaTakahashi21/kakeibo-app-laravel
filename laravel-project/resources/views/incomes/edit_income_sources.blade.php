<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入源編集</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
  @include('header')
  <section class="form-container">
    <div class="section-title">
      <h1>収入源編集</h1>
    </div>

    <form action="{{ route('income_sources.update', $incomeSource->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="income_source">収入源 :</label>
        <input type="text" name="income_source" id="income_source" class="form-input" value="{{ $incomeSource->name }}">
      </div>
      <button type="submit" class="form-button">更新</button>
    </form>
  </section>
</body>
</html>
