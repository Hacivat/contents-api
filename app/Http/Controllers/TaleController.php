<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tale;

class TaleController extends Controller
{
    public function getTitles ($lang = 'tr') {
        $tales = Tale::get();
        if ($lang === 'en')
            return response()->json($tales->pluck('title_en'), JSON_UNESCAPED_UNICODE );
        else 
            return response()->json($tales->pluck('title_tr'), JSON_UNESCAPED_UNICODE);
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
