<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    {{-- フラッシュメッセージ --}}
        {{-- ユーザー名変更 --}}
        @if (session('successMessageUserName'))
        <div class="alert alert-success text-center">
            {{ session('successMessageUserName') }}
        </div> 
        @endif
        {{-- パスワード変更 --}}
        @if (session('successMessagePassword'))
        <div class="alert alert-success text-center">
            {{ session('successMessagePassword') }}
        </div> 
        @endif
    {{-- フラッシュメッセージ終わり --}}
    <h1>Blog CRUD</h1>
    <a href="{{ route('blog.create') }}" class="btn"> ブログを登録する </a>
    <a href="{{ route('logout') }}" class="btn"> ログアウトする </a>
    <h1>全投稿一覧</h1>
        @foreach($blogs as $blog)
            <div>
                <p>{{$blog->title}} - {{$blog->body}}</p>
            </div>
        @endforeach
</body>
</html>