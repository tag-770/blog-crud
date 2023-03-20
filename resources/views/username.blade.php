<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー名変更</title>
</head>
<body>
    <h1>ユーザー名の変更</h1>
    <form action="{{ route('username.edit', ['name'=>$name]) }}" method="post">
        {{ csrf_field() }}
        ユーザー名:
        <div>
            <input type="text" name="name" value="{{ $name }}">
        </div>
        <button type="submit"> 変更 </button>
    </form>
</body>
</html>        