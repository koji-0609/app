
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コンテンツ作成・編集確認画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="edit_confirmtop">

    <h1>STAGE内容の確認</h1>

    <!-- ③-2 ログイン中のユーザーがSTAGE編集する際の処理 -->
    @if (!isset($array_count))
        <form action="{{ route('edit_complete') }}" method = "post">
        @csrf 

            <input  type="hidden"  name="contents_id_count" id="text1" placeholder="コンテンツID" value="{{ $contents_id_count }}" > 
            <input  type="hidden"  name="title" id="text1" placeholder="タイトル" value="{{ $_POST['title'] }}" >
            @for ($a = 1; $a <= $contents_id_count; $a++) 
                <input  type="hidden"  name="contents_id{{$a}}" id="text1" placeholder="コンテンツID" value="{{ $_POST['contents_id'.$a] }}" > 
            @endfor 

            @for ($a = 1; $a <= $contents_count; $a++) 
                <input  type="hidden"  name="contents{{$a}}" id="text1" placeholder="コンテンツ" value="{{ $_POST['contents'.$a] }}" > 
            @endfor   
            <input  type="hidden"  name="gole" id="text1" placeholder="ゴール" value="{{ $_POST['gole'] }}" >


            <h3>タイトル</h3>
            <div class="input">
                {{ $_POST['title'] }}
            </div>

            <h3>短期目標(ステップ)</h3>
            @for ($a = 1; $a <= $contents_count; $a++) 
                <div class="input">{{ $_POST['contents'.$a] }}</div>
            @endfor

            <h3>長期目標(ゴール)</h3>
            <div class="input">
                {{ $_POST['gole'] }}
            </div>


            <div class="buttons">   
                <div class="button3">
                    <button>登録</button>
                </div>
            </div> 
        </form>
    @endif



   <!-- ①-2 ユーザー登録からそのままコンテンツ作成への場合の処理 -->
   <!-- ②-2 ログイン済みのユーザーがSTAGE作成をする場合の処理 -->
    @if (isset($array_count))
        <form action="{{ route('create_complete') }}" method = "post">
        @csrf 
            <input  type="hidden"  name="title" id="text1" placeholder="タイトル" value="{{ $_POST['title'] }}" >
            
            @for ($a = 1; $a <= $array_count; $a++) 
                <input  type="hidden"  name="contents{{$a}}" id="text1" placeholder="コンテンツ" value="{{ $_POST['contents'.$a] }}" > 
            @endfor   

            <input  type="hidden"  name="gole" id="text1" placeholder="ゴール" value="{{ $_POST['gole'] }}" >


            <h3>タイトル</h3>
            <div class="input">
                {{ $_POST['title'] }}
            </div>

            <h3>短期目標(ステップ)</h3>
            @for ($a = 1; $a <= $array_count; $a++) 
                <div class="input">{{ $_POST['contents'.$a] }}</div>
            @endfor

            <h3>長期目標(ゴール)</h3>
            <div class="input">
                {{ $_POST['gole'] }}
            </div>


            <div class="buttons">   
                <div class="button3">
                    <button>登録</button>
                </div>
            </div> 
        </form>
    @endif
   
</div>




</body>
</html>