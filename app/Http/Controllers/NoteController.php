<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use Session;
use Image;


class NoteController extends Controller
{
    public function addnotes()
    {
    	return view('notes.crud.add');
    }


    public function storenotes(Request $r)
    {
    	$this->validate($r, [
    		'title'=>'required|string|max:255',
    		'details'=>'required|string|max:255',
    		'description'=>'required|string',
    		'intended'=>'required|string|max:255',
    		'pages'=>'required|integer',
    		'price'=>'required|integer',
    		'category'=>'required|integer',
    		'notes'=>'required|mimes:pdf,docx,doc'
    	]);


    	$cvi = "coverimage.jpg";

    	if($r->file('coverimage')) {
            request()->validate([
                'coverimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $originalImage= $r->file('coverimage');

            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/notes/coverimages/';
            $cvi=time().str_slug('title').$originalImage->getClientOriginalName();
            $thumbnailImage->resize(300,300);
            $thumbnailImage->save($thumbnailPath.$cvi);
            
        }


	    $originalattachment= $r->file('notes');

	    $extension = $originalattachment->getClientOriginalExtension();
	    $filename = str_slug($r->title).'-'.rand(11111111, 99999999). '.' . $extension;
	    $notespath = public_path() . '/notes/full/';

	    try {
	    	$r->file('notes')->move(public_path() . '/notes/full/', $filename);

		    $note = new Note();

		    $note->name = $r->title;
		    $note->details = $r->details;
		    $note->description = $r->description;
		    $note->intended = $r->intended;
		    $note->pages = $r->pages;
		    $note->price = $r->price;
		    $note->notes = $filename;
		    $note->doctype = $extension;
		    $note->cat_id = $r->category;
		    $note->coverimage = $cvi;

		    $note->save();

		    Session::flash('success', 'Your Notes have been added successfully');
		    return redirect()->route('singleproduct',['slug'=>$note->slug]);


	    } catch (Exception $e) {
	    	Session::flash('error', $e);
	    	return back();
	    }
	    

	    





	    

	    
	  

	  }
}
