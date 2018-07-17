<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                'name' => 'user',
                'description' => 'general user / client'
            )
        );
        DB::table('roles')->insert(
            array(
                'name' => 'admin',
                'description' => 'site admin'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
