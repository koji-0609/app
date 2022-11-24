<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guests_content extends Model
{
     //テーブル名
     protected $table = 'guests_contents';

     //可変項目
     protected $fillable = 
     [
         'title',
         'contents',
         'gole',
         'role'
     ];
}
