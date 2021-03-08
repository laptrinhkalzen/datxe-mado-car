<?php

use Illuminate\Database\Seeder;

class TripHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TripHistory::class, 200)->create();
    }
}
