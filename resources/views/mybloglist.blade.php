<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Myブログ一覧</title>
    </head>
    <body>
        <h1>Myブログ一覧</h1>
        @if (!$myblogs->isEmpty())
            @foreach($myblogs as $myblog)
                <div>
                    <p>{{$myblog->title}}</p>
                </div>
            @endforeach
        @else
             ブログはありません
        @endif
    </body>
</html>        