<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_contents', function (Blueprint $table) {
          

            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('contents');
            $table->string('gole');
            $table->integer('role');
            $table->timestamps('');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_contents');
    }
}
