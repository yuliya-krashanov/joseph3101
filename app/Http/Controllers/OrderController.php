<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Error\Card;
use Stripe\Stripe;

class OrderController extends Controller
{
    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
    	//$order = new Order(Auth::user()->id, $request->name);
    }

    public function card()
    {
        return view('pages.checkout');
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function cardCheckout(Request $request)
    {
        $token = $request->input('stripeToken');
        $email = $request->input('email');
        $user = \Auth::user();
        $total_amount = Cart::total();
        $emailExist = \Auth::user()->email;

        Stripe::setApiKey(env('STRIPE_SK'));

        // If the email doesn't exist in the database create new customer and user record
        if ( $emailExist == $email && $user->stripe_customer_id) {
            $customerID = $user->stripe_customer_id;
        }
        else{
            // Create a new Stripe customer
            try {
                $customer = Customer::create([
                    'source' => $token,
                    'email' => $email,
                    'metadata' => [
                        "First Name" => $user->first_name,
                        "Last Name" => $user->last_name
                    ]
                ]);
            } catch (Card $e) {
                return redirect()->route('cardCheckout')
                    ->withErrors($e->getMessage())
                    ->withInput();
            }

            $customerID = $customer->id;
            $user->email = $email;
            $user->stripe_customer_id = $customerID;
            $user->save();

        }

        // Charging the Customer with the selected amount
        try {
            $charge = Charge::create([
                'amount' => $total_amount,
                'currency' => 'usd',
                'customer' => $customerID,
                'metadata' => [
                    //'product_name' => $product
                ]
            ]);
        } catch (Card $e) {
            return redirect()->route('cardCheckout')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        $id = $this->findLastId('IO');
        // Create purchase record in the database
        Order::create([
            'id' => $id,
            'user_id' => $user->id,
            'amount' => $total_amount,
            'stripe_transaction_id' => $charge->id,
        ]);
    }

    protected function findLastId($from)
    {
        $lastOrder = Order::where('id', 'like', "$from%")->sortByDesc('id')->first();
        $new_id = str_ireplace($from, '', $lastOrder->id) + 1;
    	return $from . $new_id;
    }
}
