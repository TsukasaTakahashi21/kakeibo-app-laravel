<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>収入源編集</title>
</head>
<body>
  @include('header')
  <section class="edit-income_source">
    <div class="section-title">
      <h1>編集</h1>
    </div>

    <form action="{{ route('income_sources.update', $incomeSource->id) }}" method="post">
      @csrf
      @method('PUT')
      <label for="income_source">収入源 :</label>
      <input type="text" name="income_source" id="income_source" class="input-form" value="{{ $incomeSource->name }}"><br>
      <button type="submit" class="button">更新</button>
    </form>
  </section>
</body>
</html>