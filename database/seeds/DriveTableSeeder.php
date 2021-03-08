<?php

use Illuminate\Database\Seeder;

class DriveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Drive::class, 200)->create();
    }
}
