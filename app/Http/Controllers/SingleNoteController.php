<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use App\Star;
use App\Recommend;

use Session;
use Auth;



class SingleNoteController extends Controller
{
    public function singlenote($slug)
    {
        
        $note = Note::where('slug', $slug)->firstOrFail();

        $rated = '';
        $recomended = '';



        if(Auth::user()) {
            $rt = Star::where('user_id', Auth::user()->id)->where('note_id', $note->id)->first();
            if(!$rt) {$rated = 'notrated';} else {$rated = $rt;} 

            $rc = Recommend::where('user_id', Auth::user()->id)->where('note_id', $note->id)->first();
            if(!$rc) {$recomended = 'notrecomended';} else {$recomended = $rc;} 

            if(Auth::user()->id != $note->user_id) {
                $note->increment('views');
            }                
        } else {
            $note->increment('views');
        }

        


        return view('notes/singleproduct', compact('note', 'rated', 'recomended'));
    }
}
