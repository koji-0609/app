<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['guest']], function () {
    //ログイン前のユーザーのみ
    Route::get('/', 'PostController@login');
    Route::get('/login', 'PostController@login');
    Route::get('/login.blade.php', 'PostController@login')
        -> name('login');
        
    Route::POST('/menu.blade.php','PostController@login_menu') 
        -> name('login_menu');
    
});



Route::group(['middleware' => ['auth']], function () {
    //ログイン中のユーザーのみ
    Route::GET('/menu.blade.php','PostController@viewmenu') 
        -> name('viewmenu');

    //ログアウト
    Route::POST('logout', 'PostController@logout')
    -> name('logout');
});

    

Route::POST('/achieve','PostController@achieve') 
-> name('achieve');


Route::POST('/achieve2','PostController@achieve2') 
-> name('achieve2');



Route::POST('/index.blade.php','PostController@index') 
-> name('index');

Route::GET('/guest_menu.blade.php','PostController@guest_menu') 
    -> name('guest_menu');

Route::POST('/guest_index.blade.php','PostController@guest_index') 
    -> name('guest_index');

Route::GET('/register.blade.php','PostController@register') 
-> name('register');
Route::POST('/register.blade.php','PostController@register') 
-> name('register');

Route::GET('/confirm.blade.php','PostController@confirm') 
-> name('confirm');
Route::POST('/confirm.blade.php','PostController@confirm') 
-> name('confirm');


Route::POST('/complete.blade.php','PostController@store') 
-> name('store');

// Route::GET('/complete.blade.php','PostController@complete') 
// -> name('complete');

Route::GET('/edit_index.blade.php','PostController@edit_index') 
-> name('edit_index');
Route::POST('/edit_index.blade.php','PostController@edit_index') 
-> name('edit_index');

Route::POST('user_create_index','PostController@user_create_index') 
-> name('user_create_index');

Route::POST('user_edit_index','PostController@user_edit_index') 
-> name('user_edit_index');


Route::GET('/edit_confirm.blade.php','PostController@edit_confirm') 
-> name('edit_confirm');
Route::POST('edit_confirm','PostController@edit_confirm') 
-> name('edit_confirm');
Route::POST('/edit_confirm.blade.php','PostController@edit_confirm2') 
-> name('edit_confirm2');


Route::POST('create_complete','PostController@create_complete') 
-> name('create_complete');

Route::GET('edit_complete','PostController@edit_complete') 
-> name('edit_complete');
Route::POST('edit_complete','PostController@edit_complete') 
-> name('edit_complete');

Route::POST('contents_delete','PostController@contents_delete') 
-> name('contents_delete');

Route::POST('/account_edit.blade.php','PostController@account_edit') 
-> name('account_edit');

Route::POST('/account_confirm.blade.php','PostController@account_confirm') 
-> name('account_confirm');

Route::POST('account_complete','PostController@account_complete') 
-> name('account_complete');

Route::GET('/delete.blade.php','PostController@delete') 
-> name('delete');

Route::POST('/delete_complete.blade.php','PostController@delete_complete') 
-> name('delete_complete');

Route::GET('/password.blade.php','PostController@password') 
-> name('password');

Route::POST('/password_comp.blade.php','PostController@password_comp') 
-> name('password_comp');

Route::GET('/header.blade.php','PostController@header') 
-> name('header');

Route::GET('/footer.blade.php','PostController@footer') 
-> name('footer');

