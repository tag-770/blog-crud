<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>コメント作成</title>
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
        <h1>コメント作成</h1>
        <form action="{{ route('comment.create', ['id'=>$blog->id]) }}" method="post">
            {{ csrf_field() }}
            {{$blog->title}}にコメントする:<br>
            <textarea name="body" rows="4" cols="40"></textarea>
            <br>
            <button class="btn btn-success"> 送信 </button>
        </form>
    </body>
</html>        