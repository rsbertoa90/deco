<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_type')->default('registered');
            $table->integer('unregistered_user_id')->unsigned()->nullable();
            $table->foreign('unregistered_user_id')->references('id')->on('unregistered_users');
            $table->string('type');
            $table->string('entity')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('amount')->nullable();
            $table->string('ticket')->nullable();
            $table->text('comments')->nullable();
            
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
        Schema::dropIfExists('payments');
    }
}
