<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('category');
            $table->longText('description')->nullable();
            $table->string('seat_number')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('image_path')->nullable();
            $table->string('custom_link')->unique()->nullable();
            $table->integer('hide_date_event_page')->nullable()->default(0);
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('event_status');
            $table->integer('page_visitor')->nullable();
            $table->float('event_credit')->nullable()->default(0);
            $table->float('event_currency')->nullable()->default("BDT");
            $table->timestamps();
            $table->engine = 'InnoDB'; 	
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
