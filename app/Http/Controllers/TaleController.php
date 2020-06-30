<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tale;

class TaleController extends Controller
{
    public function getTitles ($lang = 'tr') {
        $tales = []; 

        $data = []; $column = '';
        if ($lang === 'en') {
            $column = 'title_en';
        }

        else {
            $column = 'title_tr';
        }

        $tales = Tale::orderBy($column, 'asc')->get();

        foreach ($tales->pluck($column, 'uuid') as $key => $value) {
            $item = ['uuid' => $key, 'title' => $value];
            array_push($data, $item);
        }

        return response()->json(($data), JSON_UNESCAPED_UNICODE);
    }

    public function getTitlesWithKeyword ($lang = 'tr', $keyword = '') {
        $tales = [];

        $data = []; $column = '';
        if ($lang === 'en') {
            $column = 'title_en';
        }

        else {
            $column = 'title_tr';
        }

        $tales = Tale::orderBy($column, 'asc')->where($column, 'like', '%' . $keyword .'%')->get();
        
        foreach ($tales->pluck($column, 'uuid') as $key => $value) {
            $item = ['uuid' => $key, 'title' => $value];
            array_push($data, $item);
        }

        return response()->json(($data), JSON_UNESCAPED_UNICODE);
    }

    public function getTitlesAndImages ($lang = 'tr') {
        //
    }

    public function getContent ($lang = 'tr', $uuid) {
        $tale = Tale::where('uuid', $uuid)->get();

        if ($lang === 'en') {
            $tale->makeHidden(['title_tr','text_tr']);
            return response()->json($tale, JSON_UNESCAPED_UNICODE);
        } else {
            $tale->makeHidden(['title_en','text_en']);
            return response()->json($tale, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getImages () {
        //
    }

    public function getVoice ($lang = 'tr') {
        //
    }
}
