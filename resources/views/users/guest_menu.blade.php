
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メニュー画面ゲスト</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="guestmenutop">

    <h1>menu</h1>

   
    @foreach($guest_menu as $guest_menu)
        <form action="{{ route('guest_index') }}"  method = "post">
        @csrf
        <button type="submit" name="title" value="{{ $guest_menu['title'] }}">{{ $guest_menu -> title }}</button><br>
    @endforeach

    </form>
   
</div>



</body>
</html>