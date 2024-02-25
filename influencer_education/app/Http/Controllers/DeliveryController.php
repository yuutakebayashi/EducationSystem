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
use App\Models\CurriculumProgress;
use Illuminate\Support\Facades\DB;


class DeliveryController extends Controller
{
    public function show(Request $request){
        // $user = User::all(); //$userはコレクションではなく、単一のユーザーを返す必要がある。
        $user = Auth::user();
        // $grades = Grade::all();
        $gradeName = Grade::where('id', $user->now_class)->value('name');
        $curriculums = Curriculum::all();
        $grade = Grade::with('curriculums')->find($user->now_class);

        return view('suzuki.delivery',[
            'user'=>$user,
            'curriculums' => $curriculums,
            'gradeName' => $gradeName,
            'grade' => $grade,
        ]);
    }
}
