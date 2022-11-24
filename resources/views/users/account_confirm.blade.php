
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーアカウント編集確認画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="account_confirmtop">

    <h1>編集内容の確認</h1>

    <form action="{{ route('account_complete') }}" method = "post">
    @csrf   
            <input  type="hidden"  name="name" id="text1" placeholder="ユーザーネーム" value="{{ $_POST['name'] }}" >
            <input  type="hidden"  name="email" id="text1" placeholder="メールアドレス" value="{{ $_POST['email'] }}" >
            <input  type="hidden"  name="password" id="text1" placeholder="パスワード" value="{{ $_POST['password'] }}" >
        
        <h3>ユーザーネーム</h3>
        <div class="input">
            {{ $_POST['name'] }}
        </div>
        
        <h3>メールアドレス</h3>
        <div class="input">
            {{ $_POST['email'] }}
        </div>

        <h3>パスワード</h3>
        <div class="input">
            {{ $_POST['password'] }}
        </div>

        <div class="buttons">   
            <div class="button3">
                <button type="submit" name='submit' value="complete">登録</button>
            </div>
        </div> 

    </form>
   
</div>



</body>
</html>