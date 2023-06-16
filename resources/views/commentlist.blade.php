<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>コメント一覧</title>
    </head>
    <body>
        <h1>コメント一覧</h1>
        @foreach($comments as $comment)
            <div>
                <p>{{$comment->body}} - {{$comment->created_at}}</p>
                <a href="{{ route('blog.show', ['id'=>$comment->blog->id]) }}">{{$comment->blog->title}}</a>
            </div>
        @endforeach
    </body>
</html>        