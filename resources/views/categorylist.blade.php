<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カテゴリー一覧</title>
    </head>
    <body>
        <h1>カテゴリー一覧</h1>
        @foreach($blogs as $blog)
            <div>
                <p>{{$blog->title}}</p>
            </div>
        @endforeach
    </body>
</html>        