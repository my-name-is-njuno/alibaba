<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
use Cart;
use App\Order;
use function Opis\Closure\serialize;
use Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('notes/checkout');
    }

    public function stripecheckout(Request $r)
    {


        // $this->validate($r, [
        //     'email'=>'required|email',
        //     'name'=>'required|string',
        //     'country'=>'required|string',
        //     'city'=>'required|string'
        // ]);

        Stripe::setApiKey('sk_test_Agdg6raxKNgNuTYE98hUt2cs00XGCqlglN');


        $token = $_POST['stripeToken'];
        try {
            $charge = Charge::create([
                'amount' => $r->total,
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $r->get('stripeToken'),
                'receipt_email'=>$r->get('email'),
                'metadata' => [
                    'order_id'=>2456
                ]
            ]);
            $cart = Cart::instance('default')->content();
            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = Auth::user()->name;
            $order->email =  Auth::user()->email;
            $order->user_id = Auth::user()->id;
            $order->country = $r->country;
            $order->city = $r->city;
            $order->payment_id = $charge->id;

            $order->save();

        } catch (\Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return back();
        }




        Cart::destroy();

        Session::flash('success', 'Thank You for your purchase');
        return redirect()->route('thankyou');
    }
}
