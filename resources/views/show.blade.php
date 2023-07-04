<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ブログ詳細画面</title>
    </head>
    <body>
        <h1>ブログ詳細</h1>
        <div>
            <p>{{$blog->title}} - {{$blog->body}} - {{$blog->created_at}}</p>
        </div>
        @auth
        @if (Auth::id() === $blog->user_id)          
          @csrf
        <form action="{{ route('blog.destroy', ['id'=>$blog->id]) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">削除する</button>
        </form>
        <form action="{{ route('blog.edit', ['id'=>$blog->id]) }}" method="GET">
          @csrf
          <button type="submit" class="btn btn-danger">編集する</button>
        </form>
        @endif
        @endauth
        <form action="{{ route('comment.create', ['id'=>$blog->id]) }}" method="GET">
          @csrf
          <button type="submit" class="btn btn-danger">コメントする</button>
        </form>
        <form action="{{ route('blog.index')}}" method="GET">
          @csrf
          <button type="submit" class="btn btn-danger">ブログ一覧へ</button>
        </form>
        </div>
        <h1>コメント一覧</h1>
        @foreach($comments as $comment)
            <div>
                <a>{{$comment->body}} - {{$comment->created_at}}</a>
                @foreach($comment_users as $comment_user)
                @if($comment->user_id == $comment_user->id)
                    <a>{{$comment_user->name}}</a>
                    @continue
                @endif
                @endforeach
            </div>
        @endforeach
    </body>
</html>        