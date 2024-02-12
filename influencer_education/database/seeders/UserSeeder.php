<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>"鈴木絢大",
            "name_kana"=>"スズキケンタ",
            "email"=>"suzuken0301@icloud.com",
            "password"=>"t9uvpadz",
            "now_class"=>"1",
        ]);
    }
}
