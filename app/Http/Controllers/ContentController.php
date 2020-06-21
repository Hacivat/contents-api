<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tale;


class ContentController extends Controller
{
    public function store(Request $request) {
        if ($request->category = 'Tales') {
            $tale = new Tale();

            if ($request->lang == 'en') {
                $tale->text_en = $request->content;
                $tale->title_en = $request->title;
            }
            else {
                $tale->text_tr = $request->content;
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
    }
}
