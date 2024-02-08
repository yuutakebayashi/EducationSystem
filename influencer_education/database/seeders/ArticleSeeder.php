<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            "title"=>"ここにお知らせのタイトルが入ります",
            "posted_date"=>"2023年7月23日",
            "article_contents"=>"ここにお知らせの本文が入ります",
        ]);
        Article::create([
            "title"=>"ここにお知らせのタイトルが入ります",
            "posted_date"=>"2023年7月23日",
            "article_contents"=>"ここにお知らせの本文が入ります",
        ]);
        Article::create([
            "title"=>"ここにお知らせのタイトルが入ります",
            "posted_date"=>"2023年7月23日",
            "article_contents"=>"ここにお知らせの本文が入ります",
        ]);
        Article::create([
            "title"=>"ここにお知らせのタイトルが入ります",
            "posted_date"=>"2023年7月23日",
            "article_contents"=>"ここにお知らせの本文が入ります",
        ]);
    }
}
