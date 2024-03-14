<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\User;
use App\Models\Grade;
use App\Models\Curriculum_progress;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{

    /* カリキュラム進捗 */
    public function showListProgress($id) {
        $result = User::query()
                ->select('users.*', 'classes.name as classes_name')
                ->join('classes','users.classes_id','=','classes.id');
        
        $result->where('users.id', '=', "$id");
        $user = $result->first();
        
        $classes_lists = Grade::all();
        $curriculums = DB::table('curriculums')
                     ->select('curriculums.*', 'curriculum_progress.clear_flg')
                     ->leftJoin('curriculum_progress', 'curriculums.id', '=', 'curriculum_progress.curriculums_id')
                     ->where('curriculum_progress.users_id', '=' ,"$id")
                     ->orWhereNull('curriculum_progress.curriculums_id')
                     ->get();


                     
        return view('progress', ['user' => $user, 'classes_lists' => $classes_lists, 'curriculums' => $curriculums]);
        
    }
}
