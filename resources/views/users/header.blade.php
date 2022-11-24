
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ヘッダー</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
    <div class="header_top">
         
        <div class="logo">
           <a href="{{ route('login') }}">MOTI LOG</a> 
        </div>
        
        

        <nav id="g-nav">
        <div id="g-nav-list">
            <ul>

            @if (isset(Auth::user() -> name))
                <div class="name">
                    ＜ログインユーザー＞<br>
                 {{ Auth::user() -> name }}
                </div>
 
                <form action="{{ route('account_edit') }}" method = "post">
                    @csrf
                    <li><button>アカウントの編集</button></li> 
                </form> 

                <li><button><a href="{{ route('delete') }}">アカウントを削除</a></button></li>  
                
                <form action="{{ route('logout') }}" method = "post">
                @csrf
                    <li><button>ログアウト</button></li> 
                </form>
            @endif

                <li><button><a href="{{ route('register') }}">新規ユーザー登録</a></button></li>  

            </ul>
        </div>
        </nav>
        <div class="circle-bg"></div>

       
        <div class="logo2">
            <div class="openbtn">
                <div class="openbtn-area">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
  
    </div>


</body>

<script>

    $(".openbtn").click(function () {//ボタンがクリックされたら
  $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
    $(".circle-bg").toggleClass('circleactive');//丸背景にcircleactiveクラスを付与
});

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスを除去
    $(".circle-bg").removeClass('circleactive');//丸背景のcircleactiveクラスを除去
});
    
</script>

</html>