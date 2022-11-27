
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー新規登録完了画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="completetop">

    <h1>登録が完了しました。</h1>

    <form action="{{ route('edit_index') }}" method = "post">
    @csrf
        <input  type="hidden"  name="name" id="text1" placeholder="ユーザーネーム" value="{{ $_POST['name'] }}" >
        <input  type="hidden"  name="email" id="text1" placeholder="メールアドレス" value="{{ $_POST['email'] }}" > 
        <input  type="hidden"  name="password" id="text1" placeholder="パスワード" value="{{ $_POST['password'] }}" >

        <div class="button4">
            <button>STAGEを作る</button>
        </div>
    </form>
   
</div>


</body>
</html>