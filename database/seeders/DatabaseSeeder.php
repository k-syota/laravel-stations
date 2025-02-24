<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Practice;
use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Practice::factory(10)->create();
        Movie::factory(10)->create();
        // Schedule::factory()->has(Schedule::factory(5))->create();
        $this->call([
            ScheduleSeeder::class,
            SheetSeeder::class
        ]);
    }
}
