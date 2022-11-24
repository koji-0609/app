<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Appuser extends Authenticatable
{
    //テーブル名
    protected $table = 'appusers';

    //可変項目
    protected $fillable = 
    [
        'name',
        'email',
        'password'
    ];
}
