<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Top;

class TopController extends Controller
{
    public function index(Request $request){
        return view('suzuki.top',[
        ]);
    }
}
