<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カテゴリー追加</title>
    </head>
    <body>
        <h1>カテゴリー追加</h1>
        <form action="{{ route('category.create') }}" method="post">
            {{ csrf_field() }}
            カテゴリー名:
            <div>
            <input type="text" name="name" value="">
            </div>
            slug:
            <div>
            <input type="text" name="slug" value="">
            </div>
            <button class="btn btn-success"> 送信 </button>
        </form>
    </body>
</html>        