<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuestionAnswer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question_title');
            $table->string('question_ans');
            $table->string('transaction_id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('ticket_id');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('QuestionAnswer');
    }
}
