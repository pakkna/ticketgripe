<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question_title');
            $table->string('question_type');
            $table->longText('question_options')->nullable();
            $table->string('question_instruction')->nullable();
            $table->string('Active')->nullable();
            $table->string('answer_required')->nullable();
            $table->string('select_specific_ticket')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
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
        Schema::dropIfExists('custom_form');
    }
}
