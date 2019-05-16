<?php

use Illuminate\Database\Seeder;
use \App\Internship;

class InternshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Internship::class, 25)->create();
    }
}
