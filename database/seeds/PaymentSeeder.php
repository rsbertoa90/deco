<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscriptions = App\Inscription::all();
        foreach ($inscriptions as $inscription)
        {
            if( $inscription->event->date < now()){
                $pay = new App\Payment();
                $pay->payment_type_id = 1;
                $pay->amount = $inscription->event->price;
                $pay->inscription_id = $inscription->id;
                $pay->save();
            }
        }
    }
}
