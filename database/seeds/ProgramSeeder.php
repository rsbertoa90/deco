<?php

use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seminars = App\Seminar::all();
        foreach ($seminars as $seminar) {
            factory(App\Program::class,2)->create(['seminar_id'=>$seminar->id]);
        }
    }
}
