<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $fillable = [
        'title',
        'posted_date',
        'article_contents',
        'created_at',
        'updated_at'
     ];

    protected $dates = [
        'posted_date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'posted_date' => 'datetime',
    ];

    public function getList() {
        $articles = DB::table('articles')->get();

        return $articles;
    }

    /* お知らせ変更 */
    public function updateArticle($request, $article)
    {
        $result = $article->fill([
            'title' => $request->title,
            'posted_date' => $request->posted_date,
            'article_contents' => $request->article_contents,
        ])->save();

        return $result;
    }

    /* お知らせ変更 - 新規登録 */
    public function storeArticle($request) {

        DB::table('articles')->insert([
            'title' => $request->title,
            'posted_date' => $request->posted_date,
            'article_contents' => $request->article_contents,
        ]);

    }
}
