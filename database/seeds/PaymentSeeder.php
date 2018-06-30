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
        foreach ($inscriptions as $inscrption)
        {
            if($inscription->event->date < now()){
                $pay = new App\Payment();
                $pay->payment_type = 1;
                $pay->amount = $inscription->program->price;
                $pay->inscription_id = $inscription->id;
            }
        }
    }
}
