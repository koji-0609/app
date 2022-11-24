
<?php
use App\Http\Controllers\PostController;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メニュー画面ユーザー</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>

    
<div class="menutop">

    <h1>menu</h1>

    
    @foreach($index_menu as $index_menu)
        <form action="{{ route('index') }}"  method = "post">
            @csrf
            <button type="submit" name="title" value="{{ $index_menu['title'] }}">{{ $index_menu -> title }}</button><br>
        </form>
    @endforeach

        <form action="{{ route('user_create_index') }}" method = "post">
            @csrf
            <button>STAGEの作成</button>
        </form>
   
</div>


</body>
</html>