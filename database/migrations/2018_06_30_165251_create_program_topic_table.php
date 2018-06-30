<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_topic', function (Blueprint $table) {
            $table->integer('program_id')->unsigned()->nullable();
            $table->foreign('program_id')->references('id')
                  ->on('programs')->onDelete('cascade');
      
            $table->integer('topic_id')->unsigned()->nullable();
            $table->foreign('topic_id')->references('id')
                  ->on('topics')->onDelete('cascade');
      
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
        Schema::dropIfExists('program_topic');
    }
}
