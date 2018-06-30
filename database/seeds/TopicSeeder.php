<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = App\Program::all();

        $topics = factory(App\Topic::class,20)->create();
        foreach ($programs as $program){
            $attach = $topics->random(4);
            foreach ($attach as $a) {
                $program->topics()->attach($a);
            }
        }
    }
}
