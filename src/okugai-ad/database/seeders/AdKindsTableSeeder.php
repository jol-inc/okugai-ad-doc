<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AdKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('ad_kinds')->insert([

        [
          'kind_id' => 1,
          'name' => '建物、ビル',
        ],
        [
          'kind_id' => 2,
          'name' => '道路',
        ],
        [
          'kind_id' => 3,
          'name' => '電車、バス',
        ],
        [
          'kind_id' => 4,
          'name' => 'タクシー',
        ],

      ]);




    }
}
