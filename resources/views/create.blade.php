<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>新規作成</title>
    </head>
    <body>
        <h1>ブログ新規作成</h1>
        <form action="{{ route('blog.create') }}" method="post">
            {{ csrf_field() }}
            タイトル:<br>
            <input name="title">
            <br>
            本文:<br>
            <textarea name="body" rows="4" cols="40"></textarea>
            <br>
            <button class="btn btn-success"> 送信 </button>
        </form>
    </body>
</html>        