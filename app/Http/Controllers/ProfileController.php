<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Image;
use File;

use App\User;


class ProfileController extends Controller
{
    public function index($value='')
    {
    	return view('notes.users.profile');
    }


    public function updateprofile(Request $r)
    {
    	$this->validate($r, [
    		'name'=>'required|string|max:255',
    		'proffesion'=>'required|string|max:255',
    		'about'=>'required|string|max:400',
    	]);

        $prev_avatar = public_path().'/images/avatars/'.Auth::user()->avatar;
        $prev_avatar_th = public_path().'/images/avatars/thumbnails/'.Auth::user()->avatar;

        $avatar = Auth::user()->avatar;

        if($r->file('avatar')) {
            request()->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $originalImage= $r->file('avatar');

            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/images/avatars/thumbnails/';

            $originalPath = public_path().'/images/avatars/';
            $avatar=time().Auth::user()->email.$originalImage->getClientOriginalName();
            $thumbnailImage->save($originalPath.$avatar);

            $thumbnailImage->resize(150,150);

            $thumbnailImage->save($thumbnailPath.$avatar); 

             if(File::exists($prev_avatar)){File::delete($prev_avatar);}
             if(File::exists($prev_avatar_th)){File::delete($prev_avatar_th);}
            

        }


        $user = Auth::user();
        $user->name = $r->name;
        $user->proffesion = $r->proffesion;
        $user->about = $r->about;
        $user->avatar = $avatar;


        $user->save();
        Session::flash('success', 'Your info updated successfully');
        return back();






    }
}
