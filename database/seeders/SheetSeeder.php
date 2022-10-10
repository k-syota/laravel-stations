<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SheetSeeder extends Seeder
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
                'column' =>1,
                'row' => "a"
            ],
            [
                'column' =>2,
                'row' => "a"
            ],
            [
                'column' =>3,
                'row' => "a"
            ],
            [
                'column' =>4,
                'row' => "a"
            ],
            [
                'column' =>5,
                'row' => "a"
            ],
            [
                'column' =>1,
                'row' => "b"
            ],
            [
                'column' =>2,
                'row' => "b"
            ],
            [
                'column' =>3,
                'row' => "b"
            ],
            [
                'column' =>4,
                'row' => "b"
            ],
            [
                'column' =>5,
                'row' => "b"
            ],
            [
                'column' =>1,
                'row' => "c"
            ],
            [
                'column' =>2,
                'row' => "c"
            ],
            [
                'column' =>3,
                'row' => "c"
            ],
            [
                'column' =>4,
                'row' => "c"
            ],
            [
                'column' =>5,
                'row' => "c"
            ],

        ];

        // $rows = [
        //     "a",
        //     "b",
        //     "c"
        // ];

        // $columns = [
        //     1,
        //     2,
        //     3,
        //     4,
        //     5
        // ];

        foreach($params as $param){
            DB::table("sheets")->insert($param);
        }
    }
}
