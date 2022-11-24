<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guests_content;
use App\Models\Users_content;
use App\Models\Appuser;

use App\Http\Requests\ContentsRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{


    

    public function login()
    {
        return view('users.login');
    }



    //GETでメニューを表示する際の処理
    public function viewmenu()
    {
        $index_menu = Users_content::where('user_id', '=', Auth::user() -> id) 
        -> groupBy('title') -> get('title');

        return view('users.menu', compact('index_menu'));
    }

 
    //ログイン処理をしてからメニュー画面へ遷移の処理
    public function login_menu(LoginRequest $request)
    {
       
        $credentials = $request -> only('email', 'password');

        if (Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            
            //ログイン中のユーザーのタイトルを取得してメニュー画面へ渡す処理
            $index_menu = Users_content::where('user_id', '=', Auth::user() -> id) 
                                         -> groupBy('title') -> get('title');

            return view('users.menu', compact('index_menu'));
        }

        return back() -> withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。'
        ]);
        
    }

    //ajax 達成ボタン押したときの処理
    public function achieve(Request $request) 
    {
    
        $user_contents = Users_content::where('id', '=', $request -> contents_id ) -> get();
                
        // dd($user_contents);
                    
        //押したSTAGEのroleが０だった場合、１を代入
        if ($user_contents[0]['role'] == 0) {
        Users_content::where('id', '=', $request -> contents_id )  -> 
                       where('role', '=', 0 )  -> update([
        
                            'role' => 1
                        ]);
        }//押したSTAGEのroleが１だった場合、０を代入
        elseif ($user_contents[0]['role'] == 1) {
            Users_content::where('id', '=', $request -> contents_id )  -> 
                           where('role', '=', 1 )  -> update([
            
                                'role' => 0
                            ]);
        }
        // $result = $request->all();
        return $result;

    
    }


    //ajax 達成ボタン押したときの処理 ゲスト用
    public function achieve2(Request $request) 
    {
    
        
        $user_contents = Guests_content::where('id', '=', $request -> contents_id ) -> get();
                
        // dd($user_contents);
                    
        //押したSTAGEのroleが０だった場合、１を代入
        if ($user_contents[0]['role'] == 0) {
        Guests_content::where('id', '=', $request -> contents_id )  -> 
                       where('role', '=', 0 )  -> update([
        
                            'role' => 1
                        ]);
        }//押したSTAGEのroleが１だった場合、０を代入
        elseif ($user_contents[0]['role'] == 1) {
            Guests_content::where('id', '=', $request -> contents_id )  -> 
                           where('role', '=', 1 )  -> update([
            
                                'role' => 0
                            ]);
        }
        // $result = $request->all();
        return $result;

    
    }


    public function logout()
    {
        Auth::logout();
        return redirect() -> route('login');
    }


 
    //ゲスト用のタイトルをguests_contentsテーブルから取得して
    //ゲストメニュー画面に渡す処理
    public function guest_menu()
    {
    
        $guest_menu = Guests_content::groupBy('title') -> get('title');

        return view('users.guest_menu', compact('guest_menu'));
    }

   
    //POSTで来たタイトルを使って一致するレコードを取得し
    //ゲストのindexメニューに渡す処理
    public function guest_index()
    {

        $guest_contents = Guests_content::where('title', '=', $_POST['title']) -> get();


        return view('users.guest_index', compact('guest_contents'));
    }

 
    public function register(Request $request)
    {

        return view('users.register');
    }


    public function confirm(RegisterRequest $request)
    {
        

        return view('users.confirm');
    }

  
    public function complete()
    {
        return view('users.complete');
    }


    //①-1 ユーザー登録からそのままコンテンツ作成への場合の処理
    // ログイン処理をしてコンテンツ作成画面へ遷移
    public function edit_index(LoginRequest $request)
    {

        // dd($_POST);
        $credentials = $request -> only('email', 'password');

        if (Auth::attempt($credentials)){
            $request -> session() -> regenerate();
        
            return view('users.edit_index');
        }

    }

    //②-1 ログイン済みのユーザーがSTAGE作成をする場合の処理
    //開いているタイトルの情報を渡してSTAGE作成画面へ遷移
    public function user_create_index()
    {
   
        return view('users.edit_index');

    }

    //③-1 ログイン済みのユーザーがSTAGE編集する場合の処理
    //開いているタイトルのSTAGEを取得して編集画面に渡す。
    public function user_edit_index()
    {

        $index_content = Users_content::where('title', '=', $_POST['title']) 
                                     -> where('user_id', '=', Auth::user() -> id) -> get();

        $a = 1;
        $b = 1;

        // dd($index_content[1]['id']);
        return view('users.edit_index', compact('index_content','a','b'));
    }

    //①-2 ユーザー登録からそのままコンテンツ作成への場合の処理
    //②-2 ログイン済みのユーザーがSTAGE作成をする場合の処理
    //配列のcontentsの数を取得して確認画面に渡す
    public function edit_confirm()
    {
        $array_count = count($_POST) - 3 ;
    
        return view('users.edit_confirm', compact('array_count'));
    }

    //③-2 ログイン中のユーザーがSTAGE編集する際の処理
    //配列のcontentsの数を取得して確認画面に渡す
    public function edit_confirm2()
    {

        // dd($_POST);

        //元からあるコンテンツの数
        $contents_id_count = $_POST['contents_id_count'];
        //コンテンツの数
        $contents_count = count($_POST) - ($_POST['contents_id_count'] + 4 );

        $c = 1;
    
        return view('users.edit_confirm', compact('contents_id_count','contents_count','c'));

    }

    //①-3 ユーザー登録からそのままコンテンツ作成への場合の処理
    //②-3 ログイン済みのユーザーがSTAGE作成をする場合の処理
    //コンテンツをusers_contentsテーブルに登録する処理
    //配列のcontentsの数だけcreateを繰り返す
    public function create_complete()
    {

        $array_count = count($_POST) - 3 ;
       
        for ($a = 1; $a <= $array_count; $a++) {
            $user_contents = Users_content::where('user_id', '=',  Auth::user() -> id ) -> create([
                'user_id'   => Auth::user() -> id,
                'title'   => $_POST['title'],
                'contents' => $_POST['contents'.$a],
                'gole'    => $_POST['gole']
            ]);
        }
 
        //ログイン中のユーザーのタイトルを取得してメニュー画面へ渡す処理
        $index_menu = Users_content::where('user_id', '=', Auth::user() -> id) 
        -> groupBy('title') -> get('title');

        return view('users.menu', compact('index_menu'));
 
    }


    //③-3 ログイン中のユーザーがSTAGE編集する際の処理
    //コンテンツをusers_contentsテーブルを更新する処理
    //配列のcontentsの数だけupdateを繰り返す
    public function edit_complete(Request $request)
    {
       

        //コンテンツ編集の確認画面から戻ってきた時、値保持の処理
        if($request->input('back') == 'back'){
            return redirect('/edit_index.blade.php')
                    ->withInput();
        }
       
        $array_count = count($_POST) - ( 4 + $_POST['contents_id_count']);
      
        for ($a = 1; $a <= $array_count; $a++) {

            if ($a <= $_POST['contents_id_count']){
                Users_content::where('user_id', '=',  Auth::user() -> id ) 
                            -> where('id', '=',  $_POST['contents_id'.$a] ) -> update([
                    'user_id'   => Auth::user() -> id,
                    'title'     => $_POST['title'],
                    'contents'  => $_POST['contents'.$a],
                    'gole'      => $_POST['gole']
                ]);
            }elseif ($a > $_POST['contents_id_count']){
                Users_content::where('user_id', '=',  Auth::user() -> id ) -> create([
                    'user_id'   => Auth::user() -> id,
                    'title'     => $_POST['title'],
                    'contents'  => $_POST['contents'.$a],
                    'gole'      => $_POST['gole']
                ]);
            }

        }

            //ログイン中のユーザーのタイトルを取得してメニュー画面へ渡す処理
            $index_menu = Users_content::where('user_id', '=', Auth::user() -> id) 
            -> groupBy('title') -> get('title');

            return view('users.menu', compact('index_menu'));
    
    }

    //STAGEを削除する処理
    public function contents_delete()
    {
        // dd($_POST);

        $index_content = Users_content::where('title', '=', $_POST['title']) 
                                     -> where('user_id', '=', Auth::user() -> id) -> get();
                                     
        $array_count   = count($index_content) ;  
                 
        // dd($index_content[0]['id']);
         
        for ($a = 0; $a < $array_count; $a++) {

            $post = Users_content::find($index_content[$a]['id']);
            $post->delete();
            
        }

        //ログイン中のユーザーのタイトルを取得してメニュー画面へ渡す処理
        $index_menu = Users_content::where('user_id', '=', Auth::user() -> id) 
        -> groupBy('title') -> get('title');

        return view('users.menu', compact('index_menu'));
        
    }
 
    //POSTで来たユーザーIDとタイトルを使って一致するレコードを取得し
    //ユーザーのindexメニューに渡す処理
    public function index()
    {

        $index_content = Users_content::where('title', '=', $_POST['title']) 
                                     -> where('user_id', '=', Auth::user() -> id) -> get();
      
        return view('users.index', compact('index_content'));
    }



    public function account_edit(Request $request)
    {
      

        return view('users.account_edit');
    }

   

    //ユーザーアカウントの編集で入力パスワードが再入力を含め、
    //同じであれば確認画面へ。違う場合はエラーをもって戻る。処理
    public function account_confirm(RegisterRequest $request)
    {
    
        if($_POST['password'] != $_POST['password2']){
            return back() -> withErrors([
                'password_error' => 'パスワードが異なります。'
            ])->withInput();
        }
        return view('users.account_confirm');
    }

 
  

    //ユーザーアカウントの情報を更新する処理
    public function account_complete(Request $request)
    {
    
        //ユーザーアカウント編集の確認画面から戻ってきた時、値保持の処理
        if($request->input('back') == 'back'){
            return redirect('/account_edit.blade.php')
                        ->withInput();
        }

        $user_update = Appuser::where('id', '=',  Auth::user() -> id ) -> update([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password'])
        ]);
        
        return redirect() -> route('viewmenu');
    }
    


    public function delete()
    {
        return view('users.delete');
    }

   

    //ユーザーアカウントを削除する処理
    public function delete_complete()
    {
        
        $id = Auth::user() -> id ;

        if (Appuser::where('id', '=',  $id )) {

            Appuser::destroy($id);
            return view('users.delete_complete');
        }
    }

  

    public function password()
    {
        return view('users.password');
    }

   

    //パスワードリセットの処理   
    public function password_comp(RegisterRequest $request)
    {
        //新しいパスワードとパスワード再入力の値が違ったらエラー
        if($_POST['password'] != $_POST['password2']){
            return back() -> withErrors([
                'password_error' => 'パスワードが異なります。'
            ]);
        }

        //POSTからの値を使ってユーザー情報を取得
        $name = Appuser::where('name', '=', $_POST['name']) -> get();
        $email = Appuser::where('email', '=', $_POST['email']) -> get();

        //上記で取得した値がDBに存在し、
        if (isset($name[0]['name']) && isset($email[0]['name'])) {
            //name側のnameとemail側のnameが同じであれば、
            if ($name[0]['name'] == $email[0]['name']) {
                //name側のemailとemail側のemailが同じであれば、
                if ($name[0]['email'] == $email[0]['email']) {
                    //パスワード更新
                    Appuser::where('email', '=', $_POST['email']) ->update([
                    'password' => Hash::make($_POST['password'])
                    ]);

                    return view('users.password_comp');
                }
            } 
        }

        //同じレコード内になければエラー
        return back() -> withErrors([
            'input_error' => 'ユーザーネームかメールアドレスが間違っています。'
        ]);


    }

    

    public function header()
    {
        return view('users.header');
    }

   

    public function footer()
    {
        return view('users.footer');
    }



    public function create()
    {
        //
    }

  
    
    //ユーザー新規登録の処理
    public function store(Request $request)
    {
        //ユーザー登録の確認画面から戻ってきた時、値保持する処理
        if($request->input('back') == 'back'){
            return redirect('/register.blade.php')
                        ->withInput();
        }

        $user_data = Appuser::create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password'])
        ]);
        
        return view('users.complete');

    }

 

    public function show($id)
    {
        //
    }

  

    public function edit($id)
    {
        //
    }

  

    public function update(Request $request, $id)
    {
        //
    }

  

    public function destroy($id)
    {
        //
    }
}
