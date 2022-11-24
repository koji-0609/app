
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コンテンツ作成・編集画面</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@include('users.header')<br>
    
<div class="edittop">

    <h1>STAGEの作成・編集</h1>

   
        <!-- ③-1 ログイン済みのユーザーがSTAGE編集する場合 -->
        @if (isset($index_content))
            <div class="form" >
                <form action="{{ route('edit_confirm2') }}" method = "post">
                    @csrf

                    <input  type="text"  name="title" id="text1" placeholder="タイトルを入力" value="{{ $_POST['title'] }}" ><br> 
                    
                    <div id="target2">  
                        @foreach($index_content as $index => $index_content)
                        <div>
                            <input  type="hidden"  name="contents_id{{$a++}}" id="text1" placeholder="コンテンツID" value="{{ $index_content -> id }}" > 

                            <input  type="text"  name="contents{{$b++}}" id="text1" placeholder="短期目標を入力" value="{{ $index_content -> contents }}" > 

                        </div>
                        @endforeach 
                        </div> 

                        <input  type="hidden"  name="contents_id_count" id="text1" placeholder="コンテンツIDの数" value="{{ $a-1 }}" >
          
                    <div id="add2" class="but" onClick="count2();">＋</div>
                    <input  type="text"  name="gole" id="text1" placeholder="ゴール(長期目標)を入力" value="{{ $index_content -> gole }}" ><br> 
                
                    <div class="button">
                        <button type="submit">確認</button>
                    </div>  

                </form>
            </div>

                <script>
                    var a = '{{ $a }}';
                    var b = 1;

                    total = parseInt(a) - parseInt(b);

                    function count2(){
                        total = total + 1;
                    }

                    $('#add2').on('click', function() {
                        $('#target2').append('<input  type="text"  name="contents' + total + '" id="text" placeholder="短期目標を入力" value="">');
                    }); 
                </script>
                    
        @endif


        <!-- ①-1 ユーザー登録後そのままSTAGE作成の場合 -->
        <!-- ②-1 ログイン済みのユーザーがSTAGE作成をする場合 -->
        @if (!isset($index_content))
            <div class="form" >
                <form action="{{ route('edit_confirm') }}" method = "post">
                    @csrf
                    <input  type="text"  name="title" id="text1" placeholder="タイトルを入力" value="{{ old('title') }}" ><br> 
            
                    <div id="target">
                        <div>
                            <input  type="text"  name="contents1" id="text1" placeholder="短期目標を入力" value="{{ old('contents1') }}">
                        </div>
                    </div>
                
                    <div id="add" class="but" onClick="count();">＋</div>
                    <input  type="text"  name="gole" id="text1" placeholder="ゴール(長期目標)を入力" value="{{ old('gole') }}" ><br> 
                
                    <div class="button">
                        <button type="submit">確認</button>
                    </div>
                </form>
            </div>
   
                <script>
                    var cont = 1;

                    function count(){
                        cont = cont + 1;
                    }

                    $('#add').on('click', function() {    
                        $('#target').append('<input  type="text"  name="contents' + cont + '" id="text1" placeholder="短期目標を入力" value="">');
                    }); 
                    
                </script>

        @endif


   
</div>



</body>
</html>