
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー新規登録画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
@include('users.header')<br>

<div class="registertop">

    <h1>新規登録</h1>

    <form action="{{ route('confirm') }}" method = "post">
    @csrf

        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
    
        <input  type="text"  name="name" id="text1" placeholder="ユーザーネーム" value="{{ old('name') }}" ><br> 

        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror 
        <input  type="text"  name="email" id="text1" placeholder="メールアドレス" value="{{ old('email') }}" ><br> 

        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror 
        <input  type="text"  name="password" id="text1" placeholder="パスワード" value="{{ old('password') }}" ><br> 

        <button>確認</button>
       
    </form>
   
</div>


</body>
</html>