<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>Home</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style2.css">
    </head>
    <body class="bg-light pt-5">
        <div class="vh-200 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center">
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
                        <a href="{{ route('blog.index') }}" class="btn"> ブログ一覧 </a>
                        <a href="{{ route('logout') }}" class="btn"> ログアウトする </a>
                        <h1 class="pt-5 pb-5">全投稿一覧</h1>
                        <div class="bg-white rounded">
                            @foreach($blogs_latest as $blog_latest)
                                <div class="pt-2 border-bottom">
                                    <p>{{$blog_latest->title}} - {{$blog_latest->body}}</p>
                                </div>
                            @endforeach   
                        </div> 
                    </div>
                </div>
            </div>
        </div>        
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>        