<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン</title>
    </head>
    <body>
        <div>  
            @if ($errors->any())  
                <ul>  
                    @foreach ($errors->all() as $error)  
                        <li>{{ $error }}</li>  
                    @endforeach  
                </ul>  
            @endif  
        </div>
        <h1>ログイン</h1>
        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            メールアドレス:
            <div>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>
            パスワード:
            <div>
                <input type="password" name="password">
            </div>
            <button type="submit"> 送信 </button>
        </form>
    </body>
</html>        