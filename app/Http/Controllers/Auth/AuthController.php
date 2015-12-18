<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use Validator;
use Response;
use App\Http\Controllers\Controller;
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
     * @param  array  $data
     * @return User
     */
    public function checkPhone(Request $request)
    {
        if ($request->ajax()){
            $phone = preg_replace('~\D~', '', $request->phone);
            $user = User::FindPhone($phone)->first();
            if ( !$user ) {
                $member = Member::where('mobile_phone', 'like', "%$request->phone%")->firstOrFail();
                return Response::json(['first_name' => $member->first_name,
                                        'last_name' => $member->last_name,
                                        'address_city' => $member->address_city,
                                        'address_street' => $member->address_street,
                                        'address_street_number' => $member->address_street_number,
                                        'address_home_number' => $member->address_street_number,
                                        'email' => $member->email ]);
            }
            return Response::json(['first_name' => $user->first_name,
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
