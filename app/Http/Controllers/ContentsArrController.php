<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createContents(){
        $contents_arr = \App\ContentsArr::create([
            'arr_text1' => ['Toni Abbah','Anastacia Mast','Soji Igbonna'],
            'arr_text2' => ['username'=>'torah','name'=>'Toni Abbah']
        ]);
        if($contents_arr) {
            return response()->json(['status' => 'success','data' => $contents_arr]);
        }
        return response()->json(['status' => 'fail','message' => 'failed to create content_arr record']);
    }
}

