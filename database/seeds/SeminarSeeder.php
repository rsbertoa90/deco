<?php

use Illuminate\Database\Seeder;

class SeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Seminar::class)->times(3)->create();
    }
}
