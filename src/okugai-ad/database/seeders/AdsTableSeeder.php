<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('ads')->insert([

        [
          'kind_id' => 3,
          'advertiser_id' => 1,
          'name' => '恵比寿駅、ホーム、1番線',
          'place' => '恵比寿',
          'price' => 10000,
          'image' => 'keio_line.jpg'
        ],
  
        [
          'kind_id' => 1,
          'advertiser_id' => 2,
          'name' => '谷中ビル、屋上看板',
          'place' => '谷中',
          'price' => 5000,
          'image' => 'able_rooftop.jpg'
        ],
  
        [
          'kind_id' => 1,
          'advertiser_id' => 2,
          'name' => '上野ビル、屋上看板',
          'place' => '上野',
          'price' => 50000,
          'image' => 'able_rooftop.jpg'
        ],
  
        [
          'kind_id' => 1,
          'advertiser_id' => 2,
          'name' => '日暮里ビル、屋上看板',
          'place' => '日暮里',
          'price' => 40000,
          'image' => 'able_rooftop.jpg'
        ],
  
        [
          'kind_id' => 2,
          'advertiser_id' => 3,
          'name' => '大手町交差点',
          'place' => '大手町',
          'price' => 50000,
          'image' => 'intersection.png'
        ],
  
        [
          'kind_id' => 2,
          'advertiser_id' => 3,
          'name' => '紀尾井町交差点',
          'place' => '紀尾井町',
          'price' => 50000,
          'image' => 'intersection.png'
        ],
  
        [
          'kind_id' => 2,
          'advertiser_id' => 3,
          'name' => '日比谷交差点',
          'place' => '日比谷',
          'price' => 50000,
          'image' => 'intersection.png'
        ],
  
        [
          'kind_id' => 3,
          'advertiser_id' => 1,
          'name' => '広尾駅、ホーム、2番線',
          'place' => '広尾',
          'price' => 10000,
          'image' => 'keio_line.jpg'
        ],
  
        [
          'kind_id' => 4,
          'advertiser_id' => 4,
          'name' => '23区内タクシー、運転席後部',
          'place' => '23区内',
          'price' => 100000,
          'image' => 'taxi_inner.jpg'
        ],
  
      ]);
          


    }

}
