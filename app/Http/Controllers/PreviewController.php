<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    function index(Request $request){
        $content = $request->input('content');

        return view('preview', ['content' => $content]);
    }
}
