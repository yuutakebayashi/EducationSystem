<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function new(Request $request){
        $banners = Banner::all();
        return view('suzuki.banner',[
            'banners' => $banners,
        ]);
    }

    public function create(Request $request){
        $uploadedfile = $request->file('file');
        $filename = $uploadedfile->getClientOriginalName();
        $banner = Banner::create([
            "filename"=>$filename,
        ]);
        $uploadedfile->storeAs('',$banner->id);

        return redirect()->route("banner.new");
    }

    public function getfile(Request $request,$id){
        $banner = Banner::find($id);
        $storedfilename = $banner->id;
        $filename = $banner->filename;
        $mimeType = Storage::mimeType($storedfilename);
        $headers = [['Content->Type=>$mimeType']];
        return Storage::response($storedfilename,$filename,$headers);
    }
}
