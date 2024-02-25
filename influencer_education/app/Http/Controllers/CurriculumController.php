<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{

    public function news(Request $request){
        $curriculums = Curriculum::all();
        return view('suzuki.curriculum',[
            'curriculums'=>$curriculums,
        ]);
    }

    public function creates(Request $request){
        $title = $request->input('title');
        $description = $request->input('description');
        $uploadedVideo = $request->file('video');
        $alway_delivery_flg = $request->input('alway_delivery_flg');
        $classes_id = $request->input('classes_id');
        if ($uploadedVideo){
            $videoUrl = $uploadedVideo->getClientOriginalName();
            $curriculum = Curriculum::create([
                "title"=>$title,
                "description"=>$description,
                "video_url" => $videoUrl,
                "alway_delivery_flg"=>$alway_delivery_flg,
                "classes_id"=>$classes_id,
        ]);
        $uploadedVideo->storeAs('', $curriculum->id);
        return redirect()->route("curriculum.news");
    } else{
        return redirect()->back()->with('error', 'No file was uploaded.');
    }
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
