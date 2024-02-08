<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Top;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class TopController extends Controller
{
    public function index(Request $request){
        $banners = Banner::all();
        $articles = Article::all();
        return view('suzuki.top',[
            'banners' => $banners,
            'articles' => $articles,
        ]);
    }
}
