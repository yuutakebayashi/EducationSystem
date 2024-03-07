<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Delivery_time;
//Carbon クラスをインポート
use Carbon\Carbon;

class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery_time::create([
            "curriculums_id" => "1",
            "delivery_from" => Carbon::create(2024, 2, 1, 9, 0, 0),
            "delivery_to" => Carbon::create(2024, 3, 1, 9, 0, 0),
        ]);

        Delivery_time::create([
            "curriculums_id" => "2",
            "delivery_from" => Carbon::create(2024, 3, 1, 9, 0, 0),
            "delivery_to" => Carbon::create(2024, 4, 1, 9, 0, 0),
        ]);
    }
}
