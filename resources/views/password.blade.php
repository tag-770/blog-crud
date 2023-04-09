<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>パスワード変更</title>
</head>
<body>
    <h1>パスワード変更</h1>
    <form action="" method="post">
        {{ csrf_field() }}
        現在のパスワード:
        <div>
            <input type="password" name="current_password" value="">
        </div>
        新パスワード:
        <div>
            <input type="password" name="new_password" value="">
        </div>
        新パスワード（確認用）:
        <div>
            <input type="password" name="new_password_confirmation">
        </div>
        <button type="submit"> 変更 </button>
    </form>
</body>
</html>        