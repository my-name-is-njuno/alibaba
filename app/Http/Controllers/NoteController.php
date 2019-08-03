<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use Session;
use Image;
use File;
use Response;


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
            $cvi=time().str_slug($r->title).$originalImage->getClientOriginalName();
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





	  public function editnotes($slug)
	  {
		  $note = Note::where('slug', $slug)->firstOrFail();
		  return view('notes.crud.edit', compact('note'));
	  }




	  public function updatenotes(Request $r, $id)
	  {
		  $note = Note::findOrFail($id);

		  $this->validate($r, [
    		'title'=>'required|string|max:255',
    		'details'=>'required|string|max:255',
    		'description'=>'required|string',
    		'intended'=>'required|string|max:255',
    		'pages'=>'required|integer',
    		'price'=>'required|integer',
    		'category'=>'required|integer',
    		
		]);
		

		$oldcoverimage = $note->coverimage;
		$cvi = $note->coverimage;

		if($r->file('coverimage')) {
            request()->validate([
                'coverimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20488',
            ]);

            $originalImage= $r->file('coverimage');

            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/notes/coverimages/';
            $cvi=time().str_slug($r->title).$originalImage->getClientOriginalName();
            $thumbnailImage->resize(300,300);
			$thumbnailImage->save($thumbnailPath.$cvi);
			
			$notescipath = public_path().'/notes/coverimages/'.$oldcoverimage;
			if((File::exists($notescipath)) && ($oldcoverimage != 'coverimage.jpg')) {
				File::delete($notescipath);
			}
            
		}


		$oldnotes = $note->notes;
		$filename = $note->notes;

		if($r->file('notes')) {
			request()->validate([
                'notes' => 'mimes:pdf,docx,doc',
            ]);
			$originalattachment= $r->file('notes');
			$extension = $originalattachment->getClientOriginalExtension();
			$filename = str_slug($r->title).'-'.rand(11111111, 99999999). '.' . $extension;
			$notespath = public_path() . '/notes/full/';



			try {
				$r->file('notes')->move(public_path() . '/notes/full/', $filename);
	
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


				$notespath = public_path().'/notes/full/'.$oldnotes;
				

				if(File::exists($notespath)) {
					File::delete($notespath);
				}
				
	
				Session::flash('success', 'Your Notes have been updated successfully');
				return redirect()->route('singleproduct',['slug'=>$note->slug]);
	
	
			} catch (Exception $e) {
				Session::flash('error', $e);
				return back();
			}


		} else {
				$note->name = $r->title;
				$note->details = $r->details;
				$note->description = $r->description;
				$note->intended = $r->intended;
				$note->pages = $r->pages;
				$note->price = $r->price;
				$note->cat_id = $r->category;
				$note->coverimage = $cvi;


				$note->save();

				Session::flash('success', 'Your Notes have been updated successfully');
				return redirect()->route('singleproduct',['slug'=>$note->slug]);

		}


	}




		public function downloadforedit($slug)
		{
			$note = Note::where('slug', $slug)->firstOrFail();
			$file= public_path(). "/notes/full/". $note->notes;

			// $headers = array(
			// 		'Content-Type: application/pdf',
			// 		);

			return Response::download($file, $note->notes);
				
	  }



	  public function deletenotes($slug)
	  {
			$note = Note::where('slug', $slug)->firstOrFail();
			$notespath = public_path().'/notes/full/'.$note->notes;
			$notescipath = public_path().'/notes/coverimages/'.$note->coverimage;

			

			if(File::exists($notespath)) {
				File::delete($notespath);
			}
			if(File::exists($notescipath) && $note->coverimage != 'coverimage.jpg') {
				File::delete($notescipath);
			}

			$note->delete();

			Session::flash('success', 'Notes have been deleted completely');

			return redirect()->route('profile');


	  }

}
