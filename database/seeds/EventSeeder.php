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

        $programs = App\Program::all();
        foreach ($programs as $program) {
            factory(App\Event::class,4)->create(['date'=>$past , 'program_id'=>$program->id]);
            factory(App\Event::class)->create(['date'=>$future, 'program_id'=>$program->id]);
        }
    }
}
