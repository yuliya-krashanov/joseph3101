<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use Response;
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
     * @return \Exception|\Services_Twilio_RestException
     */
    public function sendMessage(Request $request)
    {
    	$user = \Auth::user();
    	 // Create an authenticated client for the Twilio API
		$client = new \Services_Twilio(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
		$random = rand(10000, 99999);
		try {
		    // Use the Twilio REST API client to send a text message
		    $m = $client->account->messages->sendMessage(
		      env('TWILIO_NUMBER'), // the text will be sent from your Twilio number
		      '+'.$user->phone, // the phone number the text will be sent to
		      $random // the body of the text message
		    );
		} catch(\Services_Twilio_RestException $e) {
		    // Return and render the exception object, or handle the error as needed
		    return $e;
		};
		 
		// Return the message object to the browser as JSON
		$request->session()->put('verification_sms_code', $random);

        return Response::json(['success' => true]);
    }

    public function cashCheckout(Request $request)
    {
        if((int)$request->code !== $request->session()->get('verification_sms_code')){
            return Response::json(['code' => false]);
        }
        else{
            $user = \Auth::user();
            $total_amount = Cart::total();

            $id = $this->findLastId('IO');

            // Create purchase record in the database
            $order = Order::create([
                'id' => $id,
                'user_id' => $user->id,
                'amount' => $total_amount,
                'delivery_method' => 3,
                'payment_method' => 1,
                'print' => 0,
                'status' => 1,
                'comment' => $request->session()->get('order_comment'),
            ]);

            $cart = Cart::content();

            foreach ($cart as $row){
                $order->products()->attach($row->product->id,
                    ['subtotal' => $row->subtotal,
                        'quantity' => $row->qty,
                        'size' => ($row->options->has('size')) ? $row->options->size : '',
                        'ingredients' => ($row->options->has('ingredients')) ? serialize($row->options->ingredients) : '']);
            }

            Cart::destroy();

            return Response::json(['code' => true, 'order' => $order->id]);
        }
    }

    public function thankPage(Request $request)
    {
        return view('pages.thankyou', ['id' => $request->id]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function cardCheckout(Request $request)
    {
        $token = $request->stripeToken;
        $email = $request->email;
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
                return redirect()->route('checkout_card_form')
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
            return redirect()->route('checkout_card_form')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        $id = $this->findLastId('IO');

        // Create purchase record in the database
        $order = Order::create([
            'id' => $id,
            'user_id' => $user->id,
            'amount' => $total_amount,
            'delivery_method' => 3,
            'payment_method' => 2,
            'print' => 0,
            'status' => 1,
            'comment' => $request->session()->get('order_comment'),
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

        Cart::destroy();

        return redirect()->route('thank_page', $order->id);
    }

    /**
     * @param $from
     * @return string
     */
    protected function findLastId($from)
    {
        $lastOrder = Order::where('id', 'like', "$from%")->orderBy('id', 'desc')->first();
        $new_id = ($lastOrder) ? str_ireplace($from, '', $lastOrder->id) + 1 : 1000;
    	return $from . $new_id;
    }
}
