
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーアカウント編集画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
    <div class="account_edittop">

        <h1>登録情報の編集</h1>

        <form action="{{ route('account_confirm') }}" method = "post">
        @csrf 

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            <input  type="text"  name="name" id="text1" placeholder="新しいユーザーネーム" value="{{ old('name') }}" ><br> 

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            <input  type="text"  name="email" id="text1" placeholder="新しいメールアドレス" value="{{ old('email') }}" ><br> 
            
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            <input  type="password"  name="password" id="text1" placeholder="新しいパスワード" value="{{ old('password') }}" ><br> 
            
            @error('password_error')
            <div class="error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            <input  type="password"  name="password2" id="text1" placeholder="新しいパスワード再入力" value="" ><br> 

            <div class="button5">
               <button>確認</button>　
            </div>

        </form>
    
    </div>


</body>
</html>