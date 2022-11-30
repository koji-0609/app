
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップ画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">

    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
@include('users.header')<br>
    
<div class="logintop">


    <h1>トップページ</h1>
    
    <form action="{{ route('login_menu') }}" method = "post">
    @csrf


        @error('login_error')
            <div class="error">{{ $message }}</div>
        @enderror

        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        <input  type="text"  name="email" id="text1" placeholder="メールアドレス" value="" ><br> 

        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
        <input  type="password"  name="password" id="text1" placeholder="パスワード" value="" ><br> 

        <div class="a">
            <a href="{{ route('password') }}">パスワードを忘れた方はこちら</a>
        </div>

        <div class="login_button">
            <button>ログイン</button>
        </div>

        <div class="a">
            <a href="{{ route('register') }}">新規アカウント作成</a><br>
        </div>
        <div class="a">
                <a href="{{ route('guest_menu') }}">ゲストとして利用</a><br><br><br>
        </div>

        </form>
   
</div>



</body>
</html>