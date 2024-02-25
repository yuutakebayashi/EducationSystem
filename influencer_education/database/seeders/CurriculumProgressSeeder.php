<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curriculum_Progress;

class CurriculumProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curriculum_Progress::create([
            "curriculums_id"=>"1",
            "users_id"=>"1",
            "clear_flg"=>"0",
        ]);
        Curriculum_Progress::create([
            "curriculums_id"=>"2",
            "users_id"=>"2",
            "clear_flg"=>"0",
        ]);
    }
}
