
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>メイン画面ゲスト</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="guestindextop">
    <div class="rod">
        <button id="rod">更新</button>
    </div>
    <h1>{{ $guest_contents[0]['title'] }}</h1>
 

    @foreach($guest_contents as $index => $guest_contents2)

        @if ($guest_contents2['role'] == 0)
        
                <div class="title">
                    <button>STAGE{{ $index+1 }}</button><br>
                </div>
            
            
                <div class="box" value="{{ $guest_contents2 -> role }}">
                    <p>{{ $guest_contents2 -> contents }}</p>
                    <div id="role">
                        <button id="achieve" value="{{ $guest_contents2 -> id }}">達成</button>
                    </div>
                </div>
           
        @else ($guest_contents2['role'] == 1)
        
                <div class="title" id="role_title">
                    <button>STAGE{{ $index+1 }}</button><br>
                </div>
            
            
                <div class="box" value="{{ $guest_contents2 -> role }}">
                    <p>{{ $guest_contents2 -> contents }}</p>
                    <div id="role" class="role_color">
                        <button id="achieve"  value="{{ $guest_contents2 -> id }}">達成</button>
                    </div>
                </div>
            
        @endif
    


    @endforeach   
    
    @if ($gole == "no_gole") 

        <div class="title">
            <button>GOLE</button><br>
        </div>
        <div class="box">
            <p>{{ $guest_contents2 -> gole }}</p>
        </div>

    @else ($gole == "yes_gole") 

        <div class="title" id="role_gole">
            <button>GOLE</button><br>
        </div>
        <div class="box">
            <p>{{ $guest_contents2 -> gole }}</p>
        </div>

    @endif


<script>
    //アコーディオンをクリックした時の動作
$('.title').on('click', function() {//タイトル要素をクリックしたら
  var findElm = $(this).next(".box");//直後のアコーディオンを行うエリアを取得し
  $(findElm).slideToggle();//アコーディオンの上下動作
    
});



//class付与でcss変更
$(document).on('click',"#role", function() {

$(this).toggleClass('role_color');

});


//更新処理
$(document).on('click',"#rod", function() {

    window.location.reload();

});



//ajax
$(document).on('click',"#achieve", function() {

    
var cid = $(this).val();

$.ajaxSetup({
    headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
  $.ajax({
    //POST通信
    type: "post",
    //ここでデータの送信先URLを指定します。
    url: "/achieve2",
    dataType: "json",
    data: {
      id: 100,
      contents_id: cid,
      title: "テストtitle",
      role: "テストrole",
    },

  })
    //通信が成功したとき
    .then((res) => {
      console.log(res);
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });



});




</script>

</body>
</html>