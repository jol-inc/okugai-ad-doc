<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdvertisersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('advertisers')->insert([

        [
          'name' => 'インター電鉄',
          'email' => 'i@i.com',
          'password' => Hash::make('pppppppp'),
        ],
        [
          'name' => '高野不動産',
          'email' => 't@t.com',
          'password' => Hash::make('pppppppp'),
        ],
        [
          'name' => 'ロード広告社',
          'email' => 'r@r.com',
          'password' => Hash::make('pppppppp'),
        ],
        [
          'name' => '日本タクシー',
          'email' => 'n@n.com',
          'password' => Hash::make('pppppppp'),
        ],


      ]);



    }
}
