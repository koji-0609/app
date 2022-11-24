<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users_content extends Model
{
    //テーブル名
    protected $table = 'users_contents';

    //可変項目
    protected $fillable = 
    [
        'user_id',
        'title',
        'contents',
        'gole',
        'role'
    ];
}
