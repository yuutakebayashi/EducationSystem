<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\User;
use App\Models\Grade;
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

        $curriculums = Grade::query()
                     ->select('classes.*', 'curriculums.title')
                     ->join('curriculums','classes.id','=','curriculums.class_id')
                     ->get();
                     
        return view('progress', ['user' => $user, 'classes_lists' => $classes_lists, 'curriculums' => $curriculums]);
    }
}
