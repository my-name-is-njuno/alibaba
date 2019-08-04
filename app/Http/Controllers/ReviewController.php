<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Note;
use App\Review;

class ReviewController extends Controller
{
    public function storereview(Request $r)
    {
        $this->validate($r, [
            'note_id'=>'required|integer',
            'review'=>'required|string',
        ]);

        $review = new Review();
        $review->note_id = $r->note_id;
        $review->review = $r->review;
        $review->save();


        $msg = "Your Review have been added successfully";
        $review = $review;

        return response()->json(array('msg'=> $msg, 'review'=>$review), 200);

    }
}
