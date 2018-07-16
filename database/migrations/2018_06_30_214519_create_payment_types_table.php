<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('payment_types')->insert(
            array(
                'name' => 'transferencia bancaria',
                'description' => 'transferencia bancaria'
            )
            
        );
        DB::table('payment_types')->insert(
            array(
                'name' => 'mercadopago',
                'description' => 'Pago por la web'
            )
            
        );
        // DB::table('payment_types')->insert(
        //     array(
        //         'name' => 'efectivo',
        //         'description' => 'Pag en efectivo presencial'
        //     )
            
        // );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_types');
    }
}
