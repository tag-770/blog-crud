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
        <form action="{{ route('blog.destroy', ['id'=>$blog->id]) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">削除する</button>
        </form>
        <form action="{{ route('blog.edit', ['id'=>$blog->id]) }}" method="GET">
          @csrf
          <button type="submit" class="btn btn-danger">編集する</button>
        </form>
        <form action="{{ route('comment.create', ['id'=>$blog->id]) }}" method="GET">
          @csrf
          <button type="submit" class="btn btn-danger">コメントする</button>
        </form>
        </div>
    </body>
</html>        