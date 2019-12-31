<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('username');
            $table->string('email',100)->unique();
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->string('user_type');
            $table->string('country')->nullable();
            $table->string('organization')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_pic')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB'; 	
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
