<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendsController extends Controller
{
    public function index()
    {
        return view('pages.friends.index');
    }

    public function register()
    {
        return view('pages.friends.register');
    }

    public function create(Requests\CreateMemberRequest $request)
    {
        $member = new Member();

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->address_city = $request->address_city;
        $member->address_street = $request->address_street;
        $member->address_street_number = $request->address_street_number;
        $member->address_home_number = $request->address_home_number;
        $member->birth_date = $request->day . ' '. $request->month . ' ' . $request->year;

        $member->email = $request->email;
        $member->mobile_phone = preg_replace('~\D~','', $request->mobile_phone);

        $member->additional_phone = preg_replace('~\D~','', $request->additional_phone);
        $member->status = $request->status;
        $member->partner_first_name = $request->partner_first_name;
        $member->partner_last_name = $request->partner_last_name;
        $member->partner_birth_date =  $request->partner_day . ' '. $request->partner_month . ' ' . $request->partner_year;
        $member->partner_mobile_phone = preg_replace('~\D~','', $request->partner_mobile_phone);
        $member->partner_email = $request->partner_email;
        $member->send_to_mail = $request->send_to_mail;
        $member->send_to_mobile = $request->send_to_mobile;


        $existUser = User::wherePhone($member->mobile_phone)->first();

        $member->customer_id = ($existUser) ? $existUser->id : null;

        $member->save();

        \Mail::send('emails.friends', ['member' => $member], function ($message) use ($member) {
            $message->from($member->email, 'Pizza 3101' ) ;
            $message->to('yuliya-krashanov@yandex.ua', 'Yuliya')->subject('Pizza | New member in Friends Club');
        });
        return back();
    }
}
