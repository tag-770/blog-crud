<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ブログ一覧</title>
    </head>
    <body>
        <h1>ブログ一覧</h1>
        @foreach($blogs as $blog)
            <div>
                <a href="{{ route('blog.show', ['id'=>$blog->id]) }}">{{$blog->title}}</a>
                <a>{{ Str::limit($blog->body, 15)}}</a>
                @foreach($blog_users as $blog_user)
                @if($blog->user_id == $blog_user->id)
                    <a>{{$blog_user->name}}</a>
                    @continue
                @endif
                @endforeach
            </div>
        @endforeach
    </body>
</html>        