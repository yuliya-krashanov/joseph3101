<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendsController extends Controller
{
    public function index(){
        return view('pages.friends.index');
    }

    public function register(){
        return view('pages.friends.register');
    }

    public function create(Requests\CreateMemberRequest $request){
        Member::create($request->all());
    }
}
