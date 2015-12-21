<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Member;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     *
     */
    public function checkPhone(Request $request)
    {
        if ($request->ajax()){
            $phone = preg_replace('~\D~', '', $request->phone);
            $user = User::findPhone($phone)->first();
            if ( !$user ) {
                $member = Member::where('mobile_phone', 'like', "%$request->phone%")->first();
                return ($member) ? Response::json([ 'success' => true,
                                        'first_name' => $member->first_name,
                                        'last_name' => $member->last_name,
                                        'address_city' => $member->address_city,
                                        'address_street' => $member->address_street,
                                        'address_street_number' => $member->address_street_number,
                                        'address_home_number' => $member->address_street_number,
                                        'email' => $member->email ]) : Response::json([ 'success' => false ]);
            }
            else{
                return Response::json([ 'success' => true,
                                    'first_name' => $user->first_name,
                                    'last_name' => $user->last_name,
                                    'address_city' => $user->address_city,
                                    'address_street' => $user->address_street,
                                    'address_street_number' => $user->address_street_number,
                                    'address_home_number' => $user->address_street_number,
                                    'address_floor' => $user->address_floor,
                                    'email' => $user->email ]);
            }            
        }
        
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

            $request->phone = preg_replace('~\D~','', $request->phone);
            $user = User::where('phone', 'like', "%$request->phone%")->first();

            if (!$user){
                $user = new User();
            }

            $user->phone = $request->phone;
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

    public function checkAuth(Request $request){
        if ($request->ajax()) {
            return Auth::check();
        }
    }
}
