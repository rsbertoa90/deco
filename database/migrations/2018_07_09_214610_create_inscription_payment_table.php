<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription_payment', function (Blueprint $table) {
            $table->integer('inscription_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->foreign('inscription_id')->references('id')->on('inscriptions');
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
        Schema::dropIfExists('inscription_payment');
    }
}
