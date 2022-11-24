
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーアカウント削除画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="deletetop">

    <h1>アカウントの削除</h1>

    <form action="{{ route('delete_complete') }}" method = "post">
    @csrf
        <h3>ユーザーネーム</h3>
        <div class="input">{{ Auth::user() -> name }}</div>

        <h3>メールアドレス</h3>
        <div class="input">{{ Auth::user() -> email }}</div>
       
        <div class="button6">
            <button>削除する</button>
        </div>
    </form>
   
</div>


</body>
</html>