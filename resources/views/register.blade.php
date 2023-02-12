<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>会員登録</title>
    </head>
    <body>
        <h1>会員登録</h1>
        <form action="{{ route('register.create') }}" method="post">
            {{ csrf_field() }}
            ユーザー名:<br>
            <input type="text" name="name">
            <br>
            メールアドレス:<br>
            <input type="email" name="email">
            <br>
            パスワード:<br>
            <input type="password" name="password">
            <br>
            パスワード（確認用）:<br>
            <input type="password" name="password_confirmation">
            <br>
            <button type="submit"> 送信 </button>
        </form>
    </body>
</html>        