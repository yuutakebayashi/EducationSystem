<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->article = new Article();
    }

    /* ユーザー＿お知らせ */
    public function showUserInfo() {
        $model = new Article();
        $articles = $model->getList();
        return view('user_info', ['articles' => $articles]);
    }

    /* 管理＿お知らせ */
    public function showAdminInfo() {
        $model = new Article();
        $articles = $model->getList();
        return view('admin_info', ['articles' => $articles]);
    }

    public function destroy(Request $request) {
        // dd($request);
        $input = $request->all();
        // dd($input);
            DB::beginTransaction();
    
            try {
              $product = Article::find($input['id']); 
              $product->delete();
    
              DB::commit();
              return response()->json(['success' => true]);
    
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['success' => false, 'message' => '削除に失敗しました']);
            }
        }

    /* お知らせ変更 */
    public function showListEdit($id) {
        $article = Article::find($id);
        return view('admin_info_edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $updateArticle = $this->article->updateArticle($request, $article);

        return redirect()->route('showList.admininfoedit', ['id'=>$article->id])->with('message', '登録しました');
    }

    /* お知らせ変更 - 新規登録 */
    public function showListCreate() {

        $now = strtotime('+9 hour');
        return view('admin_info_create', compact(
            'now',
        ));
    }

    public function createArticle(ArticleRequest $request)
    {
    DB::beginTransaction();

    try {
        $model = new Article();
        $model->storeArticle($request);

        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }

    return redirect(route('showList.admininfocreate'))->with('message', '登録しました');
    }
}
