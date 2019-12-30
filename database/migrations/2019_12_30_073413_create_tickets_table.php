<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_type');
            $table->float('ticket_price');
            $table->string('quantity')->nullable();
            $table->longText('short_note')->nullable();
            $table->dateTime('selling_date');
            $table->dateTime('untill_date');
            $table->integer('show_sell_untill_date');
            $table->integer('fees_consume')->nullable()->default(0);
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('hide_ticket')->nullable()->default(0);
            $table->integer('max_ticket_per_order')->nullable();
            $table->integer('min_ticket_per_order')->nullable();
            $table->string('event_logo')->nullable();
            $table->string('sponser_logo')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
