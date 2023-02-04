<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>会員登録</title>
    </head>
    <body>
        <h1>会員登録</h1>
        <form action="" method="post">
            {{ csrf_field() }}
            ユーザー名:<br>
            <input name="username">
            <br>
            メールアドレス:<br>
            <input name="email">
            <br>
            パスワード:<br>
            <input name="password">
            <br>
            パスワード（確認用）:<br>
            <input name="password">
            <br>
            <button class="btn btn-success"> 送信 </button>
        </form>
    </body>
</html>        