<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カテゴリー編集</title>
</head>
<body>
  @include('header')
  <section class="edit-categories">
    <div class="section-title">
      <h1>編集</h1>
    </div>

    <form action="{{ route('categories.update', $category->id) }}" method="post">
      @csrf
      @method('PUT')
      <label for="category_name">カテゴリ名 :</label>
      <input type="text" name="category_name" id="category_name" class="input-form" value="{{ $category->name }}">
      <button type="submit" class="button">更新</button>
      <a href="{{ route('index') }}">戻る</a>
    </form>
  </section>
</body>
</html>