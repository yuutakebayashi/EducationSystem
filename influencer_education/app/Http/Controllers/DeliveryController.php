<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Delivery;
use Illuminate\Support\Facades\Storage;
use App\Models\Grade;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculum_Progress;
use Illuminate\Support\Facades\DB;
use App\Models\Delivery_time;


class DeliveryController extends Controller
{
    public function show(Request $request){
        // $user = User::all(); //$userはコレクションではなく、単一のユーザーを返す必要がある。
        $user = Auth::user();
        // $grades = Grade::all();
        $gradeName = Grade::where('id', $user->now_class)->value('name');
        $curriculums = Curriculum::all();
        $grade = Grade::with('curriculums')->find($user->now_class);
        //clear_flgを表示
        $curriculumProgress = Curriculum_Progress::where('users_id', $user->id)->value('clear_flg');

        //公開日指定
        $delivery_times = Delivery_time::whereIn('curriculums_id', $curriculums->pluck('id'))->get();

        // 現在時刻を取得
        $now = now();

        // 公開されているカリキュラムのみを抽出
        $available_curriculums = [];
        foreach ($delivery_times as $delivery_time) {
            if ($delivery_time->publish_start <= $now && $delivery_time->publish_end >= $now) {
                $available_curriculums[] = $delivery_time->curriculum;
            }
        }

        return view('suzuki.delivery',[
            'user'=>$user,
            // 'curriculums' => $curriculums,
            // 公開されているカリキュラムのみを渡す
            'curriculums' => $available_curriculums,
            'gradeName' => $gradeName,
            'grade' => $grade,

            'curriculumProgress' => $curriculumProgress,

            'delivery_times' => $delivery_times,
        ]);
    }

    public function update(Request $request){
        // ユーザーに関連する進捗データを取得する
        $user = Auth::user();
        $curriculumProgress = Curriculum_Progress::where('users_id', $user->id)->first();
        if ($curriculumProgress) {
            //clear_flgを1に変更して保存
            $curriculumProgress->clear_flg = 1;
            $curriculumProgress->save();
            // 成功時のレスポンスを返す
            // return redirect('/delivery');
            return response()->json([
                'value' => $curriculumProgress->clear_flg ,
            ]);
        }
    }
}
