<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_confirm_id');
            $table->string('attende_confirm')->nullable();
            $table->integer('sold_tickets');
            $table->float('order_amount');
            $table->float('ssl_charge');
            $table->float('system_charge');
            $table->float('sold_amount');
            $table->unsignedBigInteger('payment_id')->nallable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('ticket_id');      
            $table->string('transaction_id');      
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
        Schema::dropIfExists('orders');
    }
}
