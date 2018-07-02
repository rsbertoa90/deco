<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $past = now()->subMonth(2);
        $future = now()->addMonth(2);

        $seminars = App\Seminar::all();
        foreach ($seminars as $seminar) {
            factory(App\Event::class,4)->create(['date'=>$past , 'seminar_id'=>$seminar->id]);
            factory(App\Event::class)->create(['date'=>$future, 'seminar_id'=>$seminar->id]);
        }
    }
}
