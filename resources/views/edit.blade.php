<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>編集</title>
</head>
<body>
    <h1>編集</h1>
    <form action="{{ route('blog.edit', ['id'=>$blog->id]) }}" method="post">
        {{ csrf_field() }}
        タイトル:<br>
        <input name="title" value="{{ $blog->title }}">
        <br>
        本文:<br>
        <textarea name="body" rows="4" cols="40">{{ $blog->body }}</textarea>
        <br>
        <button class="btn btn-success"> 更新 </button>
    </form>
</body>
</html>        