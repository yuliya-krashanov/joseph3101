<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Response;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $cart = Cart::content();
        return view('pages.menu', compact('cart'));
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authUser(Request $request)
    {
    	if ($request->ajax()){

    		$phone = preg_replace('~\D~','', $request->phone);
    		$user = User::findPhone($phone)->first();

    		if (!$user){
    			$user = new User();
    		}

    		$user->phone = $phone;
    		$user->first_name = $request->first_name;
	        $user->last_name = $request->last_name;
	        $user->address_city = $request->city;
	        $user->address_street = $request->street;
	        $user->address_street_number = $request->street_number;
	        $user->address_home_number = $request->home_number;
	        $user->address_floor = $request->floor;
	        $user->save();

	        if( $user->member ){
                $user->member->first_name = $user->first_name;
                $user->member->last_name = $user->last_name;
                $user->member->address_city = $user->address_city;
                $user->member->address_street = $user->address_street;
                $user->memberr->address_street_number = $user->address_street_number;
                $user->member->address_home_number = $user->address_home_number;
                $user->member->save();
	        }

	        Auth::login($user);

	        return Response::json(['success' => true]);
    	}
    }
}
