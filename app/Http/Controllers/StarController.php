<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Http\Request;

use Auth;


class StarController extends Controller
{
    public function storerating(Request $r)
    {
    	$star = new Star;

    	$star->user_id = Auth::user()->id;
    	$star->note_id = $r->id;
    	$star->stars = $r->rating;

    	$star->save();


    	$msg = "Your Ratings ". $r->rating;
        return response()->json(array('msg'=> $msg), 200);

    }
}
