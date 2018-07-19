<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_payment', function (Blueprint $table) {
            $table->integer('event_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->softDeletes();
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
        Schema::dropIfExists('event_payment');
    }
}
