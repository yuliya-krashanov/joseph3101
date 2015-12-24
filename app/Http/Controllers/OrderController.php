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

    public function sendMessage(Request $request)
    {
    	$user = Auth::user();
    	 // Create an authenticated client for the Twilio API
		$client = new Services_Twilio($_ENV['TWILIO_ACCOUNT_SID'], $_ENV['TWILIO_AUTH_TOKEN']);
		 
		try {
		    // Use the Twilio REST API client to send a text message
		    $m = $client->account->messages->sendMessage(
		      $_ENV['TWILIO_NUMBER'], // the text will be sent from your Twilio number
		      $user->phone, // the phone number the text will be sent to
		      rand(10000, 99999) // the body of the text message
		    );
		} catch(Services_Twilio_RestException $e) {
		    // Return and render the exception object, or handle the error as needed
		    return $e;
		};
		 
		// Return the message object to the browser as JSON
		return $m;
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
                'amount' => $total_amount * 100,
                'currency' => 'usd',
                'customer' => $customerID,
                'metadata' => [
                    // что то нужно сохранять
                ]
            ]);
        } catch (Card $e) {
            return redirect()->route('cardCheckout')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        $id = $this->findLastId('IO');
        // Create purchase record in the database
        $order = Order::create([
            'id' => $id,
            'user_id' => $user->id,
            'amount' => $total_amount,
            'delivery_method' => //2,
            'payment_method' => //2,
            'print' => 0,
            'status' => 1,
            'stripe_transaction_id' => $charge->id,
        ]);

        $cart = Cart::content();
        foreach ($cart as $row){
        	$order->products()->attach($row->product->id, 
        								['subtotal' => $row->subtotal,
        								 'quantity' => $row->qty,
        								 'size' => ($row->options->has('size')) ? $row->options->size : '',
        								 'ingredients' => ($row->options->has('ingredients')) ? serialize($row->options->ingredients) : '']);
        }

        return redirect()->route('checkout_card')->with('id', $order->id);
    }

    protected function findLastId($from)
    {
        $lastOrder = Order::where('id', 'like', "$from%")->sortByDesc('id')->first();
        $new_id = ($lastOrder) ? str_ireplace($from, '', $lastOrder->id) + 1 : 1000;
    	return $from . $new_id;
    }
}
