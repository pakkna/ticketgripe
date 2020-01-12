<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {

            $table->increments('id');
            $table->string('product');
            $table->string('total_tickets')->nullable();
            $table->string('card_type');
            $table->string('tran_id');
            $table->string('val_id');
            $table->float('total_amount');
            $table->float('store_amount');
            $table->string('bank_tran_id');
            $table->string('card_no');
            $table->string('card_brand');
            $table->string('card_issuer');
            $table->string('card_issuer_country');
            $table->string('currency')->nullable();
            $table->float('currency_rate');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('ticket_id');
            $table->dateTime('tran_date');
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
        Schema::dropIfExists('payment');
    }
}
