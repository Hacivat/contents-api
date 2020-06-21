<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tale;

class TaleController extends Controller
{
    public function store (Request $request) {
        $tale = new Tale();

        if ($lang == 'en') {
            $tale->text_en = $request->text;
            $tale->title_en = $request->title;
        }
        else {
            $tale->text_tr = $request->text;
            $tale->title_tr = $request->title;
        } 
    
        $tale->uuid = Str::uuid()->toString();
        $tale->isActive = 1;
        if ($tale->save()) 
            return response()->json([
                'status_code' => 200,
                'message' => 'Created'
            ]);
        else 
            return response()->json([
                'status_code' => 400,
                'message' => 'Failed'
            ]);
    }

    public function getTitles () {
        //
    }

    public function getContent ($lang = 'tr') {
        //
    }

    public function getImages () {
        //
    }

    public function getVoice ($lang = 'tr') {
        //
    }
}
