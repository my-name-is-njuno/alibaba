<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use App\Cat;
use App\Star;
use App\Recommend;
use App\View;

use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Auth;

class PagesController extends Controller
{

    public function home()
    {
        $notes = Note::inRandomOrder()->take(8)->get();



        return view('welcome', compact('notes'));
    }

    public function products()
    {
        if(request()->sort == '') {
            $notes = Note::inRandomOrder()->paginate(10);
        } else if (request()->sort == 'high_low') {
            $notes = Note::orderBy('price', 'desc')->paginate(10);
        } else if (request()->sort == 'low_high') {
            $notes = Note::orderBy('price', 'asc')->paginate(10);
        }


        return view('notes/products', compact('notes'));
    }

    public function cart(Note $note)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($note) {
            return $cartItem->id === $note->id;
        });

        if($duplicates->isNotEmpty()) {
            Session::flash('success', $note->name . ' already added on cart');
            return redirect()->route('getcart');
        }
       Cart::add($note->id, $note->name, 1, $note->price)->associate('App\Note');
        Session::flash('success', $note->name . ' added to cart');
        return redirect()->route('getcart');
    }


    public function getcart()
    {
        return view('notes/cart');
    }



    public function clearCart()
    {

        Cart::destroy();
        Session::flash('info', 'Your cart has been emptied');
        return redirect()->route('getcart');

    }


    public function removeFromCart($id)
    {

        Cart::remove($id);
        Session::flash('info', 'Your cart updated');
        return redirect()->route('getcart');

    }


    public function thankyou()
    {
        return view('notes/thankyou');
    }


    

    public function checkout()
    {
        return view('notes/checkout');
    }

    public function notesbycat($cat)
    {
        $cats = Cat::all();
        $catt = Cat::where('slug', $cat)->first();

        if(request()->sort == '') {
            $notes = Note::where('cat_id', $catt->id)->paginate(10);
        } else if (request()->sort == 'high_low') {
            $notes = Note::where('cat_id', $catt->id)->orderBy('price', 'desc')->paginate(10);
        } else if (request()->sort == 'low_high') {
            $notes = Note::where('cat_id', $catt->id)->orderBy('price', 'asc')->paginate(10);
        }

        return view('notes/categories-notes', compact('notes', 'cats', 'catt'));

    }

}
