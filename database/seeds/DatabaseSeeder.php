<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('guests_contents')->insert([
            [
                'title' => '１００万円貯金計画',
                'contents' => '１０万円を貯金する！',
                'gole' => '１００万円を貯金する！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ],
             [
                'title' => '１００万円貯金計画',
                'contents' => '３０万円を貯金する！',
                'gole' => '１００万円を貯金する！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ],
             [
                'title' => '１００万円貯金計画',
                'contents' => '５０万円を貯金する！',
                'gole' => '１００万円を貯金する！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ],
             [
                'title' => '１００万円貯金計画',
                'contents' => '８０万円を貯金する！',
                'gole' => '１００万円を貯金する！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ],


            [
                'title' => 'ダイエット計画',
                'contents' => '〇月〇日までに合計１ｋｇ痩せる！',
                'gole' => '〇月〇日までに合計１０ｋｇ痩せる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'ダイエット計画',
                'contents' => '〇月〇日まで合計３ｋｇ痩せる！',
                'gole' => '〇月〇日までに合計１０ｋｇ痩せる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'ダイエット計画',
                'contents' => '〇月〇日までに合計5ｋｇ痩せる！',
                'gole' => '〇月〇日までに合計１０ｋｇ痩せる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'ダイエット計画',
                'contents' => '〇月〇日までに合計８ｋｇ痩せる！',
                'gole' => '〇月〇日までに合計１０ｋｇ痩せる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],


            [
                'title' => '〇〇資格取得計画',
                'contents' => '1月〇日までに〇〇まで勉強する！',
                'gole' => '資格試験を受ける！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => '〇〇資格取得計画',
                'contents' => '2月〇日までに〇〇まで勉強する！',
                'gole' => '資格試験を受ける！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => '〇〇資格取得計画',
                'contents' => '3月〇日までに〇〇まで勉強する！',
                'gole' => '資格試験を受ける！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => '〇〇資格取得計画',
                'contents' => '4月〇日までに〇〇まで勉強する！',
                'gole' => '資格試験を受ける！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],


            [
                'title' => '仕事上達計画',
                'contents' => '〇〇が一人で出来るようになる！',
                'gole' => '一人前になる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => '仕事上達計画',
                'contents' => '〇〇が一人で出来るようになる！',
                'gole' => '一人前になる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => '仕事上達計画',
                'contents' => '〇〇が一人で出来るようになる！',
                'gole' => '一人前になる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => '仕事上達計画',
                'contents' => '〇〇が一人で出来るようになる！',
                'gole' => '一人前になる！',
                'role' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
