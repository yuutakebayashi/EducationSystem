<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{

    public function news (Request $request){
        $curriculums = Curriculum::all();
        return view('suzuki.curriculum',[
            'curriculums'=>$curriculums,
        ]);
    }

    public function creates(Request $request){
        $uploadedvideo = $request->video('video');
        $video_url = $uploadedvideo->getClientOriginalName();
        $curriculum = Curriculum::create([
            "video_url"=>$video_url,
        ]);
        $uploadedvideo->storeAs('',$curriculum->id);

        return redirect()->route("curriculum.news");
    }

    public function getfiles(Request $request,$id){
        $curriculum = Curriculum::find($id);
        $storedvideo_url = $curriculum->id;
        $video_url = $curriculum->video_url;
        $mimeType = Storage::mimeType($storedvideo_url);
        $headers = [['Content->Type=>$mimeType']];
        return Storage::response($storedvideo_url,$video_url,$headers);
    }
}
