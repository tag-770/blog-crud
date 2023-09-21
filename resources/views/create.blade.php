<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>新規作成</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style2.css">
    </head>
    <body class="bg-light pt-5">
        <div class="vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center">
                    <div>
            <div>  
                @if ($errors->any())  
                    <ul>  
                        @foreach ($errors->all() as $error)  
                            <li>{{ $error }}</li>  
                        @endforeach  
                    </ul>  
                @endif  
            </div>
            <h2 class="pb-5">ブログ新規作成</h2>
            <form action="{{ route('blog.create') }}" method="post">
                {{ csrf_field() }}
                <input name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                <br>
                <textarea name="body" rows="4" cols="40"  class="form-control" placeholder="Text">{{ old('body') }}</textarea>
                <br>
                <select name="category_id" class="form-control">
                    <option disabled selected>カテゴリーを選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success bg-secondary border-secondary form-control"> 送信 </button>
            </form>
        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>        