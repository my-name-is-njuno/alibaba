<?php

namespace App\Http\Controllers;

use App\Recommend;
use Illuminate\Http\Request;
use Auth;


class RecommendController extends Controller
{
    public function storerecommend(Request $r)
    {
    	$rcc = new Recommend;

    	$rcc->user_id = Auth::user()->id;
    	$rcc->note_id = $r->id;
    	$rcc->recomedation = $r->rc;

    	$rcc->save();


    	$msg = "You would recommend this notes ". $r->rc;

        return response()->json(array('msg'=> $msg), 200);
    }
}
