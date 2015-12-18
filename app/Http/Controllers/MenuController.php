<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(){
        return view('pages.menu');
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
	        $user->floor = $request->floor;
	        $user->save();

	        if( $member = Member::whereCustomerId($user->id) ){

	        	$member->first_name = $user->first_name;
		        $member->last_name = $user->last_name;
		        $member->address_city = $user->address_city;
		        $member->address_street = $user->address_street;
		        $member->address_street_number = $user->address_street_number;
		        $member->address_home_number = $user->address_home_number;
		        $member->save();
	        }

	        Auth::login($user);

	        return Response::json(['success' => true])
    	}
    }
}
