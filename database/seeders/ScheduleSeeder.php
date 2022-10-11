<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'movie_id' =>1,
                'start_time' => "11:00",
                'end_time' => "13:00",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' =>1,
                'start_time' => "13:00",
                'end_time' => "15:00",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' =>1,
                'start_time' => "16:00",
                'end_time' => "18:00",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' =>2,
                'start_time' => "9:00",
                'end_time' => "11:00",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' =>2,
                'start_time' => "14:30",
                'end_time' => "16:30",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' =>2,
                'start_time' => "20:00",
                'end_time' => "22:00",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];

        foreach($params as $param){
            DB::table("schedules")->insert($param);
        }
    }
}
