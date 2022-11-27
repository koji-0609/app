# MOCHI LOG 
php自作
# 概要
仕事やプライベートでの目標を管理するアプリを作りました。
登録ユーザーとゲストユーザーに分け、
登録ユーザーはユーザー登録しログインすることで利用でき
ゲストユーザーは登録なしで体験版をご利用いただけます。
# 使い方
【登録ユーザー】
ユーザー名、メールアドレス、パスワードを登録することで
目標の登録・閲覧・更新・削除・達成ボタンによる管理が
使用できるようになっております。

【テスト用アカウント】

ユーザー名　：　　サンプル

メールアドレス　：　sample@gmail.com

パスワード　　: sample

【ゲストユーザー】
ユーザー登録は必要ありません。
アプリの使用イメージを見て頂くために用意しています。
サンプルデータが入っているので
閲覧・達成ボタンの利用のみ可能となっております。

# 環境
MAMP/MySQL/PHP
# データベース
データベース名　：　laravel_app_db
# アプリのご利用について
ご利用環境のMAMPもしくはXAMPP起動と共に
phpmyAdminでDBを起動し、ターミナルまたはコマンドプロントで
「　php artisan db:seed　」を実行してサンプルデータの作成と
「　php artisan serve 」でサーバーの立ち上げ、表示がされるか確認をしてからご利用ください。
